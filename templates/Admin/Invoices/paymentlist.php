<?php use Cake\ORM\TableRegistry; ?>
<style>
.overlay {
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    position: fixed;
    background: #222;
}

.overlay__inner {
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    position: absolute;
}

.overlay__content {
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
}

.spinner {
    width: 75px;
    height: 75px;
    display: inline-block;
    border-width: 2px;
    border-color: rgba(255, 255, 255, 0.05);
    border-top-color: #fff;
    animation: spin 1s infinite linear;
    border-radius: 100%;
    border-style: solid;
}

@keyframes spin {
  100% {
    transform: rotate(360deg);
  }
}

</style>
<div class="main-content" ng-app="product" ng-controller="productCrt">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card1">
                <div class="card-header1">
                    <h4 class="card-title"><?= $this->Html->link(__('Payment List'), ['action' => 'index']) ?></h4>
                   
                </div>
                <?=
    $this->Form->postLink(
    "Add Payment", // first
    ['action' => 'allpayment'],  // second
    ['escape' => false, 'title' => 'Add Payment', 'class' => 'btn btn-info', 'value'=>'Add Payment'] // third
);
?>
&nbsp;&nbsp;
<?=
    $this->Form->postLink(
    "Payment List", // first
    ['action' => 'paymentlist'],  // second
    ['escape' => false, 'title' => 'Payment List', 'class' => 'btn btn-success', 'value'=>'Payment List'] // third
);
?>
&nbsp;&nbsp;
<?=
    $this->Form->postLink(
    "Order List", // first
    ['action' => 'index'],  // second
    ['escape' => false, 'title' => 'Order List', 'class' => 'btn btn-warning', 'value'=>'Order List'] // third
);
?>
                <div class="card-body">
                  <?=$this->element('search');?>
                    <div class="card-block">
                       
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
               
                <th><?= $this->Paginator->sort('Seller') ?></th>
           
                <th><?= $this->Paginator->sort('Invoice No') ?></th>
                <th><?= $this->Paginator->sort('Order ID') ?></th>
                <th><?= $this->Paginator->sort('Product Name') ?></th>
                <th><?= $this->Paginator->sort('Product Price') ?></th>
               <th><?= $this->Paginator->sort('Seller Payable') ?></th>
              
				<th><?= $this->Paginator->sort('Quantity') ?></th>
				<th><?= $this->Paginator->sort('Total Amount') ?></th>
				<th><?= $this->Paginator->sort('Total Seller Payable') ?></th>
			
			

                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($invoice1 as $inv):
            
            if($inv->order_status==0)
            {
                $order_status="Processing";
            }
            else if($inv->order_status==1)
            {
                $order_status="Onhold";
            }
            else if($inv->order_status==2)
            {
                $order_status="Completed";
            }
            else if($inv->order_status==3)
            {
                $order_status="Cancelled";
            }
            else
            {
                $order_status="Order Confirmed";
            }
            
            if($inv->return_status==1)
            {
                $return_status="Return Request";
            }
            else if($inv->return_status==2)
            {
                $return_status="Return Approved";
            }
               else if($inv->return_status==3)
            {
                $return_status="Return Completed";
            }
            else
            {
                $return_status="NA";
            }
            
            if($inv->payment_status==0)
            {
                $payment_status="Not Paid";
            }
            else
            {
                $payment_status="Paid";
            }
            
            
            $chargeObj = TableRegistry::get('ProductCharges');
        	$charge=$chargeObj->find()->where(['is_active'=>1,'type_id'=>$inv->product->type_id]);
        	$total=0;
                foreach($charge as $c){
                    $cha=($c->charge_type!=1)?(($c->value*$inv->product->offer_price/100)):$c->value;
                    $total= $total+$cha;
                    
                }
               $seller_payable= $inv->product->offer_price-$total;

		
		?>
            <tr>
                <td><?= $this->Number->format($inv->id) ?></td>
                   
                
				<td><?= h($inv->user->first_name) ?></td>
			
				<td><?= h($inv->invoice->invoice_no) ?></td>
				<td><?= h($inv->invoice->order_id) ?></td>
                <td><?= h($inv->product->name) ?></td>
                <td><?= h($inv->product->offer_price) ?></td>
                <td><?= $seller_payable ?></td>
                <td><?= h($inv->quantity) ?></td>
               
			   
			 <td><?= ($inv->product->offer_price*$inv->quantity) ?></td>
			   <td><?=$seller_payable*$inv->quantity ?></td>
			  
               
                    <td class="actions">
                   
                   
                    
	
				
					<?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Invoice Details') . '</span>', ['action' => 'addpayment1', $inv->id], ['confirm' => __('Are you sure you want to Pay ?'),'escape' => false, 'class' => 'btn-default', 'title' => __('Add Payment')]) ?>
					
              
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    	 <nav aria-label="Page navigation mb-3">
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div></nav>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>								   

</div>



</div>
<script>var ajxUrl='<?=$this->Url->build("/admin/products");?>'</script>
	  <?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/product'],['block'=>'scriptBottom']);?>