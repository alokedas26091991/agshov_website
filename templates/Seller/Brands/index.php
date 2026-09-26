<!--div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Brand'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
				<th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
              
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('sub_category_id') ?></th>
				<th><?= $this->Paginator->sort('type_id') ?></th>
				<th><?= $this->Paginator->sort('show_in_site') ?></th>
                <th><?= $this->Paginator->sort('is_active') ?></th>
           
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($brands as $brand): 
        if($brand->is_active==1)
		{
			$a="Yes";
		}
		else
		{
			$a="No";
		}
		if($brand->show_in_site==1)
		{
			$s="Yes";
		}
		else
		{
			$s="No";
		}
        ?>
            <tr>
                <td><?= $this->Number->format($brand->id) ?></td>
				<td><?= h($brand->user->first_name) ?></td>
                <td><?= h($brand->name) ?></td>
            
                <td>
                    <?= $brand->has('category') ? $this->Html->link($brand->category->name, ['controller' => 'Categories', 'action' => 'index', $brand->category->id]) : '' ?>
                </td>
              
                <td><?= h($brand->sub_category->name) ?></td>
				<td><?= h($brand->type->name) ?></td>
				 <td><?= $s ?></td>
                <td><?= $a ?></td>
             
                    <td class="actions">
                    
                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $brand->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $brand->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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
</div------>



      <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Create Single Listing</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10">
                                <div class=""><a href="add_brand.html" class="btn btn-lg btn-upload waves-effect waves-light"><i class="mdi mdi-plus"></i> Upload Signature</a></div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!--================================================================-->
                <!-- Search Bar -->
            <!--================================================================-->
            <div class="search-bar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn ser-btn my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <!-- Basic dropdown -->
                            <a class="btn btn-filter dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false"><i class="mdi mdi-filter"></i>Filters</a>

                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                            <!-- Basic dropdown -->                           
                        </div>
                    </div>
                </div> 
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
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
                                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-xs-down">Track Requests(6) </span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-xs-down">Required  Documents</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><span class="hidden-xs-down"> My Brands(10)</span></a>
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
                                                        <th><input type="text" class="form-control" placeholder="Type" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Date Modified" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Ticket ID" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Status" disabled></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>NIKIA MOBILE</td>
                                                        <td>Mobiles & Tablets</td>
                                                        <td>Brand Creation</td>
                                                        <td>25, Jul 2019</td>
                                                        <td>09427663</td>
                                                        <td><small class="text-green">Approved</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIKIA MOBILE</td>
                                                        <td>Mobiles & Tablets</td>
                                                        <td>Brand Creation</td>
                                                        <td>25, Jul 2019</td>
                                                        <td>09427663</td>
                                                        <td><small class="text-green">Approved</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIKIA MOBILE</td>
                                                        <td>Mobiles & Tablets</td>
                                                        <td>Brand Creation</td>
                                                        <td>25, Jul 2019</td>
                                                        <td>09427663</td>
                                                        <td><small class="text-green">Approved</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIKIA MOBILE</td>
                                                        <td>Mobiles & Tablets</td>
                                                        <td>Brand Creation</td>
                                                        <td>25, Jul 2019</td>
                                                        <td>09427663</td>
                                                        <td><small class="text-red">Rejected</small></td>
                                                    </tr>
                                                </tbody>
                                            </table> 
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="profile" role="tabpanel">
                                        <div class="p-20">
                                            <div class="ques">
                                                <h3>Yahoo Store Data Entry</h3>
                                            </div>
                                            <div class="ans">
                                                <p>Are you looking for someone who could upload products on your Magento based website? At webenlance India, we can effectively help you with our top quality Magento product upload services. With the pool of well experienced and talented experts, we ensure that your customers have an enriching experience every time they visit your website. Our comprehensive range of services is available all over the globe at extremely low cost. </p>
                                            </div>

                                            <div class="ques">
                                                <h3>What to do next?</h3>
                                            </div>
                                            <div class="ans">
                                                <p>Share few details of the Brand &amp; Category in which you want to start selling</p>
                                            </div>
                                            <div>
                                                Go to &gt; <a class="link-color" ui-sref="createBrand" href="#/createBrand">Add a Brand</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="messages" roll="tabpanel">
                                        <table class="table table-one">
                                            <thead>
                                                <tr class="filters">
                                                    <th><input type="text" class="form-control" placeholder="Brand" disabled></th>
                                                    <th><input type="text" class="form-control" placeholder="Category" disabled></th>
                                                    <th><input type="text" class="form-control" placeholder="Type" disabled></th>
                                                    <th><input type="text" class="form-control" placeholder="Action [Upload/Edit]" disabled></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>NIKIA MOBILE</td>
                                                    <td>Mobiles & Tablets</td>
                                                    <td>Brand Creation</td>
                                                    <td>
                                                        <div class="action-uplod-area">
                                                            <div class="">
                                                                <img src="assets/images/sizechart.svg">
                                                            </div>
                                                            <div>
                                                                <img src="assets/images/editnew.svg">
                                                            </div>
                                                        </div>
                                                    </td>                             
                                                </tr>
                                                <tr>
                                                    <td>NIKIA MOBILE</td>
                                                    <td>Mobiles & Tablets</td>
                                                    <td>Brand Creation</td>
                                                    <td>25, Jul 2019</td>
                                                </tr>
                                                <tr>
                                                    <td>NIKIA MOBILE</td>
                                                    <td>Mobiles & Tablets</td>
                                                    <td>Brand Creation</td>
                                                    <td>25, Jul 2019</td>
                                                </tr>
                                                <tr>
                                                    <td>NIKIA MOBILE</td>
                                                    <td>Mobiles & Tablets</td>
                                                    <td>Brand Creation</td>
                                                    <td>25, Jul 2019</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>                                    
                            </div>            
                        </div>
                    </div>
                </div>

            </div>
        </div>
  