	
<?php
if($product_list->count()>0)
{
?>	
<section class="container">
  <div class="clr height20"></div>
	<div class="row">
		<h2 class="text-center">Products</h2>
		<div class="col-6">
		<!--<a href="" class="btn btn-outline-primary btn-sm float-end btn-size">View All <i class="icon-arrow-pointing-right"></i></a>-->
		</div>
	</div>
  
  <div class="clr height20"></div>
	
<div class="row">
    
    <?php
	foreach($product_list as $advitem)
	{
		$actual=$advitem->actual_price;
		$offer=$advitem->offer_price;
	?>  
    <div class="col-lg-3 col-6 mbottom20">
      <div class="stylelock2 ">
        <div class="float-cart-wish">
		<?php if($this->request->getSession()->read('Auth.User.id'))
		{?>  
		<a href="<?php echo $this->Url->build(["controller"=>"Carts","action"=>"wishlist",$advitem->slug]); ?>" ><div class="wi-crtblock"><i class="icon-wishlist"></i></div></a>
		<?php
		}
		else
		{
		?>
		<a href="" data-bs-toggle="modal" data-bs-target="#login_modal" class="favorites"></a>
		<?php
		}
		?>
          
        </div>
        <a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details",$advitem->slug]); ?>" class="imgblock tran-img" target="_blank">

        <img src="/upload/product/<?=$advitem->photo ?>" alt="" class="img-size" > </a>
        <div class="clr"></div>
        <div class="contentblock">
          <h3 class="title-name"><a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details",$advitem->slug]); ?>"><?=$advitem->name ?></a></h3>
		   <?php
			if($offer==$actual)
			{
			?>
			<div class="price">&#8377 <?=$offer?></div>
			<?php
			}
			else
			{
			?>
			<div class="price">&#8377 <?=$offer?> <del>&#8377 <?=$actual?></del></div>
			<?php
			}
			?>
          
        </div>
      </div>
    </div>
	<?php                        	  
    }
	?>    
    
		
</div>	
	
</section>	
<?php
}
?>
</body>
</html>