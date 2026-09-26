<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servicecategory $servicecategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Servicecategory'), ['action' => 'edit', $servicecategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Servicecategory'), ['action' => 'delete', $servicecategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicecategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Servicecategories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Servicecategory'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="servicecategories view content">
            <h3><?= h($servicecategory->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($servicecategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($servicecategory->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($servicecategory->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $servicecategory->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $servicecategory->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($servicecategory->name)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Servicesubcategories') ?></h4>
                <?php if (!empty($servicecategory->servicesubcategories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Servicecategory Id') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($servicecategory->servicesubcategories as $servicesubcategories) : ?>
                        <tr>
                            <td><?= h($servicesubcategories->id) ?></td>
                            <td><?= h($servicesubcategories->name) ?></td>
                            <td><?= h($servicesubcategories->servicecategory_id) ?></td>
                            <td><?= h($servicesubcategories->is_active) ?></td>
                            <td><?= h($servicesubcategories->is_deleted) ?></td>
                            <td><?= h($servicesubcategories->created_at) ?></td>
                            <td><?= h($servicesubcategories->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Servicesubcategories', 'action' => 'view', $servicesubcategories->]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Servicesubcategories', 'action' => 'edit', $servicesubcategories->]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Servicesubcategories', 'action' => 'delete', $servicesubcategories->], ['confirm' => __('Are you sure you want to delete # {0}?', $servicesubcategories->)]) ?>
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
