<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Slider'), ['action' => 'edit', $slider->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Slider'), ['action' => 'delete', $slider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $slider->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Sliders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Slider'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="sliders view col-lg-10 col-md-9 columns">
    <h2><?= h($slider->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($slider->name) ?></p>
                    <h6 class="subheader"><?= __('Caption') ?></h6>
                    <p><?= h($slider->caption) ?></p>
                    <h6 class="subheader"><?= __('Txt Caption 1') ?></h6>
                    <p><?= h($slider->txt_caption_1) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($slider->id) ?></p>
                    <h6 class="subheader"><?= __('Txt Caption 2') ?></h6>
                    <p><?= $this->Number->format($slider->txt_caption_2) ?></p>
                    <h6 class="subheader"><?= __('Sort Order') ?></h6>
                    <p><?= $this->Number->format($slider->sort_order) ?></p>
                    <h6 class="subheader"><?= __('Created By') ?></h6>
                    <p><?= $this->Number->format($slider->created_by) ?></p>
                    <h6 class="subheader"><?= __('Is Deleted') ?></h6>
                    <p><?= $this->Number->format($slider->is_deleted) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
				<div class="table-responsive">
        <table class="table">
                   
					<tr>
                   <th><?= __('Valid From') ?></th>
                    <td>  <p><?= h($slider->valid_from) ?></p></td>
					</tr>
                   
					<tr>
                   <th><?= __('Valid To') ?></th>
                    <td>  <p><?= h($slider->valid_to) ?></p></td>
					</tr>
                   
					<tr>
                   <th><?= __('Create Date') ?></th>
                    <td>  <p><?= h($slider->create_date) ?></p></td>
					</tr>
/table>
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
                   <th><?= __('Image Link') ?></th>
                    <td><?= $this->Text->autoParagraph(h($slider->image_link)); ?></td>
					</tr>
										 <tr>
                   <th><?= __('Cta Link') ?></th>
                    <td><?= $this->Text->autoParagraph(h($slider->cta_link)); ?></td>
					</tr>
					</table>
                </div>
            </div>
        </div>
    </div>

</div>
