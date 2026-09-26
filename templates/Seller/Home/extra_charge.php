        <?php use Cake\ORM\TableRegistry; ?>
        <div class="page-wrapper" ng-app="product" ng-controller="productCrt">
            <!-- ============================================================== -->
              <div class="row">
    <div class="col-sm-2">
      <div class="card bg-primary text-white text-center" style="height:100px;">
        <div class="card-body">Total New Orders: <br><i class="fa fa-inr"></i><?= $abc ?></div>
      </div>
    </div>

        <div class="col-sm-2">
      <div class="card bg-warning text-white text-center" style="height:100px;">
        <div class="card-body">Total Completed: <br><i class="fa fa-inr"></i><?=$abc2?></div>
      </div>
    </div>
        <div class="col-sm-2">
      <div class="card bg-danger text-white text-center" style="height:100px;">
        <div class="card-body">Total Cancelled: <br><i class="fa fa-inr"></i><?=$abc3?></div>
      </div>
    </div>
        <div class="col-sm-2">
      <div class="card bg-secondary text-white text-center" style="height:100px;">
        <div class="card-body">Total Return: <br><i class="fa fa-inr"></i><?=$abc4?></div>
      </div>
    </div>
        <div class="col-sm-2">
      <div class="card bg-success text-white text-center" style="height:100px;">
        <div class="card-body">Received Payment: <br><i class="fa fa-inr"></i><?= $abc5 ?></div>
      </div>
    </div>
        <div class="col-sm-2">
      <div class="card bg-dark text-white text-center" style="height:100px;">
        <div class="card-body">Total Due: <br><i class="fa fa-inr"></i><?=$total_due?></div>
      </div>
    </div>
  </div>

            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
        
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
      
                <!-- ============================================================== -->
                <!-- Earnings -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body border-bottom">                                
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-one" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"payment"]); ?>"><span class="hidden-xs-down">Total Payment List </span></a>
                                    <li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"returnList"]); ?>"><span class="hidden-xs-down">Total Return List</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"paidAmount"]); ?>"><span class="hidden-sm-up"><span class="hidden-xs-down"> Paid Amount List</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"extraCharge"]); ?>"><span class="hidden-sm-up"><span class="hidden-xs-down">Extra Charges List</span></a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border" style="overflow-x:auto;">
                                    
                                    <div class="tab-pane active" id="extra" roll="tabpanel">
                                          <div class="">
                                            <table class="table table-one">
                                                <thead>
              <!--                                      <tr class="filters">-->
              <!--                                          <th><input type="text" class="form-control" placeholder="Order ID" disabled></th>-->
														<!--<th><input type="text" class="form-control" placeholder="Date" disabled></th>-->
                                                      
													
														<!--<th><input type="text" class="form-control" placeholder="SKU" disabled></th>-->
														<!--<th><input type="text" class="form-control" placeholder="Return Charge Type" disabled></th>-->
              <!--                                          <th><input type="text" class="form-control" placeholder="Charge Amnt" disabled></th>-->
              <!--                                          <th><input type="text" class="form-control" placeholder="Charge Paid?" disabled></th>-->
              <!--                             <th><input type="text" class="form-control" placeholder="Action" disabled></th>             -->
                                                        
														
              <!--                                      </tr>-->
                                                    <tr class="filters">
                                                            <th>Order ID</th>
                                                            <th>Date</th>
    														<th>SKU</th>
    														<th>Return Charge Type</th>
                                                            <th>Charge Amt</th>
                                                            
                                                            <th>Charge Paid?</th>
    														<th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
												        	<?php
                                        				
                                                            foreach($invoice1 as $extra)
                                                        	{
                                                        	   
                                                            ?>
                                                            
                                                           
                                                    <tr>
                                                      
                                                        <td class="white-space-nowrap"><?= $extra->invoice->order_id ?></td>
														<td class="white-space-nowrap"><?= date("d-m-Y", strtotime($extra->invoice->creation_date))  ?></td>
                                                       
                                            
														<td><?= $extra->product->supc ?></td>
														<td><?php if( $extra->charge_type==1)
														{
														    echo "RTO";
														}
														if( $extra->charge_type==2)
														{
														    echo "RMA";
														}
														
														?></td>
														<td><?= $extra->charge_amount ?></td>
														<td><?php if( $extra->charge_receive==1)
														{
														    echo "No";
														}
														if( $extra->charge_receive==2)
														{
														    echo "Yes";
														}
														
														?></td>
                                                        
														
													<td class="actions">
														
															<?= $this->Html->link('<span class="btn btn-sm btn-default">Details</span><span class="sr-only">' . __('Details') . '</span>', ['action' => 'paymentdetails', $extra->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Return Details')]) ?>
														
														
														
														</td>
														
                                                    </tr>
                                                  
                                                  <?php }
                                                        	
                                                  ?>
                                                </tbody>
                                            </table> 
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
                    </div>
                </div>
                 
                </div>
           
<script>