
<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card1">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Comments'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                      <?=$this->element('search');?>
                    <div class="card-block">
                        
    <div class="tables" >
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>Post</th>
                <th>Date</th>                                    
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Rating</th>
                <th>Website</th>
                
                <th>Status</th>
     
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody id="myTable">
        <?php foreach ($comment as $category): 
		if($category->status==1)
		{
			$a="Active";
		}
		else
		{
			$a="Inactive";
		}
		
		
		?>
            <tr>
                
                
                <td><?= $category->post->title ?></td>
				<td><?= h($category->comment_date) ?></td>
		
				<td><?= h($category->name) ?></td>
				<td><?= h($category->email) ?></td>
				<td><?= h($category->subject) ?></td>
				<td><?= h($category->message) ?></td>
				<td><?= h($category->rating) ?></td>
				<td><?= h($category->website) ?></td>
                <td><?= $a ?></td>
  
               
                    <td class="actions">

                  
                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $category->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Status') . '</span>', ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to In Active this Category ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Status')]) ?>
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