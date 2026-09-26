
<main class="main">
    <div class="banner banner-cat" style="background-image: url('<?php echo $this->Url->image("assets/images/banners/banner-top.jpg", ['pathPrefix' => '']) ?>');">
        <div class="banner-content container">
            <h2 class="banner-subtitle">check out over <span>200+</span></h2>
            <h1 class="banner-title">
                INCREDIBLE deals
            </h1>
            <a href="#" class="btn btn-dark">Shop Now</a>
        </div><!-- End .banner-content -->
    </div><!-- End .banner -->


    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb mt-0">
                <li class="breadcrumb-item"><a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"index"]); ?>"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active">Seller Registration</li>
            </ol>
        </div><!-- End .container -->
    </nav>



    <div class="container">
        <div class="row">
            <div class="col-lg-6">             
                      <?= $this->Form->create(null, [
						'type' => 'file','url' => ['controller' => 'Login', 'action' => 'vendorregister'],'id'=>'registerForm'
					]); ?>
                   <div class="form-group">
                                    <label for="name-login">Company Name</label>
                                    <?= $this->Form->input('company_name', [
							'placeholder'=>"Company Name","required"=>"required","class" =>"form-control",'label'=>false,'id'=>'company_name'
							]);?>
                   </div>
				    <div class="form-group">
                                    <label for="name-login">Phone Number</label>
                                    <?= $this->Form->input('phone_no', [
							'placeholder'=>"Phone Number","required"=>"required","type" =>"number","class" =>"form-control",'label'=>false,'id'=>'phone_no'
							]);?>
                   </div>
				   <div class="form-group">
                                    <label for="name-login">Email ID</label>
                                    <?= $this->Form->input('email', [
							'placeholder'=>"Email ID","required"=>"required","type" =>"email","class" =>"form-control",'label'=>false,'id'=>'email'
							]);?>
                   </div>
				   <div class="form-group">
                                    <label for="name-login">Address</label>
                                    <?= $this->Form->input('address', [
							'placeholder'=>"Address","required"=>"required","class" =>"form-control","type" =>"textarea",'label'=>false,'id'=>'address'
							]);?>
                   </div>
				   <div class="form-group">
                                    <label for="name-login">Contact Person</label>
                                    <?= $this->Form->input('contact_person', [
							'placeholder'=>"Contact Person","required"=>"required","class" =>"form-control",'label'=>false,'id'=>'contact_person'
							]);?>
                   </div>
					<div class="form-group">
                                    <label for="name-login">GST NO</label>
                                    <?= $this->Form->input('gst_no', [
							'placeholder'=>"GST NO","required"=>"required","class" =>"form-control",'label'=>false,'id'=>'gst_no'
							]);?>
                   </div>
				   <div class="form-group">
                                    <label for="name-login">PAN NO</label>
                                    <?= $this->Form->input('pan_no', [
							'placeholder'=>"PAN NO","required"=>"required","class" =>"form-control",'label'=>false,'id'=>'pan_no'
							]);?>
                   </div>
                   
                
		</div><!-- End .col-lg-8 -->
        <div class="col-lg-6"> 
		<div class="form-group">
						<label for="name-login">Address Proof</label>
						<?= $this->Form->input('address_proof', [
				'placeholder'=>"Address Proof","required"=>"required","class" =>"form-control","type" =>"file",'label'=>false,'id'=>'address_proof'
				]);?>
	   </div>
	   <div class="form-group">
						<label for="name-login">GST Proof</label>
						<?= $this->Form->input('gst_proof', [
				'placeholder'=>"GST Proof","required"=>"required","class" =>"form-control","type" =>"file",'label'=>false,'id'=>'gst_proof'
				]);?>
	   </div>
	   <div class="form-group">
						<label for="name-login">Aadhaar Proof</label>
						<?= $this->Form->input('aadhaar_proof', [
				'placeholder'=>"Aadhaar Proof","required"=>"required","class" =>"form-control","type" =>"file",'label'=>false,'id'=>'aadhaar_proof'
				]);?>
	   </div>
	   <div class="form-group">
						<label for="name-login">PAN Card</label>
						<?= $this->Form->input('pan_card', [
				'placeholder'=>"PAN Card","required"=>"required","class" =>"form-control","type" =>"file",'label'=>false,'id'=>'pan_card'
				]);?>
	   </div>
		</div>
	  <div class="form-footer">

			<button type="submit" class="btn btn-primary">Register</button>

			<!-- <a href="#!" class="forget-pass"> Forgot your password?</a> -->

		</div><!-- End .form-footer -->
		</form>
        </div><!-- End .row -->

    </div><!-- End .container -->

            

    <div class="mb-5"></div><!-- margin -->

</main><!-- End .main -->
<a style="font-size:1px; font-weight:100;" href="https://www.ucuzkiralikarac.info" title="ucuz kiralık araç">Ucuz kiralık araç</a>