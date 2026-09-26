	
<section id="carouselExampleControls" class="carousel slide relative-block" data-bs-ride="carousel">
  <div class="carousel-inner">
  <?php
		$c=0;
		foreach($slideralls as $book)
		{

		
				
				$c++;
		?>   
    <div class="carousel-item <?php if($c==1)echo "active"?>"> 
	<a href="<?=$book->link ?>"><img src="/upload/homepageimage/<?=$book->photo ?>" class="d-block w-100" alt="..."></a> 
    </div>
	<?php
    	    
		
	}
?>
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="visually-hidden">Previous</span> </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="visually-hidden">Next</span> </button>
  <div class="sliderbg"><img src="assets/images/slider/sliderbg.png" alt="" class="img-fluid"></div>
</section>

<section class="container">
  <div class="clr height10"></div>
  <?php
  if(isset($Pro1->name))
  {
  ?>
  <h2 class="text-center"><?=$Pro1->name ?></h2>
  <?php
  }
  ?>
  <div class="clr height20"></div>
	
<div class="owl-carousel owl-carousel-style categories">
<?php
foreach($Pro11 as $section2)
{
?>    
<div class="item">
    <?php
    if($section2->products)
    {?>
	<a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"seller_product_list",$section2->id]); ?>" target="_blank" class="stylelock1 tran-img">
      <div class="imgblock"> <img src="/upload/homepageimage/<?=$section2->photo ?>" alt="" class="img-size" ></div>
      <div class="titlename"><?=$section2->name ?></div>
    </a>
    <?php
    }
    else
    {
    ?>
        <a href="<?=$section2->link ?>" class="stylelock1 tran-img">
      <div class="imgblock"> <img src="/upload/homepageimage/<?=$section2->photo ?>" target="_blank" alt="" class="img-size" ></div>
      <div class="titlename"><?=$section2->name ?></div>
    </a>
    <?php
    }
    ?>
    
</div>
<?php
}
?>

</div>
	<div class="clr height20"></div>
</section>


  <?php
  if(isset($Pro111))
  {
  ?>	
<section class="container"> 
<?php
    if($Pro111->products)
    {?>
	<a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"seller_product_list",$Pro111->id]); ?>" target="_blank" alt="" class="w-100"></a> 
	<?php
    }
    else
    {?>
    <a href="<?=$Pro111->link ?>"><img src="/upload/homepageimage/<?=$Pro111->photo ?>" target="_blank" alt="" class="w-100"></a> 
    <?php
    }
    ?>
</section>
<?php
}
?>
<?php
if($deal->count()>0)
{
?>
<section class="container">
  <div class="clr height20"></div>
	<div class="row">
	   <h2 class="text-center">Deals for You</h2>
		<div class="col-6">
		<!--<a href="" class="btn btn-outline-primary btn-sm float-end btn-size">View All <i class="icon-arrow-pointing-right"></i></a>-->
		</div>
	</div>
  
  <div class="clr height20"></div>
	
<div class="row">
    <?php
	foreach($deal as $advitem)
	{
		$actual=$advitem->actual_price;
		$offer=$advitem->offer_price;
	?>  
    <div class="col-lg-3 col-6 mbottom20">
      <div class="stylelock2 ">
        <div class="float-cart-wish">
		<?php if($this->request->getSession()->read('Auth.User.id'))
		{?>  
		<a href="<?php echo $this->Url->build(["controller"=>"view_carts","action"=>"wishlist",$advitem->slug]); ?>" ><div class="wi-crtblock"><i class="icon-wishlist"></i></div></a>
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
        <a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details",$advitem->slug]); ?>" target="_blank" class="imgblock tran-img">
        
        <img src="/upload/product/<?=$advitem->photo ?>" alt="" class="img-size" > </a>
        <div class="clr"></div>
        <div class="contentblock">
          <h3 class="title-name"><a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details",$advitem->slug]); ?>" target="_blank"><?=$advitem->name ?></a></h3>
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
	
<section class="container">
		<div class="height10 clr"></div>
		<div class="row">
		<?php
        foreach($Pro1111 as $section)
        {
        ?>  
		<div class="col-lg-6">
		    <?php
            if($section->products)
            {
               
            ?>
		    <a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"seller_product_list",$section->id]); ?>" target="_blank">
		  <img src="/upload/homepageimage/<?=$section->photo ?>" class="d-block w-100" alt="">
		  </a>
		  <?php
            }
            else
            {?>
            <a href="<?=$section->link ?>" target="_blank">
		  <img src="/upload/homepageimage/<?=$section->photo ?>"  class="d-block w-100" alt="">
		  </a>
		  <?php
            }
            ?>
		  </div>
        <?php
        }
        ?>
		<div class="height10 clr"></div>	
		</div>
</section>
<?php
if($Products1->count()>0)
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
	foreach($Products1 as $advitem)
	{
		$actual=$advitem->actual_price;
		$offer=$advitem->offer_price;
		if($advitem->parent_id==NULL)
		{
	?>  
    <div class="col-lg-3 col-6 mbottom20">
      <div class="stylelock2 ">
        <div class="float-cart-wish">
		<?php if($this->request->getSession()->read('Auth.User.id'))
		{?>  
		<a href="<?php echo $this->Url->build(["controller"=>"view_carts","action"=>"wishlist",$advitem->slug]); ?>" ><div class="wi-crtblock"><i class="icon-wishlist"></i></div></a>
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
          <h3 class="title-name"><a target="_blank" href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details",$advitem->slug]); ?>"><?=$advitem->name ?></a></h3>
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
	}
	?>    
    
		
</div>	
	
</section>	
<?php
}
?>
</body>
</html>