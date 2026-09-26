<?php

/**
 * Description of CcavenueComponent
 * CCAvenue Payment integration
 * @author Bidesh
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
use App\Controller\PaymentTrait;

class CcavenueComponent extends Component {

    use PaymentTrait;

    protected $url;
    protected $ccavenue_merchant_id;
    protected $ccavenue_access_code;
    protected $ccavenue_working_key;
    protected $redirect_url;
    protected $currency;
    protected $language;
    protected $billing_country;
    //use auth
    public $components = ['Auth'];

    function initialize(array $config) {
        parent::initialize($config);
        if ($config['sandbox'] == TRUE) {
            $this->url = 'https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction';
            $this->ccavenue_access_code = 'AVYG78JD43BL63GYLB';
            $this->ccavenue_working_key = 'AD57787A5EA50355FF31BB8ABE923241';
        } else {
            //$this->url = 'https://www.ccavenue.com/transaction/transaction.do?command=initiateTransaction';
            $this->url = 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction';
           $this->ccavenue_access_code = 'AVYG78JD43BL63GYLB';
            $this->ccavenue_working_key = 'AD57787A5EA50355FF31BB8ABE923241';
        }

        $this->currency = 'INR';
        $this->language = 'EN';
        $this->billing_country = 'India';
        $this->ccavenue_merchant_id = '894400';
        $this->redirect_url = \Cake\Routing\Router::url(["controller" => "Products", "action" => "ccavenueReturnurl"], true);
    }

    /**
     * 
     * @param type $order_id
     * @param type $grand_total
     * @param type $payment_for (1=>course,2=>webinar,3=>workshop)
     */
    public function send_payment($order_id, $grand_total, $payment_for = 1) {


       $tblUsersObj = TableRegistry::get('Users');
        $user_info = $tblUsersObj->get($this->Auth->user('id'));
		$orderId=explode('-',$order_id);
		$cartObj=TableRegistry::get('Carts');
		$cartdata=$cartObj->get($orderId[1],['contain'=>['UserDeliveryDetails']]);
		
		//$user_state = TableRegistry::get('States');
		 //$state_name=$user_state->find("all")->where(['id' => $cartdata->user_delivery_detail->state])->first();
		 
		 
		
        $billing_name = $cartdata->user_delivery_detail->name;

        $billing_address = $cartdata->user_delivery_detail->home_address;

        $billing_city = $cartdata->user_delivery_detail->city;

        $billing_state = $cartdata->user_delivery_detail->state;

        $billing_zip = $cartdata->user_delivery_detail->pin;

        $billing_tel = $cartdata->user_delivery_detail->mobile;

        $billing_email = $cartdata->user_delivery_detail->email;

        $delivery_name = $cartdata->user_delivery_detail->name;

        $delivery_address = $cartdata->user_delivery_detail->home_address;

        $delivery_city = $cartdata->user_delivery_detail->city;

        $delivery_state = $state_name->name;

        $delivery_zip = $cartdata->user_delivery_detail->pin;

        $delivery_country = 'India';

        $delivery_tel = $cartdata->user_delivery_detail->mobile;

        $customer_identifier = '';



        $merchant_data = 'merchant_id=' . $this->ccavenue_merchant_id . '&order_id=' . $order_id . '&amount=' . $grand_total . '&currency=' . $this->currency . '&redirect_url=' . $this->redirect_url .
                '&cancel_url=' . $this->redirect_url . '&language=' . $this->language . '&billing_name=' . $billing_name . '&billing_address=' . $billing_address .
                '&billing_city=' . $billing_city . '&billing_state=' . $billing_state . '&billing_zip=' . $billing_zip . '&billing_country=' . $this->billing_country .
                '&billing_tel=' . $billing_tel . '&billing_email=' . $billing_email . '&delivery_name=' . $delivery_name . '&delivery_address=' . $delivery_address .
                '&delivery_city=' . $delivery_city . '&delivery_state=' . $delivery_state . '&delivery_zip=' . $delivery_zip . '&delivery_country=' . $delivery_country .
                '&delivery_tel=' . $delivery_tel . '&customer_identifier=' . $customer_identifier . '&merchant_param1=' . $payment_for;

        $encrypted_data = $this->encrypt($merchant_data, $this->ccavenue_working_key);

        $paramList['command'] = 'initiateTransaction';
        $paramList['encRequest'] = $encrypted_data;
        $paramList['access_code'] = $this->ccavenue_access_code;

        $this->submit($paramList, 'CCAvenue');
    }

    public function send_payment_app($order_id, $grand_total) {

        $this->redirect_url = \Cake\Routing\Router::url(["controller" => "Carts", "action" => "ccavenueReturnurl", "prefix" => "api"], true);
        $tblUsersObj = TableRegistry::get('Users');
        	$orderId=explode('-',$order_id);
		$cartObj=TableRegistry::get('Carts');
		$cartdata=$cartObj->get($orderId[1],['contain'=>['UserDeliveryDetails']]);
		$user_state = TableRegistry::get('States');
		 $state_name=$user_state->find("all")->where(['id' => $cartdata->user_delivery_detail->state])->first();
        $user_info = $tblUsersObj->get($this->Auth->user('id'));

        $billing_name = $cartdata->user_delivery_detail->name;

        $billing_address = $cartdata->user_delivery_detail->home_address;

        $billing_city = $cartdata->user_delivery_detail->city;

        $billing_state = $state_name->name;

        $billing_zip = $cartdata->user_delivery_detail->pin;

        $billing_tel = $cartdata->user_delivery_detail->mobile;

        $billing_email = $cartdata->user_delivery_detail->email;

        $delivery_name = $cartdata->user_delivery_detail->name;

        $delivery_address = $cartdata->user_delivery_detail->home_address;

        $delivery_city = $cartdata->user_delivery_detail->city;

        $delivery_state = $state_name->name;

        $delivery_zip = $cartdata->user_delivery_detail->pin;

        $delivery_country = 'India';

        $delivery_tel = $cartdata->user_delivery_detail->mobile;

        $customer_identifier = '';



        $merchant_data = 'merchant_id=' . $this->ccavenue_merchant_id . '&order_id=' . $order_id . '&amount=' . $grand_total . '&currency=' . $this->currency . '&redirect_url=' . $this->redirect_url .
                '&cancel_url=' . $this->redirect_url . '&language=' . $this->language . '&billing_name=' . $billing_name . '&billing_address=' . $billing_address .
                '&billing_city=' . $billing_city . '&billing_state=' . $billing_state . '&billing_zip=' . $billing_zip . '&billing_country=' . $this->billing_country .
                '&billing_tel=' . $billing_tel . '&billing_email=' . $billing_email . '&delivery_name=' . $delivery_name . '&delivery_address=' . $delivery_address .
                '&delivery_city=' . $delivery_city . '&delivery_state=' . $delivery_state . '&delivery_zip=' . $delivery_zip . '&delivery_country=' . $delivery_country .
                '&delivery_tel=' . $delivery_tel . '&customer_identifier=' . $customer_identifier;

        $encrypted_data = $this->encrypt($merchant_data, $this->ccavenue_working_key);

        $paramList['command'] = 'initiateTransaction';
        $paramList['encRequest'] = $encrypted_data;
        $paramList['access_code'] = $this->ccavenue_access_code;

        $this->submit($paramList, 'CCAvenue');
    }

    
    /* check payment status */

    public function status($order_no) {
        $URL = "https://apitest.ccavenue.com/apis/servlet/DoWebTrans";

        // Sample request string for the API call

        $merchant_json_data = array(
            "reference_no" => "22558",
            "order_no" => $order_no
        );

        // Generate json data after call below method

        $merchant_data = json_encode($merchant_json_data);

        // Encrypt merchant data with working key shared by ccavenue

        $encrypted_data = $this->encrypt($merchant_data, $this->ccavenue_working_key);

        //make final request string for the API call

        $final_data = "request_type=JSON&access_code=" . $this->ccavenue_access_code . "&command=orderStatusTracker&response_type=JSON&enc_request=" . $encrypted_data;

        // Initiate api call on shared url by CCAvenues

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $final_data);

        // Get server response ... curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);
        var_dump($result);
        $information = explode('&', $result);
        $dataSize = sizeof($information);
        $status1 = explode('=', $information[0]);
        $status2 = explode('=', $information[1]);
        if ($status1[1] == '1') {
            $recorddata = $status2[1];
        } else {
            $status = $htis->decrypt($status2[1], $this->ccavenue_working_key);
            echo "<pre>";
            var_dump($status);
            echo "</pre>";
        }
    }

    /* END */

    private function adler32($adler , $str)
	{
		$BASE =  65521 ;
		$s1 = $adler & 0xffff ;
		$s2 = ($adler >> 16) & 0xffff;
		for($i = 0 ; $i < strlen($str) ; $i++)
		{
			$s1 = ($s1 + Ord($str[$i])) % $BASE ;
			$s2 = ($s2 + $s1) % $BASE ;
		}
		return $this->leftshift($s2 , 16) + $s1;
	}

	private function leftshift($str , $num)
	{

		$str = DecBin($str);

		for( $i = 0 ; $i < (64 - strlen($str)) ; $i++)
			$str = "0".$str ;

		for($i = 0 ; $i < $num ; $i++)
		{
			$str = $str."0";
			$str = substr($str , 1 ) ;
			//echo "str : $str <BR>";
		}
		return $this->cdec($str) ;
	}

	private function cdec($num)
	{
		$dec=0;
		for ($n = 0 ; $n < strlen($num) ; $n++)
		{
		   $temp = $num[$n] ;
		   $dec =  $dec + $temp*pow(2 , strlen($num) - $n - 1);
		}

		return $dec;
	}

public	function encrypt($plainText,$key)
{
	$key = $this->hextobin(md5($key));
	$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
	$openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
	$encryptedText = bin2hex($openMode);
	return $encryptedText;
}

/*
* @param1 : Encrypted String
* @param2 : Working key provided by CCAvenue
* @return : Plain String
*/
public function decrypt($encryptedText)
{
    $key=$this->ccavenue_working_key;
	$key = $this->hextobin(md5($key));
	$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
	$encryptedText = $this->hextobin($encryptedText);
	$decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
	return $decryptedText;
}

private function hextobin($hexString) 
 { 
	$length = strlen($hexString); 
	$binString="";   
	$count=0; 
	while($count<$length) 
	{       
	    $subString =substr($hexString,$count,2);           
	    $packedString = pack("H*",$subString); 
	    if ($count==0)
	    {
			$binString=$packedString;
	    } 
	    
	    else 
	    {
			$binString.=$packedString;
	    } 
	    
	    $count+=2; 
	} 
        return $binString; 
  } 
   
    //*********** Padding Function *********************

    protected function pkcs5_pad($plainText, $blockSize) {
        $pad = $blockSize - (strlen($plainText) % $blockSize);
        return $plainText . str_repeat(chr($pad), $pad);
    }

    //********** Hexadecimal to Binary function for php 4.0 version ********

    

}
