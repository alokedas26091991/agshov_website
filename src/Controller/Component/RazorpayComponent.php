<?php
declare(strict_types=1);
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;

class RazorpayComponent extends Component {

    public $components = ['Auth'];

    function initialize(array $config):void {
        parent::initialize($config);
        if ($config['sandbox'] == TRUE) {
            
        } else {
           
        }
    }

     
    public function send_payment($order_id, $grand_total, $returnurl) {


        //$tblUsersObj = TableRegistry::get('Users');
       // $user_info = $tblUsersObj->get($this->Auth->user('id'));

        $billing_name = $user_info->first_name." ".$user_info->last_name;

        $billing_address = $user_info->address1;

        $billing_city = $user_info->city;

        $billing_state = $user_info->state;

        $billing_zip = $user_info->zip_code;

        $billing_tel = $user_info->mobile;

        $billing_email = $user_info->email_id;

        $delivery_name = $user_info->first_name . ' ' . $user_info->last_name;

        $delivery_address = $user_info->address1;

        $delivery_city = $user_info->city;

        $delivery_state = $user_info->state;

        $delivery_zip = $user_info->pin;

        $delivery_country = 'IN';

        $delivery_tel = $user_info->mobile;

        $customer_identifier = '';
        $orderData = [
            'receipt' => "3456",
            'amount' => $grand_total*100, // 2000 rupees in paise
            'currency' => 'INR',
            'payment_capture' => 1 // auto capture
        ];
//$razorpayOrder = $this->api->order->create($orderData);
        $razorpayOrder = $this->_generateOrder($orderData);
        $razorpayOrderId = $razorpayOrder->id;
        
        
        
        $instantPayment = TableRegistry::getTableLocator()->get('Bookings');
        $instant=$instantPayment->get($order_id);
        $instant->order_id = $razorpayOrderId;
        $instantPayment->save($instant);
      
        $_SESSION['razorpay_order_id'] = $razorpayOrderId;

        $displayAmount = $amount = $orderData['amount'];

        $data = [
            "key" => RAZORPAY_KEY_ID,
            "amount" => $amount,
            "name" => "Dr Yatri Thacker",
            "description" => "Razorpay Trusted Business",
            "prefill" => [
                "name" => $billing_name,
                "email" => $billing_email,
                "contact" => $billing_tel,
            ],
            "notes" => [
                "address" => $delivery_address,
                "merchant_order_id" => "12312321",
            ],
           
            "order_id" => $razorpayOrderId,
        ];

       
         $data['display_currency'] ="INR";
        return $data;
       
    }

    private function _generateOrder($postParam) {
        // Generated @ codebeautify.org
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/orders');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postParam));
        curl_setopt($ch, CURLOPT_USERPWD, RAZORPAY_KEY_ID . ':' . RAZORPAY_KEY_SECRET);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return json_decode($result);
    }

    public function getPayment($paymentId) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/payments/' . $paymentId);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        curl_setopt($ch, CURLOPT_USERPWD, RAZORPAY_KEY_ID . ':' . RAZORPAY_KEY_SECRET);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return json_decode($result);
    }
    public function verifyPayment($orderId){
        $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/orders/'.$orderId.'/payments');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

 curl_setopt($ch, CURLOPT_USERPWD, RAZORPAY_KEY_ID . ':' . RAZORPAY_KEY_SECRET);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
return json_decode($result);
    }

}
