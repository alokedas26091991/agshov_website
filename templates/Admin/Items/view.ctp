<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cart Item Originals'), ['controller' => 'CartItemOriginals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart Item Original'), ['controller' => 'CartItemOriginals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cart Items'), ['controller' => 'CartItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart Item'), ['controller' => 'CartItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Combo Items'), ['controller' => 'ComboItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Combo Item'), ['controller' => 'ComboItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Combos'), ['controller' => 'Combos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Combo'), ['controller' => 'Combos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Combos'), ['controller' => 'InvoiceCombos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Combo'), ['controller' => 'InvoiceCombos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Course History'), ['controller' => 'InvoiceCourseHistory', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Course History'), ['controller' => 'InvoiceCourseHistory', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Courses'), ['controller' => 'InvoiceCourses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Course'), ['controller' => 'InvoiceCourses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Items'), ['controller' => 'InvoiceItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Item'), ['controller' => 'InvoiceItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offline Cart Items'), ['controller' => 'OfflineCartItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offline Cart Item'), ['controller' => 'OfflineCartItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Refund Requests'), ['controller' => 'RefundRequests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Refund Request'), ['controller' => 'RefundRequests', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Coupons'), ['controller' => 'UserCoupons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Coupon'), ['controller' => 'UserCoupons', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="items view col-lg-10 col-md-9 columns">
    <h2><?= h($item->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($item->name) ?></p>
                    <h6 class="subheader"><?= __('Name In English') ?></h6>
                    <p><?= h($item->name_in_english) ?></p>
                    <h6 class="subheader"><?= __('Product Id') ?></h6>
                    <p><?= h($item->product_id) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($item->id) ?></p>
                    <h6 class="subheader"><?= __('Type') ?></h6>
                    <p><?= $this->Number->format($item->type) ?></p>
                    <h6 class="subheader"><?= __('Seller Id') ?></h6>
                    <p><?= $this->Number->format($item->seller_id) ?></p>
                    <h6 class="subheader"><?= __('Actual Price') ?></h6>
                    <p><?= $this->Number->format($item->actual_price) ?></p>
                    <h6 class="subheader"><?= __('Offer Price') ?></h6>
                    <p><?= $this->Number->format($item->offer_price) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns booleans end">
            <div class="panel panel-default">
                <div class="panel-body">
				<div class="table-responsive">
        <table class="table">
                   
                  
					
					
		<tr>
                   <th><?= __('Is Deleted') ?></th>
                    <td>  <p><?= $item->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
           
				</table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Products') ?></h4>
    <?php if (!empty($item->products)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Search Keyword') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Sale Tag') ?></th>
                <th><?= __('Introduction') ?></th>
                <th><?= __('Objective') ?></th>
                <th><?= __('Benefits') ?></th>
                <th><?= __('Content Topic Summary') ?></th>
                <th><?= __('Summary') ?></th>
                <th><?= __('Open Date') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Display Image') ?></th>
                <th><?= __('Actual Price') ?></th>
                <th><?= __('Offer Price') ?></th>
                <th><?= __('Is Featured') ?></th>
                <th><?= __('Rank') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('Not For Sale') ?></th>
                <th><?= __('Meta Title') ?></th>
                <th><?= __('Meta Keywords') ?></th>
                <th><?= __('Meta Desc') ?></th>
                <th><?= __('Robots') ?></th>
                <th><?= __('Canonical') ?></th>
                <th><?= __('Create Date') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Last Update Date') ?></th>
                <th><?= __('Last Updated By') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->item_id) ?></td>
                <td><?= h($products->user_id) ?></td>
                <td><?= h($products->name) ?></td>
                <td><?= h($products->slug) ?></td>
                <td><?= h($products->search_keyword) ?></td>
                <td><?= h($products->category_id) ?></td>
                <td><?= h($products->sale_tag) ?></td>
                <td><?= h($products->introduction) ?></td>
                <td><?= h($products->objective) ?></td>
                <td><?= h($products->benefits) ?></td>
                <td><?= h($products->content_topic_summary) ?></td>
                <td><?= h($products->summary) ?></td>
                <td><?= h($products->open_date) ?></td>
                <td><?= h($products->photo) ?></td>
                <td><?= h($products->display_image) ?></td>
                <td><?= h($products->actual_price) ?></td>
                <td><?= h($products->offer_price) ?></td>
                <td><?= h($products->is_featured) ?></td>
                <td><?= h($products->rank) ?></td>
                <td><?= h($products->status) ?></td>
                <td><?= h($products->is_active) ?></td>
                <td><?= h($products->not_for_sale) ?></td>
                <td><?= h($products->meta_title) ?></td>
                <td><?= h($products->meta_keywords) ?></td>
                <td><?= h($products->meta_desc) ?></td>
                <td><?= h($products->robots) ?></td>
                <td><?= h($products->canonical) ?></td>
                <td><?= h($products->create_date) ?></td>
                <td><?= h($products->created_by) ?></td>
                <td><?= h($products->last_update_date) ?></td>
                <td><?= h($products->last_updated_by) ?></td>
                <td><?= h($products->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'Products', 'action' => 'view', $products->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Products', 'action' => 'edit', $products->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
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
    <h4 class="subheader"><?= __('Related CartItemOriginals') ?></h4>
    <?php if (!empty($item->cart_item_originals)): ?>
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
            <?php foreach ($item->cart_item_originals as $cartItemOriginals): ?>
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
    <?php if (!empty($item->cart_items)): ?>
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
            <?php foreach ($item->cart_items as $cartItems): ?>
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
    <h4 class="subheader"><?= __('Related ComboItems') ?></h4>
    <?php if (!empty($item->combo_items)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Combo Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Combo Price Allocation') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->combo_items as $comboItems): ?>
            <tr>
                <td><?= h($comboItems->id) ?></td>
                <td><?= h($comboItems->combo_id) ?></td>
                <td><?= h($comboItems->item_id) ?></td>
                <td><?= h($comboItems->combo_price_allocation) ?></td>
                <td><?= h($comboItems->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'ComboItems', 'action' => 'view', $comboItems->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'ComboItems', 'action' => 'edit', $comboItems->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'ComboItems', 'action' => 'delete', $comboItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comboItems->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
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
    <h4 class="subheader"><?= __('Related Combos') ?></h4>
    <?php if (!empty($item->combos)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Promo Video') ?></th>
                <th><?= __('Actual Price') ?></th>
                <th><?= __('Offer Price') ?></th>
                <th><?= __('Is Featured') ?></th>
                <th><?= __('Rank') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('Has Batches') ?></th>
                <th><?= __('Meta Title') ?></th>
                <th><?= __('Meta Keywords') ?></th>
                <th><?= __('Meta Desc') ?></th>
                <th><?= __('Robots') ?></th>
                <th><?= __('Canonical') ?></th>
                <th><?= __('Create Date') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Last Update Date') ?></th>
                <th><?= __('Last Updated By') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->combos as $combos): ?>
            <tr>
                <td><?= h($combos->id) ?></td>
                <td><?= h($combos->item_id) ?></td>
                <td><?= h($combos->user_id) ?></td>
                <td><?= h($combos->name) ?></td>
                <td><?= h($combos->slug) ?></td>
                <td><?= h($combos->description) ?></td>
                <td><?= h($combos->photo) ?></td>
                <td><?= h($combos->promo_video) ?></td>
                <td><?= h($combos->actual_price) ?></td>
                <td><?= h($combos->offer_price) ?></td>
                <td><?= h($combos->is_featured) ?></td>
                <td><?= h($combos->rank) ?></td>
                <td><?= h($combos->is_active) ?></td>
                <td><?= h($combos->has_batches) ?></td>
                <td><?= h($combos->meta_title) ?></td>
                <td><?= h($combos->meta_keywords) ?></td>
                <td><?= h($combos->meta_desc) ?></td>
                <td><?= h($combos->robots) ?></td>
                <td><?= h($combos->canonical) ?></td>
                <td><?= h($combos->create_date) ?></td>
                <td><?= h($combos->created_by) ?></td>
                <td><?= h($combos->last_update_date) ?></td>
                <td><?= h($combos->last_updated_by) ?></td>
                <td><?= h($combos->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'Combos', 'action' => 'view', $combos->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Combos', 'action' => 'edit', $combos->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'Combos', 'action' => 'delete', $combos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $combos->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
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
    <h4 class="subheader"><?= __('Related InvoiceCombos') ?></h4>
    <?php if (!empty($item->invoice_combos)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Invoice Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Combo Id') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->invoice_combos as $invoiceCombos): ?>
            <tr>
                <td><?= h($invoiceCombos->id) ?></td>
                <td><?= h($invoiceCombos->invoice_id) ?></td>
                <td><?= h($invoiceCombos->item_id) ?></td>
                <td><?= h($invoiceCombos->combo_id) ?></td>
                <td><?= h($invoiceCombos->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'InvoiceCombos', 'action' => 'view', $invoiceCombos->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'InvoiceCombos', 'action' => 'edit', $invoiceCombos->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'InvoiceCombos', 'action' => 'delete', $invoiceCombos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceCombos->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
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
    <h4 class="subheader"><?= __('Related InvoiceCourseHistory') ?></h4>
    <?php if (!empty($item->invoice_course_history)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Invoice Course Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Seller Id') ?></th>
                <th><?= __('Invoice Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Course Id') ?></th>
                <th><?= __('Course Batch Id') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('Expiry Date') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->invoice_course_history as $invoiceCourseHistory): ?>
            <tr>
                <td><?= h($invoiceCourseHistory->id) ?></td>
                <td><?= h($invoiceCourseHistory->invoice_course_id) ?></td>
                <td><?= h($invoiceCourseHistory->user_id) ?></td>
                <td><?= h($invoiceCourseHistory->seller_id) ?></td>
                <td><?= h($invoiceCourseHistory->invoice_id) ?></td>
                <td><?= h($invoiceCourseHistory->item_id) ?></td>
                <td><?= h($invoiceCourseHistory->course_id) ?></td>
                <td><?= h($invoiceCourseHistory->course_batch_id) ?></td>
                <td><?= h($invoiceCourseHistory->start_date) ?></td>
                <td><?= h($invoiceCourseHistory->expiry_date) ?></td>
                <td><?= h($invoiceCourseHistory->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'InvoiceCourseHistory', 'action' => 'view', $invoiceCourseHistory->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'InvoiceCourseHistory', 'action' => 'edit', $invoiceCourseHistory->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'InvoiceCourseHistory', 'action' => 'delete', $invoiceCourseHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceCourseHistory->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
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
    <h4 class="subheader"><?= __('Related InvoiceCourses') ?></h4>
    <?php if (!empty($item->invoice_courses)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Old Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Seller Id') ?></th>
                <th><?= __('Invoice Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Course Id') ?></th>
                <th><?= __('Course Batch Id') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('Expiry Date') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->invoice_courses as $invoiceCourses): ?>
            <tr>
                <td><?= h($invoiceCourses->id) ?></td>
                <td><?= h($invoiceCourses->old_id) ?></td>
                <td><?= h($invoiceCourses->user_id) ?></td>
                <td><?= h($invoiceCourses->seller_id) ?></td>
                <td><?= h($invoiceCourses->invoice_id) ?></td>
                <td><?= h($invoiceCourses->item_id) ?></td>
                <td><?= h($invoiceCourses->course_id) ?></td>
                <td><?= h($invoiceCourses->course_batch_id) ?></td>
                <td><?= h($invoiceCourses->start_date) ?></td>
                <td><?= h($invoiceCourses->expiry_date) ?></td>
                <td><?= h($invoiceCourses->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'InvoiceCourses', 'action' => 'view', $invoiceCourses->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'InvoiceCourses', 'action' => 'edit', $invoiceCourses->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'InvoiceCourses', 'action' => 'delete', $invoiceCourses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceCourses->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
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
    <?php if (!empty($item->invoice_items)): ?>
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
            <?php foreach ($item->invoice_items as $invoiceItems): ?>
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
    <h4 class="subheader"><?= __('Related OfflineCartItems') ?></h4>
    <?php if (!empty($item->offline_cart_items)): ?>
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
            <?php foreach ($item->offline_cart_items as $offlineCartItems): ?>
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
    <h4 class="subheader"><?= __('Related Payments') ?></h4>
    <?php if (!empty($item->payments)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Order Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Tax') ?></th>
                <th><?= __('Discount') ?></th>
                <th><?= __('Process Status') ?></th>
                <th><?= __('Pay Date') ?></th>
                <th><?= __('Ipaddress') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->payments as $payments): ?>
            <tr>
                <td><?= h($payments->id) ?></td>
                <td><?= h($payments->type) ?></td>
                <td><?= h($payments->item_id) ?></td>
                <td><?= h($payments->order_id) ?></td>
                <td><?= h($payments->user_id) ?></td>
                <td><?= h($payments->price) ?></td>
                <td><?= h($payments->tax) ?></td>
                <td><?= h($payments->discount) ?></td>
                <td><?= h($payments->process_status) ?></td>
                <td><?= h($payments->pay_date) ?></td>
                <td><?= h($payments->ipaddress) ?></td>
                <td><?= h($payments->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'Payments', 'action' => 'view', $payments->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Payments', 'action' => 'edit', $payments->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'Payments', 'action' => 'delete', $payments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payments->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
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
    <h4 class="subheader"><?= __('Related RefundRequests') ?></h4>
    <?php if (!empty($item->refund_requests)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Invoice Id') ?></th>
                <th><?= __('Invoice Item Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Refund Amount') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Request By') ?></th>
                <th><?= __('Request Date') ?></th>
                <th><?= __('Approved By') ?></th>
                <th><?= __('Approved Date') ?></th>
                <th><?= __('Account By') ?></th>
                <th><?= __('Account Date') ?></th>
                <th><?= __('Account Note') ?></th>
                <th><?= __('Deny Note') ?></th>
                <th><?= __('Create Date') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->refund_requests as $refundRequests): ?>
            <tr>
                <td><?= h($refundRequests->id) ?></td>
                <td><?= h($refundRequests->invoice_id) ?></td>
                <td><?= h($refundRequests->invoice_item_id) ?></td>
                <td><?= h($refundRequests->item_id) ?></td>
                <td><?= h($refundRequests->refund_amount) ?></td>
                <td><?= h($refundRequests->user_id) ?></td>
                <td><?= h($refundRequests->request_by) ?></td>
                <td><?= h($refundRequests->request_date) ?></td>
                <td><?= h($refundRequests->approved_by) ?></td>
                <td><?= h($refundRequests->approved_date) ?></td>
                <td><?= h($refundRequests->account_by) ?></td>
                <td><?= h($refundRequests->account_date) ?></td>
                <td><?= h($refundRequests->account_note) ?></td>
                <td><?= h($refundRequests->deny_note) ?></td>
                <td><?= h($refundRequests->create_date) ?></td>
                <td><?= h($refundRequests->created_by) ?></td>
                <td><?= h($refundRequests->status) ?></td>
                <td><?= h($refundRequests->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'RefundRequests', 'action' => 'view', $refundRequests->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'RefundRequests', 'action' => 'edit', $refundRequests->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'RefundRequests', 'action' => 'delete', $refundRequests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refundRequests->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
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
    <?php if (!empty($item->user_coupons)): ?>
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
            <?php foreach ($item->user_coupons as $userCoupons): ?>
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
