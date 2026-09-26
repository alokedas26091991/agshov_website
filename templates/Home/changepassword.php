<body id="edit-account">


	<div class="bridcrum bmhhh">
		<div class="container">
			<span class="hgrl"><a href="<?= $this->Url->build('/'); ?>">Home</a></span> | <span class="hjul">Dashboard</span>
		</div>
	</div>

	<div class="acount-info">
		<div class="container">
			<div class="row g-3">
				<div class="col-lg-3">
					<div class="aclft">
						<div class="ltop">
							<div class="usimg"><img src="/assets/images/circle-user.png" alt="pic"></div>
							<div class="rnm">
								<div class="klyy">Hello</div>
								<div class="usr-nm"><?= h($user1->name) ?></div>
							</div>
						</div>
						<ul class="rpuui">
							<li>
								<a href="<?= $this->Url->build(["controller" => "Home", "action" => "myaccount"]); ?>">
									<div class="bqx"><img src="/assets/images/edit.png" alt="icon"></div>
									<div class="vdee">Account Information</div>
								</a>
							</li>
							<li>
								<a href="<?= $this->Url->build(["controller" => "Home", "action" => "changepassword"]); ?>" class="active">
									<div class="bqx"><img src="/assets/images/padlock.png" alt="icon"></div>
									<div class="vdee">Change Password</div>
								</a>
							</li>
							<li>
								<a href="<?= $this->Url->build(["controller" => "Home", "action" => "myorders"]); ?>">
									<div class="bqx"><img src="/assets/images/checkout.png" alt="icon"></div>
									<div class="vdee">My Order</div>
								</a>
							</li>
							<li>
								<a href="<?= $this->Url->build(["controller" => "ViewCarts", "action" => "wishlist1"]); ?>">
									<div class="bqx"><img src="/assets/images/e-commerce.png" alt="icon"></div>
									<div class="vdee">My Wishlist</div>
								</a>
							</li>
							<li>
								<a href="<?= $this->Url->build(["controller" => "Home", "action" => "addressbook"]); ?>">
									<div class="bqx"><img src="/assets/images/e-commerce.png" alt="icon"></div>
									<div class="vdee">My Address</div>
								</a>
							</li>
							<li>
								<a href="<?= $this->Url->build(["controller" => "Login", "action" => "logout"]); ?>" onclick="return confirm('Are you sure you want to Logout?');">
									<div class="bqx"><img src="/assets/images/logout.png" alt="icon"></div>
									<div class="vdee">Logout</div>
								</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-lg-9">
					<div class="acrt-box">
						<div class="head">
							<h1>Change Password</h1>
						</div>
						<div class="hyt">
							<?= $this->Form->create($user1, ['url' => ['controller' => 'Home', 'action' => 'changepassword']]); ?>
							<div class="row g-3">
								<div class="col-lg-6 required-field">
									<label for="new-password">Enter New Password</label>
									<div class="input text required">
										<?= $this->Form->input('new_password', [
											'type' => 'password',
											'placeholder' => "Enter New Password",
											'required' => true,
											'class' => 'form-control',
											'id' => 'new_password'
										]); ?>
									</div>
								</div>
								<div class="col-lg-6 required-field">
									<label for="confirm-password">Enter Confirm Password</label>
									<div class="input text required">
										<?= $this->Form->input('confirm_password', [
											'type' => 'password',
											'placeholder' => "Enter Confirm Password",
											'required' => true,
											'class' => 'form-control',
											'id' => 'confirm_password'
										]); ?>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="pas">
										<button type="submit" class="xzll">Save</button>
									</div>
								</div>
							</div>
							<?= $this->Form->end(); ?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

</body>