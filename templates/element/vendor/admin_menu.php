 <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> 
                        <?php echo $this->Html->link('<i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span>',
                            ['controller' => 'Home', 'action' => 'dashboard', 'plugin' => NULL,
					'_matchedRoute' => '/seller','prefix' => 'Seller'],['escape'=>false,'class'=>'sidebar-link waves-effect waves-dark sidebar-link']);?>
                        </li>
                        <li class="sidebar-item">
                            <?php echo $this->Html->link('<i class="mdi mdi-basket"></i><span class="hide-menu">Orders</span>',
                            ['controller' => 'Orders', 'action' => 'index', '_full' => true,'plugin' => NULL,
					'_matchedRoute' => '/seller','prefix' => 'Seller'],['escape'=>false,'class'=>'sidebar-link waves-effect waves-dark sidebar-link']);?>
                            
                            </li>
						<li class="sidebar-item"> 
						
						<?php echo $this->Html->link('<i class="mdi mdi-checkbox-multiple-blank"></i><span class="hide-menu">Product</span>',
                            ['controller' => 'Products', 'action' => 'catelog', '_full' => true,'plugin' => NULL,
					'_matchedRoute' => '/seller','prefix' => 'Seller'],['escape'=>false,'class'=>'sidebar-link waves-effect waves-dark sidebar-link']);?>
						
						
						<!--<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo $this->Url->build(["controller"=>"Orders","action"=>"returnorder"]); ?>"><i class="mdi mdi-truck"></i><span class="hide-menu">Returns</span></a></li>-->
					 <!--   <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo $this->Url->build(["controller"=>"Brandrequests","action"=>"index"]); ?>"><i class="mdi mdi-cube"></i><span class="hide-menu">Brands</span></a></li>-->
						<!--<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"report"]); ?>"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Reports</span></a></li>-->
						<!--<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"payment"]); ?>"><i class="mdi mdi-alpha"></i><span class="hide-menu">Payment</span></a></li>     -->
						<!--<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"performance"]); ?>"><i class="mdi mdi-truck"></i><span class="hide-menu">Performance</span></a></li> -->
						<!--<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo $this->Url->build(["controller"=>"Questions","action"=>"index"]); ?>"><i class="mdi mdi-cube"></i><span class="hide-menu">Question & Answer</span></a></li>-->
						<!--<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"average_rating"]); ?>"><i class="mdi mdi-cube"></i><span class="hide-menu">Average Rating</span></a></li>-->
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"sellerpagelist"]); ?>"><i class="mdi mdi-cube"></i><span class="hide-menu">Pages</span></a></li>
						<!--<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo $this->Url->build(["controller"=>"Zone_sellers","action"=>"shipping"]); ?>"><i class="mdi mdi-cube"></i><span class="hide-menu">Shipping Charge Calculator</span></a></li>-->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
       