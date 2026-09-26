<?php 
declare(strict_types=1);
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;


class ShypliteComponent extends Component
{
	private $_token;
	 public function initialize(array $config): void {
        parent::initialize($config);
       
    }
   private function _orderDetails($invoiceItemId,$rerurn){
	  
	   $Invoices = TableRegistry::getTableLocator()->get('Invoices');
	   $ShypliteDetails =TableRegistry::getTableLocator()->get('ShypliteDetails');
	   $orderData=[];
	   $InvoiceItems =TableRegistry::getTableLocator()->get('InvoiceItems');
	   $invoiceitem=$InvoiceItems->get($invoiceItemId,['contain'=>['Invoices']]);
	   
	   $invoice_count=$InvoiceItems->find("all")->where(['invoice_id' => $invoiceitem->invoice->id])->count();
       $cod_charge=round($invoiceitem->invoice->cod_amt/$invoice_count);
	   
	   $total_amount1=$invoiceitem->item_net_amount+($invoiceitem->quantity*$invoiceitem->delivery_charge);
	   $total_amount=$total_amount1-$invoiceitem->discount_amount+$cod_charge;
	  
	   $deliverydetails=$Invoices->UserDeliveryDetails->get($invoiceitem->invoice->user_delivery_detail_id);
	   
	   
	   $product=$InvoiceItems->Products->get($invoiceitem->product_id);
	   
	   
	   
    if($invoiceitem->invoice->pay_mode==2)
    {
        $this->pay="COD";
    }
    else
    {
        $this->pay="prepaid";
    }
	$syplite=$ShypliteDetails->newEmptyEntity();
	$syplite->invoice_item_id=$invoiceItemId;
	$syplite->type=1;

    if($invoiceitem->vendor_id==4)
    {
		
        $this->vendor="78217";
    }

	if($rerurn){
		$syplite->type=2;
		$this->pay="reverse";
	}
	   $ShypliteDetails->save($syplite);
	   
	   
	   
					$orderData[]=array(
                    "orderId"=> $syplite->id,
                    "customerName"=> $deliverydetails->name,
                    "customerAddress"=> $deliverydetails->home_address,
                    "customerCity"=> $deliverydetails->city,
                    "customerPinCode"=> $deliverydetails->pin,
                    "customerContact"=> $deliverydetails->mobile,
                    "orderDate"=> date('Y-m-d'),
                    "modeType"=> "Air",
                    "orderType"=> $this->pay,
                    "totalValue"=> $total_amount,
                    "categoryName"=> "Others",
                    "packageName"=> $product->name,
                    "quantity"=> $invoiceitem->quantity,
                    "packageLength"=>$product->length,
                    "packageWidth"=> $product->width,
                    "packageHeight"=> $product->height,
                    "packageWeight"=> $product->weight,
                    "sellerAddressId"=> $this->vendor 
                );
				
				return $orderData;
				
				

	   
	   }
			
	public function  set_order($invoiceItemId,$rerurn=false) {
				$orderData=$this->_orderDetails($invoiceItemId,$rerurn);
			//	echo $orderData[0]['orderId'];
				
    $timestamp = time();
    $appID = 7599;
    $key = 'ZlQyJ0TMjBY=';
    $secret = '5d+qo6mHMQg1CNtSIAf4PsAhWd9iLAcMBaJiLPeuF27Rwa5XL49eGLl7sf0F9sjH/ucJNQm7XoZghCAWbaNfRg==';

    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
    $ch = curl_init();

    $data = array( 'orders'=>$orderData);

    $data_json = json_encode($data);


    $header = array(
        "x-appid: $appID",
        "x-sellerid:142220",
        "x-timestamp: $timestamp",
        "x-version:3", // for auth version 3.0 only
        "Authorization: $authtoken",
        "Content-Type: application/json",
        "Content-Length: ".strlen($data_json)
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/order');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response  = curl_exec($ch);
    $returndata=(json_decode($response));
    //print_r($returndata);die;
	
	//$shipment=$this->getShipmentSlip($orderData[0]['orderId'],$invoiceItemId);
    curl_close($ch);
	return $returndata;
			}

function get_manifest($manifest) {
    $timestamp = time();
    $appID = 7599;
    $key = 'ZlQyJ0TMjBY=';
    $secret = '5d+qo6mHMQg1CNtSIAf4PsAhWd9iLAcMBaJiLPeuF27Rwa5XL49eGLl7sf0F9sjH/ucJNQm7XoZghCAWbaNfRg==';

    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
    $ch = curl_init();

    $header = array(
        "x-appid: $appID",
        "x-timestamp: $timestamp",
        "x-sellerid:142220",
        "x-version:3", // for auth version 3.0 only
        "Authorization: $authtoken"
    );

    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/getManifestPDF/'.$manifest);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    $returndata=(json_decode($server_output));
    //var_dump($server_output);
    //exit;
    curl_close($ch);
    return $returndata;
}			

	
public function getShipmentSlip($orderId) {
	 $timestamp = time();
    $appID = 7599;
    $key = 'ZlQyJ0TMjBY=';
    $secret = '5d+qo6mHMQg1CNtSIAf4PsAhWd9iLAcMBaJiLPeuF27Rwa5XL49eGLl7sf0F9sjH/ucJNQm7XoZghCAWbaNfRg==';

    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
    $ch = curl_init();

    $header = array(
        "x-appid: $appID",
        "x-timestamp: $timestamp",
        "x-sellerid:142220",
        "x-version:3", // for auth version 3.0 only
        "Authorization: $authtoken"
    );

    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/getSlip?orderID='.urlencode($orderId));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    $returndata=(json_decode($server_output));
    //print_r($returndata);die;
    curl_close($ch);
	return $returndata;
}
public function track($aono) {
     $timestamp = time();
    $appID = 7599;
    $key = 'ZlQyJ0TMjBY=';
    $secret = '5d+qo6mHMQg1CNtSIAf4PsAhWd9iLAcMBaJiLPeuF27Rwa5XL49eGLl7sf0F9sjH/ucJNQm7XoZghCAWbaNfRg==';

    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
    $ch = curl_init();

    $header = array(
        "x-appid: $appID",
        "x-timestamp: $timestamp",
        "x-sellerid:142220",
        "x-version:3", // for auth version 3.0 only
        "Authorization: $authtoken"
    );

    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/track/'.$aono);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
   $returndata=(json_decode($server_output));
   /*$returndata=(json_decode('{
    "data": { "awbNo": "70402438352", "carrierName": "BLUEDART", "events":[{
                "status": "IT",
                "Remarks": "SHIPMENT ARRIVED",
                "Location": "COD PROCESSING CENTRE 4",
                "Time": "2017-06-30T13:06:00.000Z"
            },
            {
                "status": "OD",
                "Remarks": "SHIPMENT OUT FOR DELIVERY",
                "Location": "DWARIKA E-TAIL CENTRE",
                "Time": "2017-07-02T00:23:00.000Z"
            },
            {
                "status": "EX",
                "Remarks": "CONSIGNEE NOT AVAILABLE",
                "Location": "DWARIKA E-TAIL CENTRE",
                "Time": "2017-07-02T03:14:00.000Z"
            },
            {
                "status": "DL",
                "Remarks": "SHIPMENT DELIVERED",
                "Location": "DWARIKA E-TAIL CENTRE",
                "Time": "2017-07-05T03:26:00.000Z"
            }
        ]
    }
}'));*/
    curl_close($ch);
	return $returndata;
}
function cancel_order($idArr) {
     $timestamp = time();
    $appID = 7599;
    $key = 'ZlQyJ0TMjBY=';
    $secret = '5d+qo6mHMQg1CNtSIAf4PsAhWd9iLAcMBaJiLPeuF27Rwa5XL49eGLl7sf0F9sjH/ucJNQm7XoZghCAWbaNfRg==';

    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
    $ch = curl_init();

    $data = array( 
        "orders"=> $idArr
    );

    $data_json = json_encode($data);

    $header = array(
        "x-appid: $appID",
        "x-sellerid:142220",
        "x-timestamp: $timestamp",
        "x-version:3", // for auth version 3.0 only
        "Authorization: $authtoken",
        "Content-Type: application/json",
        "Content-Length: ".strlen($data_json)
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/ordercancel');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response  = curl_exec($ch);
    
   // var_dump($response);
   // exit;
    curl_close($ch);

}
	
}
