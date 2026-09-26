<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card1">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Advertisement'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('Photo') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('end_date') ?></th>
                <th><?= $this->Paginator->sort('Section') ?></th>
                 <th><?= $this->Paginator->sort('Link') ?></th>
                <th><?= $this->Paginator->sort('Order') ?></th>
                <th><?= $this->Paginator->sort('is_active') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($advertisements as $advertisement): ?>
            <tr>
                <td><?= $this->Number->format($advertisement->id) ?></td>
                <td>
                    <?php
                    if($advertisement->photo)
                    {
                    ?>
                    <a href="../upload/homepageimage/<?=$advertisement->photo?>" target="blank"><img src="../upload/homepageimage/<?=$advertisement->photo?>" height="100" width="80"/></a>
                    <?php
                    }
                    else
                    {
                    ?>
                    No Image
                    <?php
                    }
                    ?>
                </td>
                <td><?= h($advertisement->name) ?></td>
                <td><?= html_entity_decode($advertisement->description) ?></td>
                <td><?= h($advertisement->start_date) ?></td>
                <td><?= h($advertisement->end_date) ?></td>

                    
                     <td><?=  $advertisement->section ?></td>
                     <td><?=  $advertisement->link ?></td>
                     <td><?=  $advertisement->ord ?></td>
                     <td><?=  $advertisement->is_active ? 'Active' : 'Inactive' ?></td>
                    <td class="actions">
                   
                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $advertisement->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $advertisement->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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