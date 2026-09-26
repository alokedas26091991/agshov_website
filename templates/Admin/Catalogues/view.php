<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Catalogue $catalogue
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Catalogue'), ['action' => 'edit', $catalogue->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Catalogue'), ['action' => 'delete', $catalogue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catalogue->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Catalogues'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Catalogue'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="catalogues view content">
            <h3><?= h($catalogue->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($catalogue->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($catalogue->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $catalogue->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Pdf Link') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($catalogue->pdf_link)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
