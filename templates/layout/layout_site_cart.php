<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	

    <?php 
        echo $this->element('site_meta');
     ?>
<link rel="icon" type="image/x-icon" href="<?php echo $this->Url->image("assets/images/favicon.png", ['pathPrefix' => '']) ?>">
	

 <?=$this->Html->css(['assets/css/bootstrap.min', 'assets/css/icon', 'assets/css/style'], ['pathPrefix' => '']);?>  
 
<?=$this->Html->css(['/site/assets/css/style.min.css']);?>
 
<?php echo $this->fetch('cssTop') ?>
	
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VNP5D4RZLS"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VNP5D4RZLS');
</script>

</head>
<body>
    
  <?= $this->Flash->render() ?>
  if($_display_cart){
  <?=$this->element('site/header');?>
  }
  
  <?= $this->fetch('content') ?>
  
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active"><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"index"]); ?>">Home</a></li>
              
                <li>
                   <a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"index"]); ?>" class="sf-with-ul">All Category</a>
                    <ul>
                        <?php foreach($menu as $m){?>
                        <li>
                            <?=$this->Html->link($m->name,['controller'=>'products','action'=>'category',$m->slug]);?>
                            <ul>
                                	<?php foreach($m->sub_categories as $s){?>
                                      <li><?=$this->Html->link($s->name,['controller'=>'products','action'=>'subcategory',$s->slug]);?>
                                      <ul>
                                          <?php foreach($s->types as $t){?>
                                          <li>
                                              <?=$this->Html->link($t->name,['controller'=>'products','action'=>'type',$t->slug]);?>
                                          </li>
                                           <?php }?>
                                      </ul>
                                      </li>
                               <?php }?>
                            </ul>
                        </li>
                    
                        <?php }?>
                    </ul>
                    
                    
                    
                </li>
               
                
               
                
                
            </ul>
        </nav><!-- End .mobile-nav -->


    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

<?php echo $this->element('site/footer');?>   

<script>
      var csrf_token = '<?= $this->request->getParam(['_csrfToken']) ?>';
</script>
	
<?=$this->Html->script(['/assets/js/bootstrap.bundle.min.js','/assets/js/javascript.min.js']);?>
<?=$this->Html->script(['/site/assets/js1/jquery.min','/site/assets/js1/main.min.js?v=5']);?>
<?= $this->fetch('scriptBottom')?>	

</body> 
</html>    