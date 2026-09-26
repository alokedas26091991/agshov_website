<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tag'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tags view content">
            <h3><?= h($tag->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $tag->has('user') ? $this->Html->link($tag->user->id, ['controller' => 'Users', 'action' => 'view', $tag->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tag->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($tag->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($tag->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $tag->status ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $tag->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($tag->name)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Slug') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($tag->slug)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Details') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($tag->details)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Course Coupons') ?></h4>
                <?php if (!empty($tag->course_coupons)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Coupon Id') ?></th>
                            <th><?= __('Course Id') ?></th>
                            <th><?= __('Course Subject Id') ?></th>
                            <th><?= __('Course Language Id') ?></th>
                            <th><?= __('Course Region Id') ?></th>
                            <th><?= __('Course Delivery Mode Id') ?></th>
                            <th><?= __('Course Author Id') ?></th>
                            <th><?= __('Tag Id') ?></th>
                            <th><?= __('Combo Id') ?></th>
                            <th><?= __('Webinar Id') ?></th>
                            <th><?= __('Workshop Id') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($tag->course_coupons as $courseCoupons) : ?>
                        <tr>
                            <td><?= h($courseCoupons->id) ?></td>
                            <td><?= h($courseCoupons->coupon_id) ?></td>
                            <td><?= h($courseCoupons->course_id) ?></td>
                            <td><?= h($courseCoupons->course_subject_id) ?></td>
                            <td><?= h($courseCoupons->course_language_id) ?></td>
                            <td><?= h($courseCoupons->course_region_id) ?></td>
                            <td><?= h($courseCoupons->course_delivery_mode_id) ?></td>
                            <td><?= h($courseCoupons->course_author_id) ?></td>
                            <td><?= h($courseCoupons->tag_id) ?></td>
                            <td><?= h($courseCoupons->combo_id) ?></td>
                            <td><?= h($courseCoupons->webinar_id) ?></td>
                            <td><?= h($courseCoupons->workshop_id) ?></td>
                            <td><?= h($courseCoupons->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CourseCoupons', 'action' => 'view', $courseCoupons->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CourseCoupons', 'action' => 'edit', $courseCoupons->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CourseCoupons', 'action' => 'delete', $courseCoupons->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courseCoupons->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Course Tags') ?></h4>
                <?php if (!empty($tag->course_tags)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Course Id') ?></th>
                            <th><?= __('Tag Id') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Last Update Date') ?></th>
                            <th><?= __('Last Updated By') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($tag->course_tags as $courseTags) : ?>
                        <tr>
                            <td><?= h($courseTags->id) ?></td>
                            <td><?= h($courseTags->course_id) ?></td>
                            <td><?= h($courseTags->tag_id) ?></td>
                            <td><?= h($courseTags->create_date) ?></td>
                            <td><?= h($courseTags->created_by) ?></td>
                            <td><?= h($courseTags->last_update_date) ?></td>
                            <td><?= h($courseTags->last_updated_by) ?></td>
                            <td><?= h($courseTags->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CourseTags', 'action' => 'view', $courseTags->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CourseTags', 'action' => 'edit', $courseTags->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CourseTags', 'action' => 'delete', $courseTags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courseTags->id)]) ?>
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
