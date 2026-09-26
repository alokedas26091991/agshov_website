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
                    <h4 class="card-title"><?= $this->Html->link(__('Select Your Report Type'), ['action' => 'index']) ?></h4>
                   
                </div>

                <div class="card-body">
                 
                    

                    <div class="card-block">
                       
    <div class="tables">
<?=
    $this->Form->postLink(
    "Product Report", // first
    ['action' => 'productreport'],  // second
    ['escape' => false, 'title' => 'Product Report', 'class' => 'btn btn-info', 'value'=>'Product Report'] // third
);
?>
&nbsp;&nbsp;
<?=
    $this->Form->postLink(
    "Order Report", // first
    ['action' => 'orderreport'],  // second
    ['escape' => false, 'title' => 'Order Report', 'class' => 'btn btn-success', 'value'=>'Order Report'] // third
);
?>
&nbsp;&nbsp;
<?=
    $this->Form->postLink(
    "Payment Report", // first
    ['action' => 'paymentreport'],  // second
    ['escape' => false, 'title' => 'Payment Report', 'class' => 'btn btn-warning', 'value'=>'Payment Report'] // third
);
?>
&nbsp;&nbsp;
<?=
    $this->Form->postLink(
    "Return Report", // first
    ['action' => 'returnreport'],  // second
    ['escape' => false, 'title' => 'Return Report', 'class' => 'btn btn-danger', 'value'=>'Return Report'] // third
);
?>
    </div>

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