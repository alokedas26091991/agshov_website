<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Posts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Post'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="posts view content">
            <h3><?= h($post->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $post->has('user') ? $this->Html->link($post->user->id, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($post->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Owner') ?></th>
                    <td><?= $post->owner === null ? '' : $this->Number->format($post->owner) ?></td>
                </tr>
                <tr>
                    <th><?= __('Post Date') ?></th>
                    <td><?= h($post->post_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($post->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($post->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Post Type') ?></th>
                    <td><?= $post->post_type ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Popular') ?></th>
                    <td><?= $post->is_popular ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $post->status ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $post->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Title') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($post->title)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Category') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($post->category)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Tag') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($post->tag)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Details') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($post->details)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Slug') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($post->slug)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Banner Photo') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($post->banner_photo)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Archive') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($post->archive)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Meta Title') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($post->meta_title)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Meta Keywords') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($post->meta_keywords)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Robots') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($post->robots)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Canonical') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($post->canonical)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Meta Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($post->meta_description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Comments') ?></h4>
                <?php if (!empty($post->comments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Post Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Subject') ?></th>
                            <th><?= __('Message') ?></th>
                            <th><?= __('Rating') ?></th>
                            <th><?= __('Website') ?></th>
                            <th><?= __('Comment Date') ?></th>
                            <th><?= __('Admin Reply') ?></th>
                            <th><?= __('Admin Reply Date') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($post->comments as $comments) : ?>
                        <tr>
                            <td><?= h($comments->id) ?></td>
                            <td><?= h($comments->post_id) ?></td>
                            <td><?= h($comments->user_id) ?></td>
                            <td><?= h($comments->slug) ?></td>
                            <td><?= h($comments->name) ?></td>
                            <td><?= h($comments->email) ?></td>
                            <td><?= h($comments->subject) ?></td>
                            <td><?= h($comments->message) ?></td>
                            <td><?= h($comments->rating) ?></td>
                            <td><?= h($comments->website) ?></td>
                            <td><?= h($comments->comment_date) ?></td>
                            <td><?= h($comments->admin_reply) ?></td>
                            <td><?= h($comments->admin_reply_date) ?></td>
                            <td><?= h($comments->status) ?></td>
                            <td><?= h($comments->created_at) ?></td>
                            <td><?= h($comments->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>
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
