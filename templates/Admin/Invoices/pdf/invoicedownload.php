<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dr. Yatri Thacker</title>
    <style>
        @page {
            margin: 40px;
        }
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            padding: 10px;
        }
        .header img {
            height: 60px;
            width: auto;
        }
        .title {
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 10px 0;
            background-color: #34495e;
            color: #fff;
            padding: 10px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .info-table th {
            background: #f4f4f4;
            padding: 8px;
            font-size: 12px;
            border: 1px solid #ccc;
        }
        .info-table td {
            padding: 8px;
            font-size: 12px;
            border: 1px solid #ccc;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .items-table th {
            background: #34495e;
            color: #fff;
            font-size: 12px;
            padding: 8px;
            text-align: center;
        }
        .items-table td {
            font-size: 12px;
            text-align: center;
            padding: 8px;
            border: 1px solid #ccc;
        }
        .items-table tr:nth-child(even) {
            background: #f4f4f4;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            padding: 10px;
            background-color: #34495e;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
		<img src="https://www.dryatrithacker.com/img/logo.png" style="height:50px;width:auto;">

        </div>

        <!-- Invoice Title -->
        <div class="title">Tax Invoice</div>

        <!-- Seller and Buyer Information -->
        <table class="info-table">
            <tr>
                <th>Invoice No:</th>
                <td><?= $invoice->invoice_no ?></td>
                <th>Invoice Date:</th>
                <td><?= date("d-m-Y", strtotime($invoice->creation_date)) ?></td>
            </tr>
            <tr>
                <th>Seller</th>
                <td colspan="3">Dr. Yatri Thacker, 215 , Mayur Hilla, Ground floor, Behind Bank of Baroda R. A. Kidwai rd, Near Wadala station Wadala - west Mumbai - 400019</td>
            </tr>
            <tr>
                <th>Buyer</th>
                <td colspan="3"><?= $invoice->user_delivery_detail->name ?>, <?= $invoice->user_delivery_detail->email ?>, <?= $invoice->user_delivery_detail->mobile?>, <?= $invoice->user_delivery_detail->home_address?>, <?= $invoice->user_delivery_detail->state?>,<?= $invoice->user_delivery_detail->city?>,<?= $invoice->user_delivery_detail->pin?></td>
            </tr>
        </table>

        <!-- Items Table -->
        <table class="items-table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Item Description</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Discount</th>
                    <th>Taxable Value</th>
                    <th>Tax Amount (%)</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoice->invoice_items as $key => $inv): ?>
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $inv->product->name ?><br>HSN: <?= $inv->product->hsn_code ?></td>
                    <td><?= $inv->quantity ?></td>
                    <td><?= round($inv->item_net_amount/$inv->quantity*100/($inv->product->gst_percentage+100), 2) ?></td>
                    <td><?= $inv->discount_amount ?? 0 ?></td>
                    <td><?= round(($inv->quantity * ($inv->item_net_amount / $inv->quantity * 100 / ($inv->product->gst_percentage+100))), 2) ?></td>
                    <td><?= $inv->product->gst_percentage ?>%</td>
                    <td><?= $inv->item_net_amount ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Total -->
        <table class="info-table">
            <tr>
                <th>Sub Total</th>
                <td colspan="3" style="text-align: right;">Rs. <?= $invoice->net_amt ?></td>
            </tr>
            <tr>
                <th>Delivery Charge</th>
                <td colspan="3" style="text-align: right;">Rs. <?= $invoice->total_delivery_charge ?></td>
            </tr>
            <tr>
                <th>Total (Inclusive of Taxes)</th>
                <td colspan="3" style="text-align: right;">Rs. <?= $invoice->net_amt+$invoice->total_delivery_charge ?></td>
            </tr>
        </table>

        <!-- Footer -->
        <div class="footer">
            Beware of fake calls offering cash prizes. Do not share personal information.
        </div>
    </div>
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
 
