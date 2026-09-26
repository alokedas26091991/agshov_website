<main class="main">
    
<div class="clr height20"></div>
<div class="container">
<div class="row">

<div class="col-lg-9 order-lg-last">
<div class="account-section">
<div class="name-heading">Edit Review List</div>
 <!-- End .form-group -->	
<div class="edit-info-details">
	
	
	<div class="form-group mb-2">
			<lable><strong>Photos</strong> <span class="required">*</span></lable>
		     <div class="clr height5"></div>
		            <?php
                   foreach($rev->review_images as $img)
                   {
                   ?>
				  <div class="uploadimg">
                   <?= $this->Form->postLink('<span class="btndelete"><span class="icon-multiply"></span>' . __('') . '</span>', ['controller'=>'Home','action' => 'deletereviewimage', $img->id], ['confirm' => __('Are you sure you want to Delete this Image ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete Image')]) ?>
                 
				  <img src="/upload/Review/<?=$img->product_image?>" class="isize"></div>
                   
               
                   <?php
                   }
                   ?>
		
	</div>
	
	
	
 <?= $this->Form->create($rev,['type' => 'file','class'=>'form form-horizontal']); ?>
		<table class="ratings-table" style="margin: 0 0 10px">
			<thead>
				<tr>
					<th>&nbsp;</th>
					<th>1 star</th>
					<th>2 stars</th>
					<th>3 stars</th>
					<th>4 stars</th>
					<th>5 stars</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><strong>Product Rating</strong></td>
					<td>
						<input type="radio" name="rating" id="Quality_1" value="1" <?php echo ($rev->rating=='1')?'checked':'' ?> class="radio">
					</td>
					<td>
						<input type="radio" name="rating" id="Quality_2" value="2" <?php echo ($rev->rating=='2')?'checked':'' ?> class="radio">
					</td>
					<td>
						<input type="radio" name="rating" id="Quality_3" value="3" <?php echo ($rev->rating=='3')?'checked':'' ?> class="radio">
					</td>
					<td>
						<input type="radio" name="rating" id="Quality_4" value="4" <?php echo ($rev->rating=='4')?'checked':'' ?> class="radio">
					</td>
					<td>
						<input type="radio" name="rating" id="Quality_5" value="5" <?php echo ($rev->rating=='5')?'checked':'' ?> class="radio">
					</td>
				</tr>

			</tbody>
		</table>
		<div class="form-group mb-2">
			<label><strong>Photos</strong> <span class="required">*</span></label>
            <input type="file" class="form-control" id="recipient-name" name="product_image[]" multiple>
          </div>


		<div class="form-group mb-2">
			<label><strong>Review</strong> <span class="required">*</span></label>
			<textarea cols="5" rows="6" name="comment" class="form-control form-control-sm"><?= $rev->comment  ?></textarea>
		</div><!-- End .form-group -->
		<!--<a href="" class="btn btn-primary">Submit Review</a>-->
		<button class="btn btn-style" type="submit"><span>Save</span></button>
	<?= $this->Form->end() ?>

</div>
</div>	
</div>	
	
	
	
<div class="col-lg-3">
	<div class="account-section">
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
	<li ><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"myaccount"]); ?>">Account Information</a></li>
	<li ><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"changepassword"]); ?>">Change Password</a></li>
	<li><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"addressbook"]); ?>">Address Book</a></li>
	<li><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"myorders"]); ?>">My Orders</a></li>
	<li class="active"><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"myreviews"]); ?>">My Product Reviews</a></li>
	<li><a href="<?php echo $this->Url->build(["controller"=>"view_carts","action"=>"wishlist1"]); ?>">My Wishlist</a></li>
	<li><a href="<?php echo $this->Url->build("/Login/logout");?>" ONCLICK = "javascript: return confirm( ' Are you sure you want to Logout?');">Logout</a></li>
	</ul>

	</div>
</div>			
</div>
</div>
<div class="clr height25"></div>

</main><!-- End .main -->