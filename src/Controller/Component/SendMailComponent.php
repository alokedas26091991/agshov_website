<?php
declare(strict_types=1);
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Mailer;
use Cake\Log\Log;
use Throwable;

/**
 * CakePHP SendMailComponent
 * Mail sending class across application
 * @author Accen
 */
class SendMailComponent extends Component {

    protected $email;
    protected $base;
    private $_subject;
    private $_all_items_name;
    private $_vendor_details;
    private $_email_id;
    function initialize(array $config): void {
        parent::initialize($config);
        $this->email = \Cake\ORM\TableRegistry::getTableLocator()->get('Emails');
        $this->_vendor_details = [];
        $this->_email_id = NULL;
    }

    /**
     * get header and footer
     */
    private function _getHeaderAndFooter() {
        $templates = $this->email->find('all')->select(['body'])
                ->where(['name' => 'base'])
                ->first();
        $this->base = $templates ? $templates->body : '__MAIL_CONTENT__';
    }

    /**
     * 
     * @param type $id
     * @param type $send_to
     * @param type $data
     * @return type
     */
    public function sendMail($id, $send_to = NULL, $data = NULL,$cc=NULL,$attachment=NULL) {
        if ($send_to == NULL) {
            return;
        }
        $this->_email_id = $id;
        $this->_getHeaderAndFooter();

        $mail_info = $this->email->find()->where(['id' => $id])->first();
        if (!$mail_info) {
            Log::error('SendMail template ID not found: ' . $id);
            return;
        }

        $mail_body = $this->_changeMailContent($mail_info->body, $data, $mail_info->subject);
        $org_mail_body = str_replace('__MAIL_CONTENT__', $mail_body, $this->base);
    
        try {
            $Email = new Mailer("default");
            $fromEmail = !empty($mail_info->send_from) && strpos($mail_info->send_from, '@') !== false && strpos($mail_info->send_from, 'renukacreation') === false ? $mail_info->send_from : 'accenditoresoftware0005@gmail.com';
            $Email->setFrom([$fromEmail => "Agshov Pharmaceuticals"]);
            $Email->setEmailFormat('html');
            $Email->setTo($send_to);
            $Email->setSubject($this->_subject ?: ($mail_info->subject ?: 'New Enquiry'));
            $Email->deliver($org_mail_body);
        } catch (\Throwable $e) {
            Log::error('Mail sending error for template ' . $id . ' to ' . $send_to . ': ' . $e->getMessage());
        }
    }

    /**
     * set data in content
     * @param type $content
     * @param type $data
     * @return type
     */
    private function _changeMailContent($content, $data, $subject = null) {
        if (isset($data['user_id'])) {
            $userObj = TableRegistry::getTableLocator()->get('Users');
            $user_info = $userObj->findById($data['user_id'])->select(['name', 'email','mobile'])->first();
            $content = str_replace('__FIRSTNAME__', $user_info->name, $content);
            // $content = str_replace('__LASTNAME__', $user_info->last_name, $content);
            $content = str_replace('__EMAIL__', $user_info->email, $content);
            //$content = str_replace('__MOBILE__', $user_info->mobile, $content);
		
            

            /* change subject */
            $subject = str_replace('__FIRSTNAME__', $user_info->name, $subject);
            // $subject = str_replace('__LASTNAME__', $user_info->last_name, $subject);
        }
        
        if(isset($data['productname']))
        {
            $content = str_replace('__PRODUCTNAME__', $data['productname'], $content);
        }

        if(isset($data['variant']))
        {
            $content = str_replace('__VARIANT__', $data['variant'], $content);
        } else {
            $content = str_replace('__VARIANT__', 'N/A', $content);
        }
        
        if(isset($data['appointment_date']))
        {
            $content = str_replace('__DATE__', $data['appointment_date'], $content);
        }
        if(isset($data['appointment_time']))
        {
            $content = str_replace('__TIME__', $data['appointment_time'], $content);
        }
        if(isset($data['video_link']))
        {
            $content = str_replace('__VIDEO__', $data['video_link'], $content);
        }
        if(isset($data['status']))
        {
            $content = str_replace('__STATUS__', $data['status'], $content);
        }
        
        if(isset($data['name']))
        {
            $content = str_replace('__NAME__', $data['name'], $content);
        }
        if(isset($data['email']))
        {
            $content = str_replace('__EMAIL__', $data['email'], $content);
        }
        if(isset($data['mobile']))
        {
            $content = str_replace('__MOBILE__', $data['mobile'], $content);
        }
        if(isset($data['message']))
        {
            $content = str_replace('__MESSAGE__', $data['message'], $content);
        }
        
        if(isset($data['otp_code']))
        {
            $content = str_replace('__OTPCODE__', $data['otp_code'], $content);
        }
        if (isset($data['act_link']))
        {
            if($this->_email_id == 4){
                $content = str_replace('__ACTIVATIONLINK__',  $data['act_link'] , $content);
            }
            else{
                $content = str_replace('__ACTIVATIONLINK__', '<a href="' . $data['act_link'] . '">' . $data['act_link'] . '</a>', $content);
            }
        }
        if (isset($data['password'])) {
            $content = str_replace('__PASSWORD__', $data['password'], $content);
        }
        if (isset($data['content'])) {
            $content = str_replace('__CONTENT__', $data['content'], $content);
        }

       
        
       
        $this->_subject = $subject;
        return $content;
    }
    
    public function sendPaymentEmail($data = NULL,$email_tpl_id=6,$attachment=NULL) {
        $this->_getHeaderAndFooter();
        
        $userObj = TableRegistry::getTableLocator()->get('Users');

        $user_info = $userObj->findById($data['invoice']->user_id)->select(['first_name', 'last_name', 'email','mobile','address1','state','city','pin','country'])->first();
        $mail_info = $this->email->find()->where(['id' => $email_tpl_id])->first();
        
        $pay_success = TRUE;
        
        
        $mail_body = $this->_addPaymentInfo($mail_info->body, $data,$mail_info->subject,$user_info,$pay_success);
        
        $org_mail_body = str_replace('__MAIL_CONTENT__', $mail_body, $this->base);
        
       
            
            
            //$email = new Email('production');
           
            try {
              
					$email = new Email();
                    $email->from([$mail_info->send_from => $mail_info->send_from_name])
                        ->to($user_info->email)
                        ->subject($this->_subject)
                        ->emailFormat('html');
                         if($attachment){
                            $email->addAttachments($attachment);
                        }
                       $email->send($org_mail_body);


                    
              
               
                
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        
    }

    /**
     * 
     * @param String $content
     * @param array $data
     * @return String
     */
    private function _addPaymentInfo($content = '', $data = [],$subject='',$user_info=[],$type=TRUE) {
        $this->_all_items_name = [];
        $item_details = '<table border="0px" style="width:auto;width:100%;background-color:transparent;border-collapse:collapse;border-spacing:0;max-width:100%;border:1px solid #ddd">';
        $item_details.= '<thead style="background:#282929;color:#fff">
                                <tr style="border-top:1px solid #dddddd">
                                    <td>&nbsp;</td>
                                        <td align="left" style="padding-left:2%">
                                                Item Name
                                        </td>
                                        <td>
                                                Price(INR)
                                        </td>
                                        <td>
                                                Discount(INR)
                                        </td>
                                </tr>
                        </thead><tbody>';
                        
        if($type)
        {
            $invoice_details = $data['invoice_details'];
            $str='';
            $coupon_id = NULL;
            for($i=0;$i<sizeof($invoice_details);$i++)
            {
                $str.='<tr style="border-bottom: 1px solid #ccc;">';
               
                    $str.='<td><img style="width:150px;height:100px" src="" /></td>';
                
                if(isset($invoice_details[$i]->coupon_id))
                {
                    $coupon_id = $invoice_details[$i]->coupon_id;
                }
               // $this->_all_items_name[]=$invoice_details[$i]->product->name;
                $str.='<td></td>';
                $str.='<td>'.$invoice_details[$i]->item_gross_amount.'</td>';
                $str.='<td>'.$invoice_details[$i]->discount_amount.'</td></tr>';
            }
            $str.='<tr><td colspan="3" style="text-align: right">Tax: (INR) </td><td>'.$data['invoice']->tax_amt.'</td></tr>';
            $str.='<tr border-top: 1px solid #ccc;><td colspan="3" style="text-align: right;border-top: 1px;">Total Paid: (INR) </td><td>'.(doubleval($data['invoice']->tax_amt)+ doubleval($data['invoice']->net_amt)).'</td></tr>';
            if(isset($data['payment_mode']))
            {
                $str.='<tr style="border-top: 1px solid #ccc;"><td colspan="3" style="border-top: 1px;font-weight:bold;">*Payment Made With:  </td><td>&nbsp;</td></tr>';
            }
            if($coupon_id){
               // $str.='<tr style="border-top: 1px solid #ccc;"><td colspan="3" style="border-top: 1px;font-weight:bold;">*Coupon Used: '.  $this->_getCouponCode($coupon_id).' </td><td>&nbsp;</td></tr>';
                
            }
            
        }
        else
        {
            $str = $this->_cancelPayMail($data);
        }
        $item_details.=$str;
        $item_details.='</tbody></table>';
        
        
        
        $content = str_replace('__FIRSTNAME__', $user_info->first_name, $content);
        $content = str_replace('__LASTNAME__', $user_info->last_name, $content);
        $content = str_replace('__EMAIL__', $user_info->email, $content);
        $content = str_replace('__MOBILE__', $user_info->mobile, $content);
      
        $content = str_replace('__ADDRESS__', $user_info->address1.', '.$user_info->city.'-'.$user_info->pin.', '.$user_info->state.', '.$user_info->country, $content);
        
        if($type==FALSE)
        {
            $content = str_replace('__REASON__', $data['reason'], $content);
        }
        
        $content = str_replace('__PAYMENT_INFO__', $item_details, $content);
        
        
        /* change subject */
        $subject = str_replace('__FIRSTNAME__', $user_info->first_name, $subject);
        $subject = str_replace('__LASTNAME__', $user_info->last_name, $subject);
        
        $this->_subject = $subject;
        
        return $content;
    }
    /**
     * for cancel payment admin
     * @param type $data
     * @return string
     */
    private function _cancelPayMail($data = [])
    {
        $str='';
        $invoice_details = $data['invoice_details'];
        for($i=0;$i<sizeof($invoice_details);$i++)
        {
            $str.='<tr>';
            $str.='<td>'.$invoice_details[$i]['item']->name.'</td>';
            $str.='<td>'.$invoice_details[$i]['item']->offer_price.'</td></tr>';
        }
        $str.='<tr><td style="text-align: right">Amount: (INR) </td><td>'.($data['invoice']->net_amt).'</td></tr>';
        return $str;
    }
   public function sendOTP($msg,$ph){
      $url = "https://apps.malert.io/api/api_http.php";
    $recipients = array($ph);
    $param = array(
        'username' => 'Febino',
        'password' => 'api@2022',
        'senderid' => 'FEBINO',
        'text' => $msg,
        'route' => 'Informative',
        'type' => 'text',
        'datetime' => date("Y-m-d H:i:s"),
        'to' => implode(';', $recipients),
    );
    $post = http_build_query($param, '', '&');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Connection: close"));
    $result = curl_exec($ch);
    if(curl_errno($ch)) {
        $result = "cURL ERROR: " . curl_errno($ch) . " " . curl_error($ch);
    } else {
        $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        switch($returnCode) {
            case 200 :
                break;
            default :
                $result = "HTTP ERROR: " . $returnCode;
        }
    }
   
    curl_close($ch);
    
    
    
   }


   
}

