<div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($user,['class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= __('Seller') ?> <?= __('Edit') ?> </h4>
       


			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Company Legal Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('company_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
				<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Company Name to display') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('company_display_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
	
					<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Contact Person Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('contact_person_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Email') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('email',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'readonly']);
			?>
			
	</div>
	</div>			
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Phone') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('phone_no',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'readonly']);
			?>
			
	</div>
	</div>	
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Shipping Address') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('shipping_address',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Pickup Address') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('shipping_landmark',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Pincode') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('pincode',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Phone') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('phone_no',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('City') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('city',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('State') ?></label>
			<div class="col-sm-9">
			
			          <?php 
			                                         echo $this->Form->input('state',['options' => $states_list,'class'=>'form-control','empty' => true,'label' => false,'div'=>false,'required'=>true]);
													?>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('GST No') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('gst_no',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('PAN No') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('pan_no',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('VAT/TIN') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('vat',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('MOU') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('mou',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('TAN') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('tan',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Benificiary Name') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('benificiary_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Current AC No') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('current_account_no',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('IFSC Code') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('ifsc_code',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Bank Name') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('bank_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Branch Name') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('branch_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>
			     	
   
    <!--<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>-->
    <?= $this->Form->end() ?>
 </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
</div>
</div>

