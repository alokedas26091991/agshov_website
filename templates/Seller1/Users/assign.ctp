<style>
.btn {
    cursor: pointer;
    /* margin: 10px; */
    border-radius: 0;
    text-decoration: none;
    padding: 17px 20px;
    font-size: 17px;
	color: #333;
}
.multiselect-clear-filter{
	background-color: #fff!important;
    border: 1px solid!important;
    font-size: 21px!important;
    color: #ccc!important;
    padding: 1px 2px!important;
}
.dropdown-menu{left:0px!important;}
.dropdown-menu>.active>a>label{
	color:#fff;
}

    .open>.dropdown-menu {
    display: block;
    max-height: 200px;
	overflow-y:scroll;
}</style>
<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
		<li><?= $this->Html->link(__('User Brunch'), ['action' => 'index']) ?></li>
		<li class="active"><?= __('Assign') ?></li>
		</ol>
		</div>
<div class="forms-main">
		<div class="graph-form">
		<div class="form-body">	
    <?= $this->Form->create($userBranch,['class'=>'form-horizontal']); ?>
   
    
			<div class="form-group">		
 <label for="focusedinput" class="col-sm-2 control-label">
			<?= __('Branch') ?></label>
			<div class="col-sm-8">
			<?php 
			
            echo $this->Form->input('branch_id[]', ['options' => $branches,'multiple','class'=>'form-control1 multiselect','id'=>'multiselect','default' => $userBranchIds,'label' => false,'div'=>false]);


			?>
			
	</div>
	</div>
				
			
			       	
   
    <div class="form-group">	       	
			<div class="col-sm-8 col-sm-offset-2">
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
				</div>
	</div>
    <?= $this->Form->end() ?>
</div>
</div>
</div>

<script>
var selectArr=<?php echo json_encode((array)$userBrunchIds);?>;</script>
<?=$this->Html->css(['/admin_template/bootstrap-multiselect-master/dist/css/bootstrap-multiselect'],['block' => 'scriptTop']);?>

	  <?=$this->Html->script(['/admin_template/bootstrap-multiselect-master/dist/js/bootstrap-multiselect','/admin_template/bootstrap-multiselect-master/select'],['block' => 'scriptBottom']);?>
	  