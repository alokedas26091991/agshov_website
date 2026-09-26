
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!--================================================================-->
                <!-- Search Bar -->
            <!--================================================================-->

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body border-bottom">                                
                            </div>
                            <div class="card-body">
                                <div style="float:right;"><button class="btn btn-lg btn-info waves-effect waves-light"><a href="<?php echo $this->Url->build(["controller"=>"Sellerbrands","action"=>"add"]); ?>" style="color:white;">Add Brand</a></button></div>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-one" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-xs-down">Track Requests </span></a>
                                    <li>
                                   
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><span class="hidden-xs-down"> My Brands</span></a>
                                    </li>
                                </ul>
                                
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="">
                                            <table class="table table-one">
                                                <thead>
                                                    <tr class="filters">
                                                        <th><input type="text" class="form-control" placeholder="Brand" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Category" disabled></th>
														<th><input type="text" class="form-control" placeholder="Sub Category" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Type" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Is New Brand" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Is Approved" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Is Active" disabled></th>
														<th><input type="text" class="form-control" placeholder="Action" disabled></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												        <?php foreach ($sellerbrands as $brand): 
														if($brand->is_active==1)
														{
															$a="Yes";
															$color1="text-green";
														}
														else
														{
															$a="No";
															$color1="text-red";
														}
														if($brand->is_new_brand==1)
														{
															$n="Yes";
														}
														else
														{
															$n="No";
														}
														if($brand->is_approved==1)
														{
															$p="Yes";
															$color="text-green";
														}
														else
														{
															$p="No";
															$color="text-red";
														}
														if($brand->brand_id==0)
														{
															$b="New Brand Created";
														}
														else
														{
															$b=$brand->name;
														}
														?>
                                                    <tr>
                                                        <td><?= $b ?></td>
                                                        <td><?= $brand->category->name ?></td>
                                                        <td><?= h($brand->sub_category->name) ?></td>
                                                        <td><?= h($brand->type->name) ?></td>
                                                        
														<td><?= $n ?></td>
														<td><small class="<?= $color ?>"><?= $p ?></small></td>
													
                                                        <td><small class="<?= $color1 ?>"><?= $a ?></small></td>
														 <td class="actions">
															<?php if($brand->is_new_brand==1){?>
															<?= $this->Html->link('<span class="fa fa-search"></span><span class="sr-only">' . __('Details') . '</span>', ['action' => 'documents', $brand->id], ['escape' => false,  'title' => __('Details')]) ?>
															<?php } ?>
														
														
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
                               
                                    <div class="tab-pane" id="messages" roll="tabpanel">
                                         <table class="table table-one">
                                                <thead>
                                                    <tr class="filters">
                                                        <th><input type="text" class="form-control" placeholder="Brand" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Category" disabled></th>
														<th><input type="text" class="form-control" placeholder="Sub Category" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Type" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Is New Brand" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Is Approved" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Is Active" disabled></th>
														<th><input type="text" class="form-control" placeholder="Action" disabled></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												         <?php foreach ($sellerbrands1 as $brand1): 
														if($brand1->is_active==1)
														{
															$a="Yes";
															$color1="text-green";
														}
														else
														{
															$a="No";
															$color1="text-red";
														}
														if($brand1->is_new_brand==1)
														{
															$n="Yes";
														}
														else
														{
															$n="No";
														}
														if($brand1->is_approved==1)
														{
															$p="Yes";
															$color="text-green";
														}
														else
														{
															$p="No";
															$color="text-red";
														}
														if($brand1->brand_id==0)
														{
															$b="New Brand Created";
														}
														else
														{
															$b=$brand1->name;
														}
														?>
														
                                                    <tr>
                                                        <td><?= $b ?></td>
                                                        <td><?= $brand1->category->name ?></td>
                                                        <td><?= h($brand1->sub_category->name) ?></td>
                                                        <td><?= h($brand1->type->name) ?></td>
                                                        
														<td><?= $n ?></td>
														<td><small class="<?= $color ?>"><?= $p ?></small></td>
													
                                                        <td><small class="<?= $color1 ?>"><?= $a ?></small></td>
														 <td class="actions">
															<?php if($brand1->is_new_brand==1){?>
															<?= $this->Html->link('<span class="fa fa-search"></span><span class="sr-only">' . __('Details') . '</span>', ['action' => 'documents', $brand1->id], ['escape' => false, 'title' => __('Details')]) ?>
															<?php } ?>
														
															
														</td>
                                                    </tr>
                                                    <?php endforeach; ?>
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

    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
  
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->


