<style>
	.btn.btn-success {
    margin-bottom: 0px;
    margin-left: 10px;
}
.samegroup .btn {
    padding: 10px 20px;
    border-radius: 5px; 
    font-size: 16px; 
}

</style>
<?php $placeholder1=isset($placeholder)?implode(',',$placeholder):'';?>
<div align="left"><?= $this->Form->create([],['class'=>'form-horizontal ryta','type' => 'get']); ?>		

			<div class="col-sm-6" style="margin:12px;padding-left:0px!important;">
			    <div class="samegroup d-flex align-items-center">
			<?php 
			            echo $this->Form->input('search',['class'=>'form-control','placeholder'=>$placeholder1,'empty' => true,'label' => false,'div'=>false]);
			?>
			 
    <?= $this->Form->button(__('Search'), ['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('Clear'), ['action' => 'index'], ['class' => 'btn btn-success ml-2']) ?>
    
</div>

    <?= $this->Form->end() ?></div>
	