<body id="login-page">
    <div class="bridcrum bmhhh">
        <div class="container">
            <span class="hgrl"><a href="/">Home</a></span> | <span class="hjul">Login</span>
        </div>
    </div>
    <div class="logreg-sec common">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="left-img">
                        <img src="/assets/images/login-img.png" alt="pic">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-from">
                        <div class="head">
                            <h1>Login</h1>
                        </div>
                        <?= $this->Form->create(null, ['id' => 'login-form']) ?>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <?= $this->Form->control('email', ['class' => 'form-control', 'type' => 'email', 'placeholder' => 'name@example.com']) ?>
                            </div>
                            <div class="col-md-12">
                                <?= $this->Form->control('password', ['class' => 'form-control', 'type' => 'password', 'placeholder' => '']) ?>
                            </div>
                            <div class="col-md-12">
                                <div class="fgpass">
                                    <!--<span><a href="/forget-password">Forgot Password</a></span>-->
                                    <span>You have an account? <a href="/register">Register</a></span>
                                </div>
                            </div>
                            <div class="col-md-12 lrbut">
                                <button type="submit" id="submit-btn" class="btn btn-danger shadow-lg mt-2 w-100">LOGIN</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>