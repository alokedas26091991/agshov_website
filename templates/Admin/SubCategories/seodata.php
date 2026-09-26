<div class="col-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">SEODATA </h4>
			<p class="card-description"></p>
			<?= $this->Form->create($category, ['class' => 'form form-horizontal']) ?>
			<div class="form-group">
				<label for="metaTitle"><?= __('meta_title') ?></label>
				<?= $this->Form->input('meta_title', [
					'id' => 'metaTitle',
					'class' => 'form-control',
					'label' => false,
					'div' => false,
					'placeholder' => __('Enter meta title')
				]) ?>
			</div>
			<div class="form-group">
				<label for="metaKeywords"><?= __('meta_keywords') ?></label>
				<?= $this->Form->input('meta_keywords', [
					'id' => 'metaKeywords',
					'class' => 'form-control',
					'label' => false,
					'div' => false,
					'placeholder' => __('Enter meta keywords')
				]) ?>
			</div>
			<div class="form-group">
				<label for="metaDesc"><?= __('meta_desc') ?></label>
				<?= $this->Form->input('meta_desc', [
					'id' => 'metaDesc',
					'class' => 'form-control',
					'label' => false,
					'div' => false,
					'placeholder' => __('Enter meta description')
				]) ?>
			</div>
			<div class="form-group">
				<label for="robots"><?= __('robots') ?></label>
				<?= $this->Form->input('robots', [
					'id' => 'robots',
					'class' => 'form-control',
					'label' => false,
					'div' => false,
					'placeholder' => __('Enter robots value')
				]) ?>
			</div>
			<div class="form-group">
				<label for="canonical"><?= __('canonical') ?></label>
				<?= $this->Form->input('canonical', [
					'id' => 'canonical',
					'class' => 'form-control',
					'label' => false,
					'div' => false,
					'placeholder' => __('Enter canonical URL')
				]) ?>
			</div>
			<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary me-2']) ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>