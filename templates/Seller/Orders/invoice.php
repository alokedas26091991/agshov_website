<!doctype html>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
<style>
 
</style>
</head>
<body style="font-family: 'Open Sans', sans-serif;">
  
	
	
	
	
	<table style="width:100%">
	    <tr>
	        <td style="width: 100%;">
	           
    		    <div style="text-align:center;  padding:5px; margin-bottom:5px;width:100%">
    			<img src="/assets/images/logo1.jpg" style="height:100px;width:200px;">
    			</div>
                <table style="width: 100%;">
            		<tr>
            			<th colspan="3" class="text-center" style="background: #e1e1e1;padding: 6px;font-size: 24px;border-top: 2px solid #989898;border-bottom: 2px solid #989898;text-transform: uppercase;">TAX INVOICE (ORIGINAL FOR RECIPIENT)</th>
            		</tr>
            		<tr>
            			<td>
            				<p style="margin: 0;font-size: 20px; text-transform: uppercase;"><span style="font-weight: 600;">INVOICE NUMBER :</span> <?= $invoice->invoice_no ?></p>
            			</td>
            			<td>
            				<p style="font-size: 20px; text-transform: uppercase;"><span style="font-weight: 600;">INVOICE DATE :</span> <?= $invoice->creation_date ?></p>
            				
            			</td>
            			<td>
            			    <p style="margin: 0;font-size: 20px; text-transform: uppercase;"><span style="font-weight: 600;">Order ID :</span> <?= $invoice->order_id ?></p>
            			</td>
            		</tr>
                </table>
            	<table style="width: 100%; border-spacing: 0;">
            		<tr>
            			<th style="background: #e1e1e1;padding: 6px;font-size: 24px;border-top: 2px solid #989898;border-bottom: 2px solid #989898;text-transform: uppercase;text-align: left;border-right:1px solid">Seller</th>
            			<th style="background: #e1e1e1;padding: 6px;font-size: 24px;border-top: 2px solid #989898;border-bottom: 2px solid #989898;text-transform: uppercase;text-align: left;">Buyer</th>
            		</tr>
            		<tr>
            			<td style="width:50%; border-right:1px solid;padding: 0 6px;border-bottom: 2px solid;">
            				<p style="margin: 0;font-size: 20px; text-transform: uppercase;"><span style="font-weight: 600;">ARGSA :<br></span> 1st Foor, Sri Sri Gopal Villa, M B Road, Birati<br><span style="font-weight: 600;">CITY</span> Kolkata / <span style="font-weight: 600;">STATE</span> West Bengal<br><span style="font-weight: 600;">Pin</span> 700051<br><span style="font-weight: 600;">GSTIN:</span> 12365478965</p>
            			</td>
            			<td style="padding: 0 6px;border-bottom: 2px solid;">
            				<p style="margin: 0;font-size: 20px; text-transform: uppercase;"><span style="font-weight: 600;"><?= $invoice->user_delivery_detail->name ?><br></span> Address<br><?= $invoice->user_delivery_detail->home_address ?><br><span style="font-weight: 600;">CITY</span> <?= $invoice->user_delivery_detail->city ?> / <span style="font-weight: 600;">State</span> <?= $invoice->user_delivery_detail->state ?>
            				<br><span style="font-weight: 600;">Pin</span> <?= $invoice->user_delivery_detail->pin ?><br>
            				<?php
            				if($invoice->user_delivery_detail->gst)
            				{
            			    ?>
            				<span style="font-weight: 600;">GST NO</span> <?= $invoice->user_delivery_detail->gst ?>
            				<?php
            				}
            				?>
            				
            				</p>
            			</td>
            		</tr>
            		<tr>
            		    <td style="padding: 0 6px;">
            				<p style="margin: 5px 0;font-size: 20px;text-transform: uppercase;"><span style="font-weight: 600">DISPATCHED VIA</span> </p>
            			</td>
            			<td style="padding:0 6px">
            				<p style="margin: 5px 0;font-size: 20px;text-transform: uppercase;"><span style="font-weight: 600">DISPATCH DOC. NO. (AWB)</span> </p>
            			</td>
            		</tr>
                </table>
            	<table style="width: 100%; border-spacing: 0" class="text-center">
            		<tr>
            			<th style="background: #e1e1e1;padding: 8px 0;border-top: 2px solid #989898;font-size:20px;text-transform:uppercase;border-right:2px solid #989898">S.No.</th>
            			<th style="background: #e1e1e1;padding: 8px 0;border-top: 2px solid #989898;font-size:15px;text-transform:uppercase;border-right:2px solid #989898;width:20%;">ITEM DESCRIPTION</th>
            			<th style="background: #e1e1e1;padding: 8px 0;border-top: 2px solid #989898;font-size:20px;text-transform:uppercase;border-right:2px solid #989898;width:10%;">Qty</th>
            			
            			<th style="background: #e1e1e1;padding: 8px 0;border-top: 2px solid #989898;font-size:20px;text-transform:uppercase;border-right:2px solid #989898;">Rate</th>
            			
            			<th style="background: #e1e1e1;padding: 8px 0;border-top: 2px solid #989898;font-size:20px;text-transform:uppercase;border-right:2px solid #989898;width:10%;">Discount</th>
            			
            			
            			<th style="background: #e1e1e1;padding: 8px 0;border-top: 2px solid #989898;font-size:20px;text-transform:uppercase;border-right:2px solid #989898;width:20%;">Taxable Value</th>
            			<th style="background: #e1e1e1;padding: 8px 0;border-top: 2px solid #989898;font-size:20px;text-transform:uppercase;border-right:2px solid #989898;width:20%;">Tax Amount(%)</th>
            			
            			
            		</tr>
            		<?php
            		foreach($invoice->invoice_items as $in)
            		{?>
            		<tr>
            			<td style="text-align:center; border-right:2px solid #989898;font-size:20px;">1</td>
            			<td style="font-size:15px; border-right:2px solid #989898;padding:5px;width: 20%">
            				<?= $inv->product->name ?></br>
            				
            				</br>
            				<b>HSN Code:</b><?= $inv->product->hsn_code ?>
            			</td>
            			<td style="font-size:20px; border-right:2px solid #989898;padding:5px;text-align:center;"><?= $inv->quantity ?></td>
            			<td style="font-size:20px; border-right:2px solid #989898;padding:5px;text-align:center;"><?= round($inv->item_net_amount/$inv->quantity*100/($inv->product->gst_percentage+100),2) ?></td>
            			
            			<td style="font-size:20px; border-right:2px solid #989898;padding:5px;text-align:center;">
            			    
            			    <?php
            			    if($inv->discount_amount!=NULL)
            			    {?>
            			       <?= $inv->discount_amount ?>
            			    <?php   
            			    }
            			    
            			    else
            			    {
            			    ?>
            			    0
            			    <?php } ?>
            			   
            			    
            			
            			    </td>
            			<td style="font-size:20px; border-right:2px solid #989898;padding:5px;text-align:center;"><?= round((($inv->quantity*($inv->item_net_amount/$inv->quantity*100/($inv->product->gst_percentage+100)))),2) ?></td>

            			<td style="font-size:20px; border-right:2px solid #989898;padding:5px;text-align:center;">
            			    <?php
            	    	
            	    		           $gst=($inv->quantity*$inv->item_net_amount/$inv->quantity)-($inv->quantity*($inv->item_net_amount/$inv->quantity*100/($inv->product->gst_percentage+100)));
                    	    		 
                    	    		    $gst_igst=round($gst,2);
                    	    		    
                    	    		  echo $gst_igst . '('.$inv->product->gst_percentage.'%)';
            	    		
            	    		?>
            			    </td>
            			    
            		</tr>
            		<?php
            		}
            		?>
            		     
            	    		            		<tr class="text-center">
                                    		    <td colspan="3" style="font-size:22px;border-top:2px solid #989898;border-bottom: 2px solid #989898;padding:5px">CASH ON DELIVERY CHARGE</td>
                                    			<td colspan="1" style="font-size:22px;border-top:2px solid #989898;border-bottom: 2px solid #989898;padding:5px">&#8377 <?= $cod_charge ?></td>
                                    			<td colspan="3" style="font-size:22px;border-top:2px solid #989898;border-bottom: 2px solid #989898;padding:5px">SUB TOTAL</td>
                                    			<td colspan="1" style="font-size:22px;border-top:2px solid #989898;border-bottom: 2px solid #989898;padding:5px;text-align:right;">&#8377 <?= $invoice->item_net_amount+$invoice->delivery_charge+$cod_charge ?></td>
                                    		</tr>
                                    		<tr class="text-center">
                                    		    <td colspan="3" style="font-size:22px;border-top:2px solid #989898;border-bottom: 2px solid #989898;padding:5px"></td>
                                    			<td colspan="1" style="font-size:22px;border-top:2px solid #989898;border-bottom: 2px solid #989898;padding:5px"></td>
                                    			<td colspan="3" style="font-size:22px;border-top:2px solid #989898;border-bottom: 2px solid #989898;padding:5px">TOTAL( INCLUSIVE OF TAXES)</td>
                                    			<td colspan="1" style="font-size:22px;border-top:2px solid #989898;border-bottom: 2px solid #989898;padding:5px;text-align:right;">&#8377 <?= $invoice->item_net_amount+$invoice->delivery_charge+$cod_charge ?></td>
                                    		</tr>
            	    		 


            		<tr>
            			<td colspan="5" style="padding:5px;">
            				<p style="margin:0;font-size:20px;text-transform: uppercase;font-weight: 600;">
            				
            				<?= priceTextConvert($invoice->item_net_amount+($invoice->quantity*$invoice->delivery_charge)+$cod_charge) ?>
            				
            				</p>
            				
            			</td>
            			<td colspan="5">
            			    <p style="margin:0;margin-bottom:5px;font-size:19px">whether the tax is payable on reverse charge basis : NO</p>
            			</td>
            		</tr>
            		<tr>
            			<td colspan="10" style="border: 1px solid;padding: 10px;text-align: center;font-size: 15px;">
            				Beware of fake Calls/SMS/Emails offering any cash/prize under any fraud scheme/lottery/lucky draw. Do not share any information or pay any amount
            			</td>
            		</tr>
            		<tr>
            			<td colspan="5" style="vertical-align: baseline;border-bottom: 1px solid">
            				<p style="margin:0;margin-top:10px;font-size:20px;"><span style="font-weight: 600;text-transform: uppercase;">DECLARATION</span><br>
            				We declare that this invoice shows actual price of
            				the goods described inclusive of taxes and that all
            				particulars are true and correct.</p>
            				
            				<p style="margin:0;font-size:20px;"><span style="font-weight: 600;text-transform: uppercase;">CUSTOMER ACKNOWLEDGEMENT</span><br>
            				I <?= $invoice->invoice->user_delivery_detail->name ?> hereby confirm that the above
            				said product/s are being purchased for my internal
            				/ personal consumption and not for re-sale.</p>
            			</td>
            			<td colspan="5" style="border-bottom: 1px solid; text-align:right">
            				<p style="margin:0;font-size:20px;font-weight: 600;"><?= $vendor1->company_name ?></p>
            				<?php
            				if($vendor1->upload_signature!=NULL)
            				{?>
            				
            				<img src="" style="height:100px;width:200px;">
            				<?php } ?>
            				<p style="margin:0;font-size:20px;font-weight: 600;">Authorised Signatory</p>
            			</td>
            		</tr>
                </table>
            </td>  
	    </tr>
	</table>
</body>
</html>
<?php 
 function priceTextConvert($number){
		
							   $no = round($number);
							   $point = round($number - $no, 2) * 100;
							   $hundred = null;
							   $digits_1 = strlen($no);
							   $i = 0;
							   $str = array();
							   $words = array('0' => '', '1' => 'one', '2' => 'two',
								'3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
								'7' => 'seven', '8' => 'eight', '9' => 'nine',
								'10' => 'ten', '11' => 'eleven', '12' => 'twelve',
								'13' => 'thirteen', '14' => 'fourteen',
								'15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
								'18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
								'30' => 'thirty', '40' => 'forty', '50' => 'fifty',
								'60' => 'sixty', '70' => 'seventy',
								'80' => 'eighty', '90' => 'ninety');
							   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
							   while ($i < $digits_1) {
								 $divider = ($i == 2) ? 10 : 100;
								 $number = floor($no % $divider);
								 $no = floor($no / $divider);
								 $i += ($divider == 10) ? 1 : 2;
								 if ($number) {
									$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
									$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
									$str [] = ($number < 21) ? $words[$number] .
										" " . $digits[$counter] . $plural . " " . $hundred
										:
										$words[floor($number / 10) * 10]
										. " " . $words[$number % 10] . " "
										. $digits[$counter] . $plural . " " . $hundred;
								 } else $str[] = null;
							  }
							  $str = array_reverse($str);
							  $result = implode('', $str);
							  if(empty($result)){
								  return  $result;
							  }
							  $points = ($point) ?
								"." . $words[$point / 10] . " " . 
									  $words[$point = $point % 10] : '';
									  if(!empty($points)){
										 $text= "Rupees  ".$result ;
										  
									  }else{
										   $text="Rupees ".$result ;
									  }
							  return ucwords($text)." only";
					}
?>
<style>
div.b128{
 border-left: 1px black solid;
 height: 60px;
} 
</style>
 
