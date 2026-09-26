<body id="my-order">
	<div class="bridcrum bmhhh">
		<div class="container">
			<span class="hgrl"><a href="/">Home</a></span> | <span class="hgrl"><a href="/home/myaccount">Dashboard</a></span> | <span class="hjul">My Order</span>
		</div>
	</div>
	<div class="orderpg">
		<div class="container">
			<div class="main-order-box">
				<div class="row g-3">
					<?php if ($invoice1->count() > 0): ?>
						<?php foreach ($invoice1 as $invoice): ?>
							<?php
							if (empty($invoice->creation_date)) {
								$dd = 10;
							} else {
								$today = date_create(date("Y-m-d"));
								$order_complete = date_create(date("Y-m-d", strtotime($invoice->creation_date)));
								$date_dif = date_diff($order_complete, $today);
								$dd = $date_dif->format("%a");
							}
							$status_text = 'Pending';
							switch ($invoice->order_status) {
								case 0:
									$status_text = "Processing";
									break;
								case 1:
									$status_text = "Order Confirmed";
									break;
								case 2:
									$status_text = "Delivered";
									break;
								case 3:
									$status_text = "Order Cancelled";
									break;
								case 4:
									$status_text = "In Transit";
									break;
							}
							$est_delivery = date("d-m-Y", strtotime($invoice->creation_date . ' +5 days'));
							?>
							<div class="tycvm">
								<div class="row g-3">
									<div class="col-lg-12 rtj">
										<div class="col-lg-2">
											<div class="orderid cbn">Order Id: <?= h($invoice->order_id) ?></div>
										</div>
										<div class="col-lg-2">
											<div class="orderstatus cbn">Order Status: <?= h($status_text) ?></div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="row g-3">
											<?php foreach ($invoice->invoice_items as $item): ?>
												<div class="odrmn-body">
													<div class="col-lg-6">
														<div class="ord-lft">
															<div class="col-lg-3">
																<div class="ord-pic">
																	<img src="<?= $this->Url->image(UPLOAD_PRODUCT_IMAGE . $item->product->photo) ?>" alt="<?= h($item->product->name) ?>">
																</div>
															</div>
															<div class="col-lg-7 nbcz">
																<div class="prdtls">
																	<div class="pnm"><?= h($item->product->name) ?></div>
																	<div class="oty">Quantity: <?= h($item->quantity) ?></div>
																	<div class="oty">Rs: <?= h($item->item_net_amount) ?></div>

																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-6 bkii">
														<div class="stdt">Order Date: <?= date("d-m-Y", strtotime($invoice->creation_date)) ?></div>
													</div>


												</div>
											<?php endforeach; ?>

											<div class="invbt">
												<?= $this->Html->link('Invoice Download', ['controller' => 'Home', 'action' => 'invoicedownload', $invoice->id], ['class' => '', 'title' => _('Invoice')]) ?>
											</div>

											<div class="invbt">
												<?= $this->Html->link(
													'Order Cancel',
													['controller' => 'Home', 'action' => 'ordercancell', $invoice->id],
													[
														'class' => '',
														'title' => __('Order Cancel'),
														'confirm' => __('Are you sure you want to cancel this order?')
													]
												) ?>
											</div>


										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</body>