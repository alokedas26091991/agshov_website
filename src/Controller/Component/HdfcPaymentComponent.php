<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Http\Client;
use Cake\Core\Configure;
use Cake\Log\Log;

class HdfcPaymentComponent extends Component
{
    protected $config;

    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->config = Configure::read('HDFC');
    }

    /**
     * Initiate a payment request to HDFC Payment Gateway.
     *
     * @param array $paymentData
     * @return array
     */
   public function orderSession($params) {
        
        $params["payment_page_client_id"]=$this->config['PAYMENT_PAGE_CLIENT_ID'];
        return $this->makeServiceCall ($params);
    }

    /**
     * Verify the HDFC response.
     *
     * @param array $responseData
     * @return bool
     */
    public function verifyResponse(array $responseData): bool
    {
        // Implement response verification logic, e.g., checking signatures or keys.
        return true;
    }
    public  function makeServiceCall( $params) {
        //$logger = new SimpleLogger();
        $paymentRequestId = uniqid();
        
        $url = $this->config['BASE_URL'] . '/session';
        $curlObject = curl_init ();
        $log = array();
        curl_setopt ( $curlObject, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $curlObject, CURLOPT_HEADER, true );
        curl_setopt ( $curlObject, CURLOPT_NOBODY, false );
        curl_setopt ( $curlObject, CURLOPT_USERPWD, $this->config['API_KEY']);
        curl_setopt ( $curlObject, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
        curl_setopt ( $curlObject, CURLOPT_USERAGENT,  "SAMPLE_KIT/" . $this->config['MARCHANT_ID']);
        $headers = array('version: ' . "2024-02-01");
        if ($this->config['MARCHANT_ID']) array_push($headers, 'x-merchantid:'. $this->config['MARCHANT_ID']);
        
       
            array_push( $headers, 'Content-Type: application/json' );
            curl_setopt ( $curlObject, CURLOPT_HTTPHEADER, $headers);
            curl_setopt ( $curlObject, CURLOPT_POST, 1 );
            if ($params != null) {
                $encodedParams = json_encode($params);
               
                curl_setopt ( $curlObject, CURLOPT_POSTFIELDS, $encodedParams );
            }
        
        
        curl_setopt ( $curlObject, CURLOPT_URL, $url );
        $ca = ini_get('curl.cainfo');
        $ca = $ca === null || $ca === "" ? ini_get('openssl.cafile') : $ca;
        if ($ca === null || $ca === "") {
            
            $caCertificatePath = $this->config['CA_PATH'];
            curl_setopt ($curlObject, CURLOPT_CAINFO, $caCertificatePath);
        }
        $response = curl_exec ( $curlObject );
        if ($response == false) {
            
        } else {
            
            $responseCode = curl_getinfo ( $curlObject, CURLINFO_HTTP_CODE );
            $headerSize = curl_getinfo ( $curlObject, CURLINFO_HEADER_SIZE );
            $encodedResponse = substr ( $response, $headerSize );
            $responseBody = json_decode ($encodedResponse, true );
            //$responseHeaders = self::http_parse_headers(substr($response, 0, $headerSize));
            
            //$log = [ "http_status_code" => $responseCode,  "response" => $encodedResponse, "response_headers" => json_encode($responseHeaders)];
            curl_close ( $curlObject );
            if ($responseCode >= 200 && $responseCode < 300) {
               // $logger->info("Received response:" . json_encode($log));
                return $responseBody;
            } else {
                $status = null;
                $errorCode = null;
                $errorMessage = null;
                if ($responseBody != null) {
                    if (array_key_exists ( "status", $responseBody ) != null) {
                        $status = $responseBody ['status'];
                    }
                    if (array_key_exists ( "error_code", $responseBody ) != null) {
                        $errorCode = $responseBody ['error_code'];
                    }
                    if (array_key_exists ( "error_message", $responseBody ) != null) {
                        $errorMessage = $responseBody ['error_message'];
                    } else {
                        $errorMessage = $status;
                    }
                }
                //$logger->error("Received response:" . json_encode($log));
                //throw new APIException ( $responseCode, $status, $errorCode, $errorMessage );
            }
        }
    }
    
}
