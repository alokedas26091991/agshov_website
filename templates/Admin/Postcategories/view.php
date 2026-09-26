<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Postcategory $postcategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Postcategory'), ['action' => 'edit', $postcategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Postcategory'), ['action' => 'delete', $postcategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $postcategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Postcategories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Postcategory'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="postcategories view content">
            <h3><?= h($postcategory->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Parent Postcategory') ?></th>
                    <td><?= $postcategory->has('parent_postcategory') ? $this->Html->link($postcategory->parent_postcategory->name, ['controller' => 'Postcategories', 'action' => 'view', $postcategory->parent_postcategory->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($postcategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($postcategory->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($postcategory->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $postcategory->status ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $postcategory->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($postcategory->name)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Details') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($postcategory->details)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Banner Photo') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($postcategory->banner_photo)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Slug') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($postcategory->slug)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Postcategories') ?></h4>
                <?php if (!empty($postcategory->child_postcategories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Parent Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Details') ?></th>
                            <th><?= __('Banner Photo') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($postcategory->child_postcategories as $childPostcategories) : ?>
                        <tr>
                            <td><?= h($childPostcategories->id) ?></td>
                            <td><?= h($childPostcategories->parent_id) ?></td>
                            <td><?= h($childPostcategories->name) ?></td>
                            <td><?= h($childPostcategories->details) ?></td>
                            <td><?= h($childPostcategories->banner_photo) ?></td>
                            <td><?= h($childPostcategories->slug) ?></td>
                            <td><?= h($childPostcategories->status) ?></td>
                            <td><?= h($childPostcategories->is_deleted) ?></td>
                            <td><?= h($childPostcategories->created_at) ?></td>
                            <td><?= h($childPostcategories->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Postcategories', 'action' => 'view', $childPostcategories->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Postcategories', 'action' => 'edit', $childPostcategories->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Postcategories', 'action' => 'delete', $childPostcategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childPostcategories->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
