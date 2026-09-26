<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Brandlogo $brandlogo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Brandlogo'), ['action' => 'edit', $brandlogo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Brandlogo'), ['action' => 'delete', $brandlogo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $brandlogo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Brandlogos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Brandlogo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="brandlogos view content">
            <h3><?= h($brandlogo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($brandlogo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $brandlogo->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $brandlogo->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Images') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($brandlogo->images)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
