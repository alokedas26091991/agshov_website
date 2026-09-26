<style>
.clearfix{
	overflow: auto;
}	
.dropzone {
  position: relative;
  height: 200px;
  border: 2px dashed #b3b3b3;
  border-radius: 4px;
  background-color: #f3f3f3;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.dropzone .msg{
	font-size: 20px;
	font-weight: bold;
	color: #c3c3c3;
	padding: 0 10px;
}
input.fileUpload{
	display: none;
}
.preview{
	margin: 10px 0;
	padding: 5px;
}
.previewData img{
	width: 100px;
	height: 100px;
	float: left;
	margin: 5px;
} 
.previewDetails{
	 display: inline-block;
    float: left;
    margin: 5px;
    padding: 8px;
}
.detail{
	  font-family: arial;
    padding: 5px;
    overflow: hidden;
    max-width: 200px;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.previewControls{
	display: inline-block;
	float: left;
	margin: 40px 30px;
}
.circle{
	border: 2px solid #5B93F5;
    border-radius: 20px;
    display: inline-block;
    height: 25px;
    width: 25px;
    margin: 5px;
    cursor: pointer;
    color: #5B93F5;
}
.circle.upload:hover{
	border: 2px solid green;	
}
.circle.upload:hover i.fa-check{
	color: green;
}
.circle.remove:hover{
	border: 2px solid red;	
}
.circle.remove:hover i.fa-close{
	color: red;
}
.circle i{
	position: relative;
	font-size: 14px;
}
.circle i.fa-check{
	top: 3px;
	left: 5px;
}
.circle i.fa-close{	
	top: 2px;
	left: 7px;
}
</style>


<div class="main-content" ng-app="product" ng-controller="productCrt">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">
					
    <?= $this->Form->create($product,['type' => 'file', 'class'=>'form form-horizontal','id'=>'myForm','name'=>'myForm']); ?>
   
      <div class="form-body">
	      <h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Product'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
         <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link" id="item" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="false">Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="keyDetails" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Key Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="true">Image</a>
              </li>
              <li class="nav-item">
                <a class="nav-link">Attributes</a>
              </li>
			  <li class="nav-item">
                <a class="nav-link">Shipping & Pricing</a>
              </li>
            </ul>
			<div class="tab-content px-1 pt-1">
              <div role="tabpanel" class="tab-pane" id="tab1" aria-expanded="false" aria-labelledby="base-tab1">
                <p>Oat cake marzipan cake lollipop caramels wafer pie jelly beans. Icing halvah chocolate cake carrot cake. Jelly beans carrot cake marshmallow gingerbread chocolate cake. Gummies cupcake croissant.</p>
              </div>
              <div class="tab-pane active" id="tab2" aria-labelledby="base-tab2" aria-expanded="true">
                <p>Sugar plum tootsie roll biscuit caramels. Liquorice brownie pastry cotton candy oat cake fruitcake jelly chupa chups. Pudding caramels pastry powder cake soufflé wafer caramels. Jelly-o pie cupcake.</p>
              </div>
              <div class="tab-pane" id="tab3" aria-labelledby="base-tab3" aria-expanded="false">
                <p>Biscuit ice cream halvah candy canes bear claw ice cream cake chocolate bar donut. Toffee cotton candy liquorice. Oat cake lemon drops gingerbread dessert caramels. Sweet dessert jujubes powder sweet sesame snaps.</p>
              </div>
            </div>              		

<?php // if($this->request->session()->read('Auth.User.is_admin')==1){?>
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Vendor') ?></label>
			<div class="col-sm-9">
			<?php 
			
            echo $this->Form->input('user_id', ['options' => $users,'class'=>'form-control','label' => false,'div'=>false]);


			?>
			
	</div>
	</div>
	<?php
	//}
	?>
	
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
					
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Category ') ?></label>
			<div class="col-sm-9">
			<?php 
			
            echo $this->Form->input('category_id', ['options' => $categories,'class'=>'form-control','label' => false,'div'=>false]);


			?>
			
	</div>
	</div>
	
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Sub Category ') ?></label>
			<div class="col-sm-9">
			<?php 
			
            echo $this->Form->input('sub_category_id', ['options' => $sub_category,'class'=>'form-control','label' => false,'div'=>false]);


			?>
			
	</div>
	</div>
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Type ') ?></label>
			<div class="col-sm-9">
			<?php 
			
            echo $this->Form->input('type_id', ['options' => $type,'class'=>'form-control','label' => false,'div'=>false]);


			?>
			
	</div>
	</div>
			<!--div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Sale Tag') ?></label>
			<div class="col-sm-9">
			<?php 
			            //echo $this->Form->input('sale_tag',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div-->			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Introduction') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('introduction',['class'=>'form-control ckeditor','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Objective') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('objective',['class'=>'form-control ckeditor','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Benefits') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('benefits',['class'=>'form-control ckeditor','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Content Topic Summary') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('content_topic_summary',['class'=>'form-control ckeditor','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Summary') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('summary',['class'=>'form-control ckeditor','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Open Date') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('open_date',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Photo') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('photo',['class'=>'form-control','type'=>'file','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<!--div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Display Image') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('display_image',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div-->			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Actual Price') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('actual_price',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Offer Price') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('offer_price',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Featured') ?></label>
			<div class="col-sm-9">
			    <?php 
			 echo $this->Form->input('is_featured',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false]);
			?>
		
	</div>
	</div>			
			<!--div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Rank') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('rank',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div-->			
			<!--div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Status') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('status',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Active') ?></label>
			<div class="col-sm-9">
			<?php 
																	?>	<div class="switch-main">
															    <div class="onoffswitch">
																<input id="is_active" class="onoffswitch-checkbox" type="checkbox" empty="0" value="1" name="is_active">
																
			<label class="onoffswitch-label" for="is_active">
																		<span class="onoffswitch-inner"></span>
																		<span class="onoffswitch-switch"></span>
																	</label>
																	</div>
																</div>
															
	</div>
	</div-->
				<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Active') ?></label>
			<div class="col-sm-9">
			    <?php 
			 echo $this->Form->input('is_active',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false]);
			?>
		
	</div>
	</div>
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Not For Sale') ?></label>
			<div class="col-sm-9">
				    <?php 
			 echo $this->Form->input('not_for_sale',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>	
		<div>
		<div img-upload method="POST" url="<?=$this->Url->build("/admin/products/upload");?>"></div>
		</div>	
			<!--div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Meta Title') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('meta_title',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Meta Keywords') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('meta_keywords',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Meta Desc') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('meta_desc',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Robots') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('robots',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Canonical') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('canonical',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Create Date') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('create_date',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div-->			
			<!--div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Created By') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('created_by',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Last Update Date') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('last_update_date',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Last Updated By') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('last_updated_by',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Deleted') ?></label>
			<div class="col-sm-9">
			<?php 
																	?>	<div class="switch-main">
															    <div class="onoffswitch">
																<input id="is_deleted" class="onoffswitch-checkbox" type="checkbox" empty="0" value="1" name="is_deleted">
																
			<label class="onoffswitch-label" for="is_deleted">
																		<span class="onoffswitch-inner"></span>
																		<span class="onoffswitch-switch"></span>
																	</label>
																	</div>
																</div>
															
	</div>
	</div-->			
			
			       	
   
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
	</div>
    <?= $this->Form->end() ?>
 </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
</div>
</div>
