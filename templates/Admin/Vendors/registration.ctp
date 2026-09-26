<section id="regestration">
    <div class="container">
        <div class="row full-height-vh">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex">
                            <div class="col-12 col-sm-12 col-md-6 gradient-deep-orange-orange">
                                <div class="card-block">
                                    <div class="card-img overlap">  
                                       
										<?=$this->Html->image('/admin_template/app-assets/img/elements/13.png',['width'=>"350",'class'=>"mx-auto d-block"]);?>
                                    </div>
                                    <h2 class="card-title font-large-1 text-center white mt-3">Registration</h2>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 d-flex align-items-center">
							
                                <div class="card-block mx-auto">
								<h4>Wellcome To Our Degital Wealth Revolution!</h4>
								<p>Please stepto join with our family.</p>
                                   <?= $this->Form->create('',['validate']) ?>
									<div class="input-group mb-3">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-star"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="sponsorcode" id="sponsorcode" placeholder="Sponsor Id" required >
                                        </div>
										<div class="input-group mb-3">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-star"></i>
                                                </span>
                                            </div>
                                           <select class="form-control" name="position" required><option value=""> Select position</option><option value="2"> Right</option><option value="1"> Left</option></select>
                                        </div>
									
                                        <div class="input-group mb-3">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="name" id="fname" placeholder="Name" required >
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="ft-mail"></i>
                                                </span>
                                            </div>
                                            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" required >
                                        </div>
										<div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-screen-smartphone"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="phone_no" id="inputEmail" placeholder="Phone No" required >
                                        </div>
										<div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-screen-smartphone"></i>
                                                </span>
                                            </div>
                                            <?php 
			
            echo $this->Form->input('country_id', ['options' => $country,'class'=>'form-control','label' => false,'div'=>false]);


			?>
                                        </div>
										
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="ft-lock"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control" name="password" id="inputPass" placeholder="Password" required >
                                        </div>
                                        <div class="form-group col-sm-offset-1">
                                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                                <input type="checkbox" class="custom-control-input" checked id="terms">
                                                <label class="custom-control-label pl-2" for="terms">I agree <a>terms and conditions</a></label>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-warning btn-raised">Get Started</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
