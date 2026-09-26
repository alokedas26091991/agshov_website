<body id="myaddress">
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
								<a href="<?= $this->Url->build(["controller" => "Home", "action" => "changepassword"]); ?>">
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
								<a href="<?= $this->Url->build(["controller" => "Home", "action" => "addressbook"]); ?>" class="active">
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
							<h1>My Address</h1>
						</div>
						<div class="hyt">
							<div class="row g-3">
								<?php
								$c = 1;
								if ($address->count() > 0) {
									foreach ($address as $pro1):
								?>
										<div class="col-lg-6">
											<div class="adrs-box">
												<ul class="mioo">
													<li>
														<div class="ibox"><i class="fa-solid fa-user"></i></div>
														<div class="drw"><?= $pro1->name ?></div>
													</li>
													<li>
														<div class="ibox"><i class="fa-solid fa-phone"></i></div>
														<div class="drw"><?= $pro1->mobile ?></div>
													</li>
													<li>
														<div class="ibox"><i class="fa-solid fa-envelope"></i></div>
														<div class="drw"><?= $pro1->email ?></div>
													</li>
													<li>
														<div class="ibox"><i class="fa-solid fa-location-dot"></i></div>
														<div class="drw"><?= $pro1->home_address ?>,<?= $pro1->state ?>,<?= $pro1->city ?>,<?= $pro1->pin ?></div>
													</li>
												</ul>
												<div class="arjkbtn">
												<?= $this->Html->link('<span class="btn chan-mob"><span class=" icon-edit-1"></span>' . __('Edit') . '</span>', ['controller'=>'Home','action' => 'editaddress', $pro1->id],['escape' => false, 'class' => 'btn-default', 'title' => __('Edit address')]) ?>

<?= $this->Form->postLink('<span class="btn chan-mob"><span class="icon-garbage"></span>' . __('Delete') . '</span>', ['controller'=>'Home','action' => 'deleteaddress', $pro1->id], ['confirm' => __('Are you sure you want to Delete Address ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete Address')]) ?>
												</div>
											</div>
										</div>
									<?php $c++;
									endforeach; ?>
								<?php
								} else {
								?>
									<div class="data-not-found"><i class="icon-warning"></i> No Data Found</div>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</div>
</body>