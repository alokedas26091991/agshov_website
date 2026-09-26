<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Coupon'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('coupon_code') ?></th>
                <th><?= $this->Paginator->sort('coupon_type') ?></th>
                <th><?= $this->Paginator->sort('discount_type') ?></th>
                <th><?= $this->Paginator->sort('discount_value') ?></th>

                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('expire_date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($coupons as $coupon): ?>
            <tr>
                <td><?= $this->Number->format($coupon->id) ?></td>
                <td><?= h($coupon->coupon_code) ?></td>
                    <td><?php if($coupon->coupon_type==1)
                    {
                        echo "Category";
                    }
                    else if($coupon->coupon_type==2)
                    {
                        echo "Sub Category";
                    }
                    else if($coupon->coupon_type==3)
                    {
                        echo "Type";
                    }
                  
                    else
                    {
                        echo "Product";
                    }
                    ?></td>
                    <td>
                    <?php if($coupon->discount_type=="p")
                    {
                        echo "Percentage";
                    }
                    else
                    {
                        echo "Flate";
                    }
                        ?>
                    </td>
                    <td><?= $this->Number->format($coupon->discount_value) ?></td>

                <td><?= h($coupon->start_date) ?></td>
                <td><?= h($coupon->expiry_date) ?></td>
                    <td class="actions">
                  
                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $coupon->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $coupon->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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