  <?php $active=$this->request->params?>
  <div class="nav-container">
           
			
		<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                <li <?php if($active['action']=='dashboard'){ echo 'class="has-sub nav-item active"';($active['controller']='');}?>>
                    <!--<a href="/home"><i class="fa fa-home"></i> <span>Dashboard</span></a>-->
                    <?php echo $this->Html->link('<i class="fa fa-home"></i><span>Dashboard</span>',
                            ['controller' => 'Users', 'action' => 'dashboard', '_full' => true,'prefix'=>'seller'],['escape'=>false]);?>
                </li>
                  <li <?php if($active['action']=='index'){ echo 'class="has-sub nav-item active"';($active['controller']='');}?>>
                    <!--<a href="/home"><i class="fa fa-home"></i> <span>Dashboard</span></a>-->
                    <?php echo $this->Html->link('<i class="fa fa-table"></i><span>Products</span>',
                            ['controller' => 'Products', 'action' => 'index', '_full' => true,'prefix'=>'seller'],['escape'=>false]);?>
                </li>
                  <li <?php if($active['action']=='index'){ echo 'class="has-sub nav-item active"';($active['controller']='');}?>>
                    <!--<a href="/home"><i class="fa fa-home"></i> <span>Dashboard</span></a>-->
                    <?php echo $this->Html->link('<i class="fa fa-book"></i><span>Orders</span>',
                            ['controller' => 'Orders', 'action' => 'index', '_full' => true,'prefix'=>'seller'],['escape'=>false]);?>
                </li>
                  <li <?php if($active['action']=='index'){ echo 'class="has-sub nav-item active"';($active['controller']='');}?>>
                    <!--<a href="/home"><i class="fa fa-home"></i> <span>Dashboard</span></a>-->
                    <?php echo $this->Html->link('<i class="fa fa-university"></i><span>Seller Brands</span>',
                            ['controller' => 'sellerbrands', 'action' => 'index', '_full' => true,'prefix'=>'seller'],['escape'=>false]);?>
                </li>
                  <li <?php if($active['action']=='index'){ echo 'class="has-sub nav-item active"';($active['controller']='');}?>>
                    <!--<a href="/home"><i class="fa fa-home"></i> <span>Dashboard</span></a>-->
                    <?php echo $this->Html->link('<i class="fa fa-refresh"></i><span>Returns</span>',
                            ['controller' => 'Products', 'action' => 'index', '_full' => true,'prefix'=>'seller'],['escape'=>false]);?>
                </li>
                  <li <?php if($active['action']=='index'){ echo 'class="has-sub nav-item active"';($active['controller']='');}?>>
                    <!--<a href="/home"><i class="fa fa-home"></i> <span>Dashboard</span></a>-->
                    <?php echo $this->Html->link('<i class="fa fa-inr"></i><span>Payment</span>',
                            ['controller' => 'Products', 'action' => 'index', '_full' => true,'prefix'=>'seller'],['escape'=>false]);?>
                </li>
                 <li <?php if($active['action']=='index'){ echo 'class="has-sub nav-item active"';($active['controller']='');}?>>
                    <!--<a href="/home"><i class="fa fa-home"></i> <span>Dashboard</span></a>-->
                    <?php echo $this->Html->link('<i class="fa fa-bell"></i><span>Report</span>',
                            ['controller' => 'Products', 'action' => 'index', '_full' => true,'prefix'=>'seller'],['escape'=>false]);?>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo $this->Url->build(["controller"=>"Questions","action"=>"index"]); ?>"><i class="mdi mdi-cube"></i><span class="hide-menu">Question & Answer</span></a></li>
            </ul>	
			
          </div>
      