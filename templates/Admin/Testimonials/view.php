<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Testimonial $testimonial
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Testimonial'), ['action' => 'edit', $testimonial->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Testimonial'), ['action' => 'delete', $testimonial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testimonial->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Testimonials'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Testimonial'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="testimonials view content">
            <h3><?= h($testimonial->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Rating') ?></th>
                    <td><?= h($testimonial->rating) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($testimonial->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ord') ?></th>
                    <td><?= $this->Number->format($testimonial->ord) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($testimonial->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($testimonial->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $testimonial->status ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $testimonial->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($testimonial->name)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Position') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($testimonial->position)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Details') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($testimonial->details)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Image') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($testimonial->image)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
