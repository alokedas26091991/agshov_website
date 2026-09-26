<!-- Forget password POPUP -->
<div id="pwdModal" class="design-course-popup zoom-anim-dialog mfp-hide" style="max-width:600px;">

    <div class="panel panel-default" >
        <div class="panel-body">
            <div class="text-center">
                <h1 class="text-center">What's My Password?</h1>
                <p>If you have forgotten your password you can reset it here.</p>
                <div class="panel-body">
                    <fieldset>
                        <?=
                        $this->Form->create(null, [
                            'url' => ['controller' => 'Login', 'action' => 'forgetpassword','prefix'=>FALSE, 'id' => 'forgetPasswordForm']
                        ]);
                        ?>

                        <div class="form-group">
                            <input class="form-control input-lg" placeholder="E-mail Address" name="email" type="email" id="forgetEmail" required>
                        </div>
                        <div class="form-group">
                            <span id="numberCheck" style="display: inline;"></span>
                            <input type="text" style="display: inline;clear: none;width: 80%;" class="form-control" required="" name="number_check" id="number_check" placeholder="Type the sum of the numbers">
                        </div>
                        <input class="btn btn-primary" id="btnforgetPassSubmit" value="Send My Password" type="submit">
                        <a href="#" class="cancel btn btn-primary">Cancel</a>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END / Forget password POPUP -->
<?php echo $this->Html->css(['/site/css/library/magnific-popup'], ['block' => 'cssTop']) ?>
<?php echo $this->Html->script(['/site/js/library/jquery.magnific-popup.min', '/site/js/forgetpassword'], ['block' => 'scriptBottom']) ?>
