<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cart Item Originals'), ['controller' => 'CartItemOriginals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart Item Original'), ['controller' => 'CartItemOriginals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cart Items'), ['controller' => 'CartItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart Item'), ['controller' => 'CartItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offline Cart Items'), ['controller' => 'OfflineCartItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offline Cart Item'), ['controller' => 'OfflineCartItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Images'), ['controller' => 'ProductImages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Image'), ['controller' => 'ProductImages', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="products view col-lg-10 col-md-9 columns">
    <h2><?= h($product->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('User') ?></h6>
                    <p><?= $product->has('user') ? $this->Html->link($product->user->id, ['controller' => 'Users', 'action' => 'view', $product->user->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($product->name) ?></p>
                    <h6 class="subheader"><?= __('Slug') ?></h6>
                    <p><?= h($product->slug) ?></p>
                    <h6 class="subheader"><?= __('Category') ?></h6>
                    <p><?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Photo') ?></h6>
                    <p><?= h($product->photo) ?></p>
                    <h6 class="subheader"><?= __('Display Image') ?></h6>
                    <p><?= h($product->display_image) ?></p>
                    <h6 class="subheader"><?= __('Meta Title') ?></h6>
                    <p><?= h($product->meta_title) ?></p>
                    <h6 class="subheader"><?= __('Meta Keywords') ?></h6>
                    <p><?= h($product->meta_keywords) ?></p>
                    <h6 class="subheader"><?= __('Robots') ?></h6>
                    <p><?= h($product->robots) ?></p>
                    <h6 class="subheader"><?= __('Canonical') ?></h6>
                    <p><?= h($product->canonical) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($product->id) ?></p>
                    <h6 class="subheader"><?= __('Item Id') ?></h6>
                    <p><?= $this->Number->format($product->item_id) ?></p>
                    <h6 class="subheader"><?= __('Sale Tag') ?></h6>
                    <p><?= $this->Number->format($product->sale_tag) ?></p>
                    <h6 class="subheader"><?= __('Actual Price') ?></h6>
                    <p><?= $this->Number->format($product->actual_price) ?></p>
                    <h6 class="subheader"><?= __('Offer Price') ?></h6>
                    <p><?= $this->Number->format($product->offer_price) ?></p>
                    <h6 class="subheader"><?= __('Rank') ?></h6>
                    <p><?= $this->Number->format($product->rank) ?></p>
                    <h6 class="subheader"><?= __('Status') ?></h6>
                    <p><?= $this->Number->format($product->status) ?></p>
                    <h6 class="subheader"><?= __('Created By') ?></h6>
                    <p><?= $this->Number->format($product->created_by) ?></p>
                    <h6 class="subheader"><?= __('Last Updated By') ?></h6>
                    <p><?= $this->Number->format($product->last_updated_by) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
				<div class="table-responsive">
        <table class="table">
                   
					<tr>
                   <th><?= __('Open Date') ?></th>
                    <td>  <p><?= h($product->open_date) ?></p></td>
					</tr>
                   
					<tr>
                   <th><?= __('Create Date') ?></th>
                    <td>  <p><?= h($product->create_date) ?></p></td>
					</tr>
                   
					<tr>
                   <th><?= __('Last Update Date') ?></th>
                    <td>  <p><?= h($product->last_update_date) ?></p></td>
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
                   <th><?= __('Is Featured') ?></th>
                    <td>  <p><?= $product->is_featured ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Is Active') ?></th>
                    <td>  <p><?= $product->is_active ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Not For Sale') ?></th>
                    <td>  <p><?= $product->not_for_sale ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Is Deleted') ?></th>
                    <td>  <p><?= $product->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
                   <th><?= __('Search Keyword') ?></th>
                    <td><?= $this->Text->autoParagraph(h($product->search_keyword)); ?></td>
					</tr>
										 <tr>
                   <th><?= __('Introduction') ?></th>
                    <td><?= $this->Text->autoParagraph(h($product->introduction)); ?></td>
					</tr>
										 <tr>
                   <th><?= __('Objective') ?></th>
                    <td><?= $this->Text->autoParagraph(h($product->objective)); ?></td>
					</tr>
										 <tr>
                   <th><?= __('Benefits') ?></th>
                    <td><?= $this->Text->autoParagraph(h($product->benefits)); ?></td>
					</tr>
										 <tr>
                   <th><?= __('Content Topic Summary') ?></th>
                    <td><?= $this->Text->autoParagraph(h($product->content_topic_summary)); ?></td>
					</tr>
										 <tr>
                   <th><?= __('Summary') ?></th>
                    <td><?= $this->Text->autoParagraph(h($product->summary)); ?></td>
					</tr>
										 <tr>
                   <th><?= __('Meta Desc') ?></th>
                    <td><?= $this->Text->autoParagraph(h($product->meta_desc)); ?></td>
					</tr>
					</table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Items') ?></h4>
    <?php if (!empty($product->items)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Seller Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Name In English') ?></th>
                <th><?= __('Actual Price') ?></th>
                <th><?= __('Offer Price') ?></th>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->items as $items): ?>
            <tr>
                <td><?= h($items->id) ?></td>
                <td><?= h($items->type) ?></td>
                <td><?= h($items->seller_id) ?></td>
                <td><?= h($items->name) ?></td>
                <td><?= h($items->name_in_english) ?></td>
                <td><?= h($items->actual_price) ?></td>
                <td><?= h($items->offer_price) ?></td>
                <td><?= h($items->product_id) ?></td>
                <td><?= h($items->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'Items', 'action' => 'view', $items->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Items', 'action' => 'edit', $items->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
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
    <?php if (!empty($product->cart_item_originals)): ?>
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
            <?php foreach ($product->cart_item_originals as $cartItemOriginals): ?>
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
    <?php if (!empty($product->cart_items)): ?>
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
            <?php foreach ($product->cart_items as $cartItems): ?>
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
    <h4 class="subheader"><?= __('Related OfflineCartItems') ?></h4>
    <?php if (!empty($product->offline_cart_items)): ?>
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
            <?php foreach ($product->offline_cart_items as $offlineCartItems): ?>
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
    <h4 class="subheader"><?= __('Related ProductImages') ?></h4>
    <?php if (!empty($product->product_images)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Image') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->product_images as $productImages): ?>
            <tr>
                <td><?= h($productImages->id) ?></td>
                <td><?= h($productImages->product_id) ?></td>
                <td><?= h($productImages->image) ?></td>
                <td><?= h($productImages->is_active) ?></td>
                <td><?= h($productImages->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'ProductImages', 'action' => 'view', $productImages->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'ProductImages', 'action' => 'edit', $productImages->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'ProductImages', 'action' => 'delete', $productImages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productImages->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
