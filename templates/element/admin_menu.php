
<style>
   .has-sub.nav-item {
    margin-bottom: 7px;
    margin-top: 7px;
}
    </style>
<?php $active=$this->request->getAttribute('params')?>
  
  <div class="nav-container">
           
			
		<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                <li <?php if($active['action']=='dashboard'){ echo 'class="has-sub nav-item active"';($active['controller']='');}?>>
                    
                    <?php echo $this->Html->link('<i class="fa fa-home"></i><span>Dashboard</span>',
                            ['controller' => 'Users', 'action' => 'dashboard', 'plugin' => NULL,
					'_matchedRoute' => '/admin','prefix' => 'Admin'],['escape'=>false]);?>
                    
                         
                </li>
                 <?php
                 //pr($menu_array);die;
                    foreach ($menu_array as $controllerName=>$value){
                        $controller_class_active = '';
                        if(is_array($value)){
                            if($controllerName == $active['controller']){
                                $controller_class_active = 'active';
                            }
                            
                        ?>
                                
                        <li class="has-sub nav-item <?=$controller_class_active?>"><a href="#"><i class="fa <?=$value['icon']?>"></i> <span><?=$value['caption']?></span></a>
                            <ul class="menu-content">
                                <?php foreach ($value['links'] as $l=>$cap) 
                                {
                                    
                                    $method_class_active = '';
                                    if($l == $active['action'] && $controllerName == $active['controller']){
                                        $method_class_active = 'class="active"';
                                    }
                                    echo '<li '.$method_class_active .'>'.$this->Html->link('<span data-i18n="" class="menu-title">'.$cap.'</span>',['controller'=>  \Cake\Utility\Inflector::dasherize($controllerName),'action'=>\Cake\Utility\Inflector::dasherize($l),'prefix'=>'Admin','_full'=>true],['escape'=>false]).'</li>';
                                }
                                ?>
                            </ul>
                        </li> 
						
                                
                    <?php
                        }
                    }
                    ?>
					
				
            </ul>	
			
          </div>
      