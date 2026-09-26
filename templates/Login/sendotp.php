<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
<section id="login" class="section-padding">
<?= $this->Flash->render('auth') ?>
    <div class="container-fluid">
        <div class="row full-height-vh">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="card gradient-indigo-purple text-center width-400">
                    <div class="card-img overlap">
                        
						<?=$this->Html->image('/admin_template/app-assets/img/portrait/avatars/avatar-08.png',['width'=>"190",'class'=>"center mb-1"]);?>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <h2 class="white">Please Enter The OTP to Verify Your Mobile Number</h2>
                           <?= $this->Form->create('',['validate']) ?>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="number" class="form-control" name="otp" id="inputEmail" class="text"  required>
                                    </div>
                                </div>

                               
                                

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-pink btn-block btn-raised">Submit</button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!--Login Page Ends-->
