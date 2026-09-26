<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Coupon'), ['action' => 'edit', $coupon->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Coupon'), ['action' => 'delete', $coupon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coupon->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Coupons'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coupon'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cart Item Originals'), ['controller' => 'CartItemOriginals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart Item Original'), ['controller' => 'CartItemOriginals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cart Items'), ['controller' => 'CartItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart Item'), ['controller' => 'CartItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cart Originals'), ['controller' => 'CartOriginals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart Original'), ['controller' => 'CartOriginals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Carts'), ['controller' => 'Carts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart'), ['controller' => 'Carts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Course Coupons'), ['controller' => 'CourseCoupons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course Coupon'), ['controller' => 'CourseCoupons', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Items'), ['controller' => 'InvoiceItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Item'), ['controller' => 'InvoiceItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offline Cart Items'), ['controller' => 'OfflineCartItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offline Cart Item'), ['controller' => 'OfflineCartItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offline Carts'), ['controller' => 'OfflineCarts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offline Cart'), ['controller' => 'OfflineCarts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Coupons'), ['controller' => 'UserCoupons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Coupon'), ['controller' => 'UserCoupons', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="coupons view col-lg-10 col-md-9 columns">
    <h2><?= h($coupon->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Coupon Code') ?></h6>
                    <p><?= h($coupon->coupon_code) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($coupon->id) ?></p>
                    <h6 class="subheader"><?= __('Discount Value') ?></h6>
                    <p><?= $this->Number->format($coupon->discount_value) ?></p>
                    <h6 class="subheader"><?= __('Is Featured') ?></h6>
                    <p><?= $this->Number->format($coupon->is_featured) ?></p>
                    <h6 class="subheader"><?= __('Created By') ?></h6>
                    <p><?= $this->Number->format($coupon->created_by) ?></p>
                    <h6 class="subheader"><?= __('Last Updated By') ?></h6>
                    <p><?= $this->Number->format($coupon->last_updated_by) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
				<div class="table-responsive">
        <table class="table">
                   
					<tr>
                   <th><?= __('Start Date') ?></th>
                    <td>  <p><?= h($coupon->start_date) ?></p></td>
					</tr>
                   
					<tr>
                   <th><?= __('Expiry Date') ?></th>
                    <td>  <p><?= h($coupon->expiry_date) ?></p></td>
					</tr>
                   
					<tr>
                   <th><?= __('Create Date') ?></th>
                    <td>  <p><?= h($coupon->create_date) ?></p></td>
					</tr>
                   
					<tr>
                   <th><?= __('Last Update Date') ?></th>
                    <td>  <p><?= h($coupon->last_update_date) ?></p></td>
					</tr>
/table>
					</div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns booleans end">
            <div class="panel panel-default">
                <div class="panel-body">
				<div class="table-responsive">
        <table class="table">
                   
                  
					
					
		<tr>
                   <th><?= __('App Only') ?></th>
                    <td>  <p><?= $coupon->app_only ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Is Deleted') ?></th>
                    <td>  <p><?= $coupon->is_deleted ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
</table>
					</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
				 <div class="table-responsive">
        <table class="table">
           
									 <tr>
                   <th><?= __('Description') ?></th>
                    <td><?= $this->Text->autoParagraph(h($coupon->description)); ?></td>
					</tr>
										 <tr>
                   <th><?= __('Discount Type') ?></th>
                    <td><?= $this->Text->autoParagraph(h($coupon->discount_type)); ?></td>
					</tr>
										 <tr>
                   <th><?= __('Page Link') ?></th>
                    <td><?= $this->Text->autoParagraph(h($coupon->page_link)); ?></td>
					</tr>
					</table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related CartItemOriginals') ?></h4>
    <?php if (!empty($coupon->cart_item_originals)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Cart Original Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Item Gross Amount') ?></th>
                <th><?= __('Coupon Id') ?></th>
                <th><?= __('Discount Amt') ?></th>
                <th><?= __('Item Net Amount') ?></th>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Combo Id') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($coupon->cart_item_originals as $cartItemOriginals): ?>
            <tr>
                <td><?= h($cartItemOriginals->id) ?></td>
                <td><?= h($cartItemOriginals->cart_original_id) ?></td>
                <td><?= h($cartItemOriginals->parent_id) ?></td>
                <td><?= h($cartItemOriginals->item_id) ?></td>
                <td><?= h($cartItemOriginals->item_gross_amount) ?></td>
                <td><?= h($cartItemOriginals->coupon_id) ?></td>
                <td><?= h($cartItemOriginals->discount_amt) ?></td>
                <td><?= h($cartItemOriginals->item_net_amount) ?></td>
                <td><?= h($cartItemOriginals->product_id) ?></td>
                <td><?= h($cartItemOriginals->combo_id) ?></td>
                <td><?= h($cartItemOriginals->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'CartItemOriginals', 'action' => 'view', $cartItemOriginals->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'CartItemOriginals', 'action' => 'edit', $cartItemOriginals->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'CartItemOriginals', 'action' => 'delete', $cartItemOriginals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartItemOriginals->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related CartItems') ?></h4>
    <?php if (!empty($coupon->cart_items)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Cart Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Item Gross Amount') ?></th>
                <th><?= __('Coupon Id') ?></th>
                <th><?= __('Discount Amt') ?></th>
                <th><?= __('Item Net Amount') ?></th>
                <th><?= __('Combo Id') ?></th>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($coupon->cart_items as $cartItems): ?>
            <tr>
                <td><?= h($cartItems->id) ?></td>
                <td><?= h($cartItems->cart_id) ?></td>
                <td><?= h($cartItems->parent_id) ?></td>
                <td><?= h($cartItems->item_id) ?></td>
                <td><?= h($cartItems->item_gross_amount) ?></td>
                <td><?= h($cartItems->coupon_id) ?></td>
                <td><?= h($cartItems->discount_amt) ?></td>
                <td><?= h($cartItems->item_net_amount) ?></td>
                <td><?= h($cartItems->combo_id) ?></td>
                <td><?= h($cartItems->product_id) ?></td>
                <td><?= h($cartItems->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'CartItems', 'action' => 'view', $cartItems->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'CartItems', 'action' => 'edit', $cartItems->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'CartItems', 'action' => 'delete', $cartItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartItems->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related CartOriginals') ?></h4>
    <?php if (!empty($coupon->cart_originals)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Cart Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Ipaddress') ?></th>
                <th><?= __('Gross Amt') ?></th>
                <th><?= __('Coupon Id') ?></th>
                <th><?= __('Discount Amt') ?></th>
                <th><?= __('Tax Amt') ?></th>
                <th><?= __('Net Amt') ?></th>
                <th><?= __('Order Id') ?></th>
                <th><?= __('Payment Mode') ?></th>
                <th><?= __('Payment Status') ?></th>
                <th><?= __('Create Date') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($coupon->cart_originals as $cartOriginals): ?>
            <tr>
                <td><?= h($cartOriginals->id) ?></td>
                <td><?= h($cartOriginals->cart_id) ?></td>
                <td><?= h($cartOriginals->user_id) ?></td>
                <td><?= h($cartOriginals->ipaddress) ?></td>
                <td><?= h($cartOriginals->gross_amt) ?></td>
                <td><?= h($cartOriginals->coupon_id) ?></td>
                <td><?= h($cartOriginals->discount_amt) ?></td>
                <td><?= h($cartOriginals->tax_amt) ?></td>
                <td><?= h($cartOriginals->net_amt) ?></td>
                <td><?= h($cartOriginals->order_id) ?></td>
                <td><?= h($cartOriginals->payment_mode) ?></td>
                <td><?= h($cartOriginals->payment_status) ?></td>
                <td><?= h($cartOriginals->create_date) ?></td>
                <td><?= h($cartOriginals->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'CartOriginals', 'action' => 'view', $cartOriginals->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'CartOriginals', 'action' => 'edit', $cartOriginals->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'CartOriginals', 'action' => 'delete', $cartOriginals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartOriginals->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Carts') ?></h4>
    <?php if (!empty($coupon->carts)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Ipaddress') ?></th>
                <th><?= __('Gross Amt') ?></th>
                <th><?= __('Coupon Id') ?></th>
                <th><?= __('Discount Amt') ?></th>
                <th><?= __('Tax Amt') ?></th>
                <th><?= __('Net Amt') ?></th>
                <th><?= __('Order Id') ?></th>
                <th><?= __('Payment Mode') ?></th>
                <th><?= __('Payment Status') ?></th>
                <th><?= __('Create Date') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($coupon->carts as $carts): ?>
            <tr>
                <td><?= h($carts->id) ?></td>
                <td><?= h($carts->user_id) ?></td>
                <td><?= h($carts->ipaddress) ?></td>
                <td><?= h($carts->gross_amt) ?></td>
                <td><?= h($carts->coupon_id) ?></td>
                <td><?= h($carts->discount_amt) ?></td>
                <td><?= h($carts->tax_amt) ?></td>
                <td><?= h($carts->net_amt) ?></td>
                <td><?= h($carts->order_id) ?></td>
                <td><?= h($carts->payment_mode) ?></td>
                <td><?= h($carts->payment_status) ?></td>
                <td><?= h($carts->create_date) ?></td>
                <td><?= h($carts->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'Carts', 'action' => 'view', $carts->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Carts', 'action' => 'edit', $carts->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'Carts', 'action' => 'delete', $carts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carts->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related CourseCoupons') ?></h4>
    <?php if (!empty($coupon->course_coupons)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Coupon Id') ?></th>
                <th><?= __('Course Id') ?></th>
                <th><?= __('Course Subject Id') ?></th>
                <th><?= __('Course Language Id') ?></th>
                <th><?= __('Course Region Id') ?></th>
                <th><?= __('Course Delivery Mode Id') ?></th>
                <th><?= __('Course Author Id') ?></th>
                <th><?= __('Tag Id') ?></th>
                <th><?= __('Combo Id') ?></th>
                <th><?= __('Webinar Id') ?></th>
                <th><?= __('Workshop Id') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($coupon->course_coupons as $courseCoupons): ?>
            <tr>
                <td><?= h($courseCoupons->id) ?></td>
                <td><?= h($courseCoupons->coupon_id) ?></td>
                <td><?= h($courseCoupons->course_id) ?></td>
                <td><?= h($courseCoupons->course_subject_id) ?></td>
                <td><?= h($courseCoupons->course_language_id) ?></td>
                <td><?= h($courseCoupons->course_region_id) ?></td>
                <td><?= h($courseCoupons->course_delivery_mode_id) ?></td>
                <td><?= h($courseCoupons->course_author_id) ?></td>
                <td><?= h($courseCoupons->tag_id) ?></td>
                <td><?= h($courseCoupons->combo_id) ?></td>
                <td><?= h($courseCoupons->webinar_id) ?></td>
                <td><?= h($courseCoupons->workshop_id) ?></td>
                <td><?= h($courseCoupons->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'CourseCoupons', 'action' => 'view', $courseCoupons->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'CourseCoupons', 'action' => 'edit', $courseCoupons->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'CourseCoupons', 'action' => 'delete', $courseCoupons->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courseCoupons->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related InvoiceItems') ?></h4>
    <?php if (!empty($coupon->invoice_items)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Old Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Invoice Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Item Gross Amount') ?></th>
                <th><?= __('Coupon Id') ?></th>
                <th><?= __('Coupon Code') ?></th>
                <th><?= __('Discount Amount') ?></th>
                <th><?= __('Item Net Amount') ?></th>
                <th><?= __('Allocation Amount') ?></th>
                <th><?= __('Request Certificate Status') ?></th>
                <th><?= __('Certificate Generate Date') ?></th>
                <th><?= __('Create Date') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($coupon->invoice_items as $invoiceItems): ?>
            <tr>
                <td><?= h($invoiceItems->id) ?></td>
                <td><?= h($invoiceItems->old_id) ?></td>
                <td><?= h($invoiceItems->parent_id) ?></td>
                <td><?= h($invoiceItems->invoice_id) ?></td>
                <td><?= h($invoiceItems->item_id) ?></td>
                <td><?= h($invoiceItems->item_gross_amount) ?></td>
                <td><?= h($invoiceItems->coupon_id) ?></td>
                <td><?= h($invoiceItems->coupon_code) ?></td>
                <td><?= h($invoiceItems->discount_amount) ?></td>
                <td><?= h($invoiceItems->item_net_amount) ?></td>
                <td><?= h($invoiceItems->allocation_amount) ?></td>
                <td><?= h($invoiceItems->request_certificate_status) ?></td>
                <td><?= h($invoiceItems->certificate_generate_date) ?></td>
                <td><?= h($invoiceItems->create_date) ?></td>
                <td><?= h($invoiceItems->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'InvoiceItems', 'action' => 'view', $invoiceItems->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'InvoiceItems', 'action' => 'edit', $invoiceItems->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'InvoiceItems', 'action' => 'delete', $invoiceItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceItems->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Invoices') ?></h4>
    <?php if (!empty($coupon->invoices)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Old Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Invoice No') ?></th>
                <th><?= __('Pay Txn Id') ?></th>
                <th><?= __('Pay Mode') ?></th>
                <th><?= __('Order Id') ?></th>
                <th><?= __('Ipaddress') ?></th>
                <th><?= __('Gross Amt') ?></th>
                <th><?= __('Coupon Id') ?></th>
                <th><?= __('Point') ?></th>
                <th><?= __('Point Amt') ?></th>
                <th><?= __('Utm Source Id') ?></th>
                <th><?= __('Coupon Code') ?></th>
                <th><?= __('Discount Amt') ?></th>
                <th><?= __('Tax Amt') ?></th>
                <th><?= __('Net Amt') ?></th>
                <th><?= __('Is Ka Sale') ?></th>
                <th><?= __('Affiliate Code') ?></th>
                <th><?= __('Utm Source') ?></th>
                <th><?= __('Utm Campaign') ?></th>
                <th><?= __('Utm Medium') ?></th>
                <th><?= __('Organization Id') ?></th>
                <th><?= __('Creation Date') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($coupon->invoices as $invoices): ?>
            <tr>
                <td><?= h($invoices->id) ?></td>
                <td><?= h($invoices->old_id) ?></td>
                <td><?= h($invoices->user_id) ?></td>
                <td><?= h($invoices->invoice_no) ?></td>
                <td><?= h($invoices->pay_txn_id) ?></td>
                <td><?= h($invoices->pay_mode) ?></td>
                <td><?= h($invoices->order_id) ?></td>
                <td><?= h($invoices->ipaddress) ?></td>
                <td><?= h($invoices->gross_amt) ?></td>
                <td><?= h($invoices->coupon_id) ?></td>
                <td><?= h($invoices->point) ?></td>
                <td><?= h($invoices->point_amt) ?></td>
                <td><?= h($invoices->utm_source_id) ?></td>
                <td><?= h($invoices->coupon_code) ?></td>
                <td><?= h($invoices->discount_amt) ?></td>
                <td><?= h($invoices->tax_amt) ?></td>
                <td><?= h($invoices->net_amt) ?></td>
                <td><?= h($invoices->is_ka_sale) ?></td>
                <td><?= h($invoices->affiliate_code) ?></td>
                <td><?= h($invoices->utm_source) ?></td>
                <td><?= h($invoices->utm_campaign) ?></td>
                <td><?= h($invoices->utm_medium) ?></td>
                <td><?= h($invoices->organization_id) ?></td>
                <td><?= h($invoices->creation_date) ?></td>
                <td><?= h($invoices->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'Invoices', 'action' => 'view', $invoices->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Invoices', 'action' => 'edit', $invoices->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'Invoices', 'action' => 'delete', $invoices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoices->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related OfflineCartItems') ?></h4>
    <?php if (!empty($coupon->offline_cart_items)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Offline Cart Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Item Gross Amount') ?></th>
                <th><?= __('Coupon Id') ?></th>
                <th><?= __('Discount Amt') ?></th>
                <th><?= __('Item Net Amount') ?></th>
                <th><?= __('Course Id') ?></th>
                <th><?= __('Combo Id') ?></th>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Webinar Id') ?></th>
                <th><?= __('Workshop Id') ?></th>
                <th><?= __('Course Batch Id') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($coupon->offline_cart_items as $offlineCartItems): ?>
            <tr>
                <td><?= h($offlineCartItems->id) ?></td>
                <td><?= h($offlineCartItems->offline_cart_id) ?></td>
                <td><?= h($offlineCartItems->parent_id) ?></td>
                <td><?= h($offlineCartItems->item_id) ?></td>
                <td><?= h($offlineCartItems->item_gross_amount) ?></td>
                <td><?= h($offlineCartItems->coupon_id) ?></td>
                <td><?= h($offlineCartItems->discount_amt) ?></td>
                <td><?= h($offlineCartItems->item_net_amount) ?></td>
                <td><?= h($offlineCartItems->course_id) ?></td>
                <td><?= h($offlineCartItems->combo_id) ?></td>
                <td><?= h($offlineCartItems->product_id) ?></td>
                <td><?= h($offlineCartItems->webinar_id) ?></td>
                <td><?= h($offlineCartItems->workshop_id) ?></td>
                <td><?= h($offlineCartItems->course_batch_id) ?></td>
                <td><?= h($offlineCartItems->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'OfflineCartItems', 'action' => 'view', $offlineCartItems->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'OfflineCartItems', 'action' => 'edit', $offlineCartItems->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'OfflineCartItems', 'action' => 'delete', $offlineCartItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offlineCartItems->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related OfflineCarts') ?></h4>
    <?php if (!empty($coupon->offline_carts)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Ipaddress') ?></th>
                <th><?= __('Gross Amt') ?></th>
                <th><?= __('Coupon Id') ?></th>
                <th><?= __('Discount Amt') ?></th>
                <th><?= __('Tax Amt') ?></th>
                <th><?= __('Net Amt') ?></th>
                <th><?= __('Create Date') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($coupon->offline_carts as $offlineCarts): ?>
            <tr>
                <td><?= h($offlineCarts->id) ?></td>
                <td><?= h($offlineCarts->user_id) ?></td>
                <td><?= h($offlineCarts->ipaddress) ?></td>
                <td><?= h($offlineCarts->gross_amt) ?></td>
                <td><?= h($offlineCarts->coupon_id) ?></td>
                <td><?= h($offlineCarts->discount_amt) ?></td>
                <td><?= h($offlineCarts->tax_amt) ?></td>
                <td><?= h($offlineCarts->net_amt) ?></td>
                <td><?= h($offlineCarts->create_date) ?></td>
                <td><?= h($offlineCarts->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'OfflineCarts', 'action' => 'view', $offlineCarts->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'OfflineCarts', 'action' => 'edit', $offlineCarts->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'OfflineCarts', 'action' => 'delete', $offlineCarts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offlineCarts->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related UserCoupons') ?></h4>
    <?php if (!empty($coupon->user_coupons)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Coupon Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Is Used') ?></th>
                <th><?= __('Used Date') ?></th>
                <th><?= __('Create Date') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Last Updated By') ?></th>
                <th><?= __('Last Update Date') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($coupon->user_coupons as $userCoupons): ?>
            <tr>
                <td><?= h($userCoupons->id) ?></td>
                <td><?= h($userCoupons->coupon_id) ?></td>
                <td><?= h($userCoupons->user_id) ?></td>
                <td><?= h($userCoupons->item_id) ?></td>
                <td><?= h($userCoupons->is_used) ?></td>
                <td><?= h($userCoupons->used_date) ?></td>
                <td><?= h($userCoupons->create_date) ?></td>
                <td><?= h($userCoupons->created_by) ?></td>
                <td><?= h($userCoupons->last_updated_by) ?></td>
                <td><?= h($userCoupons->last_update_date) ?></td>
                <td><?= h($userCoupons->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'UserCoupons', 'action' => 'view', $userCoupons->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'UserCoupons', 'action' => 'edit', $userCoupons->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'UserCoupons', 'action' => 'delete', $userCoupons->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userCoupons->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
