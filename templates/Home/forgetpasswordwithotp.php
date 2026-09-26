<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"index"]); ?>"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last dashboard-content">
                <h2>Forget Password Form</h2>
                
               <?= $this->Form->create(null, ['url' => ['controller' => 'Home', 'action' => 'forgetpasswordwithotp']]); ?>
                   

                       <div class="row">
                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <label for="acc-pass2">Please Provide your Registered Email ID</label>
                                    <input type="email" required class="form-control" id="email" name="email">
                                </div><!-- End .form-group -->
                            </div><!-- End .col-md-6 -->

                           
                        </div><!-- End .row -->
					 
					  
					   
					          

                    <div class="mb-2"></div><!-- margin -->


                   

                  
                    <div class="form-footer">
                        

                        <div class="form-footer-left">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div><!-- End .form-footer -->
                		<?=$this->Form->end();?>
            </div><!-- End .col-lg-9 -->


        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- margin -->
</main><!-- End .main -->