<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                   
                   
                </div>
                <div class="card-body">
                    <div class="card-block">
<div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'sellerpage'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
    <div class="tables" style="overflow:auto;">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('Photo') ?></th>
                <th><?= $this->Paginator->sort('Page Name') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
               
                <th><?= $this->Paginator->sort('Section') ?></th>
                 <th><?= $this->Paginator->sort('Link') ?></th>
                <th><?= $this->Paginator->sort('Order') ?></th>
                <th><?= $this->Paginator->sort('is_active') ?></th>
                <th class=""><?= __('Actions') ?></th>
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
                    <a href="../../upload/homepageimage/<?=$advertisement->photo?>" target="blank"><img src="../../upload/homepageimage/<?=$advertisement->photo?>" height="100" width="80"/></a>
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
                <td>
                    <?php
                    if($advertisement->page_name==1)
                    {
                        echo "About";
                    }
                    else if($advertisement->page_name==2)
                    {
                        echo "Contact Us";
                    }
                    else if($advertisement->page_name==3)
                    {
                        echo "Support";
                    }
                    else if($advertisement->page_name==4)
                    {
                        echo "Photo";
                    }
                    else if($advertisement->page_name==5)
                    {
                        echo "Video";
                    }
                    else if($advertisement->page_name==6)
                    {
                        echo "Client Feedback";
                    }
                    else if($advertisement->page_name==7)
                    {
                        echo "Marketing Materials";
                    }
                    else if($advertisement->page_name==8)
                    {
                        echo "Information";
                    }
                    else if($advertisement->page_name==9)
                    {
                        echo "Certificates";
                    }
                    else
                    {
                        echo "CSR";
                    }
                    ?>
                </td>
                <td><?= h($advertisement->name) ?></td>
                <td><?= html_entity_decode($advertisement->details) ?></td>
                

                    
                     <td><?=  $advertisement->section ?></td>
                     <td><?=  $advertisement->link ?></td>
                     <td><?=  $advertisement->ord ?></td>
                     <td><?=  $advertisement->is_active ? 'Active' : 'Inactive' ?></td>
                    <td class="actions">
                   
                    <?= $this->Html->link("Edit",['action' => 'sellerpageedit', $advertisement->id]) ?>
                  
                    <?= $this->Form->postLink("Delete", ['action' => 'delete', $advertisement->id], ['confirm' => __('Are you sure you want to delete ?')]) ?>
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