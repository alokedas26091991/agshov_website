<main class="main">
    
<div class="clr height20"></div>
<div class="container">
<div class="row">

<div class="col-lg-9 order-lg-last">
<div class="account-section review-block">
<div class="name-heading">Review List</div>
<div class="block-content">

<?php 
if($pro->count()>0)
{
$c=1;
foreach ($pro as $pro1):
?>
	
<div class="review-list">
<div class="nolist"><?= $c ?></div>	
	
<div class="edit-delete">
	
<?= $this->Html->link('<span class="btn btn-sm text-success"><i class="icon-edit2"></i>' . __('Edit') . '</span>', ['controller'=>'Home','action' => 'editreview', $pro1->id],['escape' => false, 'class' => 'btn-default', 'title' => __('Edit Review')]) ?>

<?= $this->Form->postLink('<span class="btn btn-sm text-danger"><i class="icon-cross"></i>' . __('Delete') . '</span>', ['controller'=>'Home','action' => 'deletereview', $pro1->id], ['confirm' => __('Are you sure you want to Delete this Review ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete Review')]) ?>

</div>

<div class=" clr height25"></div>
<h3 class="heading">Product Name : </h3>
<p><?= $pro1->product->name ?></p>	
<strong class="rheading">Rating :</strong>	
<div class="rating-box" title="5 stars">
<div class="rating" style="width: 100%;"></div>
</div>
<strong class="rvalue"><?= $pro1->rating ?></strong>

<div class="clr height5"></div>
<p class="userwriting"><i class="icon-edit-1"></i> <?= $pro1->comment ?> </p>
	
<ul class="userimg">
	
	<?php
foreach($pro1->review_images as $img)
{
?>
<li>
<a href="/upload/Review/<?=$img->product_image?>" >
<img src="/upload/Review/<?=$img->product_image?>" class="sizeimg">
</a>
</li>
<?php
}
?>
</ul>
	
<div class="clr height5"></div>	
</div>		

<?php $c++;
endforeach; ?>
<?php
}
else
{
 ?>
 <div class="data-not-found"><i class="icon-warning"></i> No Data Found</div>
<?php
}
?>
</div>
</div>
</div>
	
	
<div class="col-lg-3">
	<div class="account-section review-block p-sticky">
	<div class="name-heading">
		<div class="userblock">
		<div class="usericon"><img src="/assets/images/user-icon.png" alt="" class="img-fluid" ></div>
		<div class="username">
			<small>Hello</small><br>
            <b><?=$user1->first_name?></b>
			</div>	
		</div>
		</div>
	<ul class="accountlist">
	<li><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"myaccount"]); ?>">Account Information</a></li>
	<li><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"changepassword"]); ?>">Change Password</a></li>
	<li><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"addressbook"]); ?>">Address Book</a></li>
	<li><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"myorders"]); ?>">My Orders</a></li>
	<li class="active"><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"myreviews"]); ?>">My Product Reviews</a></li>
	<li><a href="<?php echo $this->Url->build(["controller"=>"view_carts","action"=>"wishlist1"]); ?>">My Wishlist</a></li>
	<li><a href="<?php echo $this->Url->build("/Login/logout");?>" ONCLICK = "javascript: return confirm( ' Are you sure you want to Logout?');" class="logout">Logout</a></li>
	</ul>

	</div>
</div>
</div>
</div>

<div class="clr height25"></div>
<!-- margin -->
</main><!-- End .main -->