<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card1">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Advertisement Item'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <?=$this->element('search');?>
                    <div class="card-block">
                        <div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('advertisement_id') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('sub_category_id') ?></th>
                <th><?= $this->Paginator->sort('type_id') ?></th>
                <th><?= $this->Paginator->sort('brand_id') ?></th>
                <th><?= $this->Paginator->sort('product_id') ?></th>
                <th><?= $this->Paginator->sort('Banner Image') ?></th>
                <th><?= $this->Paginator->sort('Product Image') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($advertisementItems as $advertisementItem): ?>
            <tr>
                <td><?= $this->Number->format($advertisementItem->id) ?></td>
                <td>
                    <?= $advertisementItem->has('advertisement') ? $this->Html->link($advertisementItem->advertisement->name, ['controller' => 'Advertisements', 'action' => 'view', $advertisementItem->advertisement->id]) : '' ?>
                </td>
            <td>
                    <?= $advertisementItem->has('category') ? $this->Html->link($advertisementItem->category->name, ['controller' => 'Categories', 'action' => 'view', $advertisementItem->category->id]) : '' ?>
                </td>
            <td>
                    <?= $advertisementItem->has('sub_category') ? $this->Html->link($advertisementItem->sub_category->name, ['controller' => 'SubCategories', 'action' => 'view', $advertisementItem->sub_category->id]) : '' ?>
                </td>
            <td>
                    <?= $advertisementItem->has('type') ? $this->Html->link($advertisementItem->type->name, ['controller' => 'Types', 'action' => 'view', $advertisementItem->type->id]) : '' ?>
                </td>
            <td>
                    <?= $advertisementItem->has('brand') ? $this->Html->link($advertisementItem->brand->name, ['controller' => 'Brands', 'action' => 'view', $advertisementItem->brand->id]) : '' ?>
                </td>
            <td>
                    <?= $advertisementItem->has('product') ? $this->Html->link($advertisementItem->product->name, ['controller' => 'Products', 'action' => 'view', $advertisementItem->product->id]) : '' ?>
                </td>
               <td>
                    <?php
                    if($advertisementItem->advertisement->photo)
                    {?>
                <a href="/upload/homepageimage/<?=$advertisementItem->advertisement->photo?>" target="_blank"><img src="/upload/homepageimage/<?=$advertisementItem->advertisement->photo?>" height="100" width="100"/></a>
                <?php
                    }
                    else
                    {
                        echo "No Image";
                    }
                ?>
                </td>
                <td>
                    <?php
                    if($advertisementItem->has('product'))
                    {?>
                <a href="/upload/product/<?=$advertisementItem->product->photo?>" target="_blank"><img src="/upload/product/<?=$advertisementItem->product->photo?>" height="200" width="100"/></a>
                <?php
                    }
                    else
                    {
                        echo "No Image";
                    }
                ?>
                </td>
                <td class="actions">
                   
                   <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $advertisementItem->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $advertisementItem->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
	 <nav aria-label="Page navigation mb-3">
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div></nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>								   

</div>
</div>