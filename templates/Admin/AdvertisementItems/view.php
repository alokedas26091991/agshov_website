<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Advertisement Item'), ['action' => 'edit', $advertisementItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Advertisement Item'), ['action' => 'delete', $advertisementItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $advertisementItem->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Advertisement Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Advertisement Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Advertisements'), ['controller' => 'Advertisements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Advertisement'), ['controller' => 'Advertisements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sub Categories'), ['controller' => 'SubCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sub Category'), ['controller' => 'SubCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="advertisementItems view col-lg-10 col-md-9 columns">
    <h2><?= h($advertisementItem->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Advertisement') ?></h6>
                    <p><?= $advertisementItem->has('advertisement') ? $this->Html->link($advertisementItem->advertisement->name, ['controller' => 'Advertisements', 'action' => 'view', $advertisementItem->advertisement->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Category') ?></h6>
                    <p><?= $advertisementItem->has('category') ? $this->Html->link($advertisementItem->category->name, ['controller' => 'Categories', 'action' => 'view', $advertisementItem->category->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Sub Category') ?></h6>
                    <p><?= $advertisementItem->has('sub_category') ? $this->Html->link($advertisementItem->sub_category->name, ['controller' => 'SubCategories', 'action' => 'view', $advertisementItem->sub_category->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Type') ?></h6>
                    <p><?= $advertisementItem->has('type') ? $this->Html->link($advertisementItem->type->name, ['controller' => 'Types', 'action' => 'view', $advertisementItem->type->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Brand') ?></h6>
                    <p><?= $advertisementItem->has('brand') ? $this->Html->link($advertisementItem->brand->name, ['controller' => 'Brands', 'action' => 'view', $advertisementItem->brand->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Product') ?></h6>
                    <p><?= $advertisementItem->has('product') ? $this->Html->link($advertisementItem->product->name, ['controller' => 'Products', 'action' => 'view', $advertisementItem->product->id]) : '' ?></p>
					
					
					
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($advertisementItem->id) ?></p>
                    <h6 class="subheader"><?= __('Is Active') ?></h6>
                    <p><?= $this->Number->format($advertisementItem->is_active) ?></p>
                    <h6 class="subheader"><?= __('Is Deleted') ?></h6>
                    <p><?= $this->Number->format($advertisementItem->is_deleted) ?></p>
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
