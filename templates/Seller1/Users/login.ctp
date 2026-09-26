
<section id="login">
<?= $this->Flash->render('auth') ?>
    <div class="container-fluid">
        <div class="row full-height-vh">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="card gradient-indigo-purple text-center width-400">
                    <div class="card-img overlap">
                        
						<?=$this->Html->image('/admin_template/app-assets/img/portrait/avatars/avatar-08.png',['width'=>"190",'class'=>"mb-1"]);?>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <h2 class="white">Login</h2>
                           <?= $this->Form->create('',['validate']) ?>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="email" id="inputEmail" class="text"  required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="password" id="inputPass"  value=""  required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0 ml-3">
                                                <input type="checkbox" class="custom-control-input" checked id="rememberme">
                                                <label class="custom-control-label float-left white" for="rememberme">Remember Me</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-pink btn-block btn-raised">Submit</button>
                                        <button type="button" class="btn btn-secondary btn-block btn-raised">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-left"><a (click)="onForgotPassword()" class="white">Recover Password</a></div>
                        <div class="float-right">
                        
                        <?php echo $this->Html->link('Registration', ['controller' => 'Users', 'action' => 'registration', 'prefix' => 'admin'], ['class' => 'white']);?>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Login Page Ends-->
