<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review $review
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Review'), ['action' => 'edit', $review->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Review'), ['action' => 'delete', $review->id], ['confirm' => __('Are you sure you want to delete # {0}?', $review->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reviews'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Review'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reviews view content">
            <h3><?= h($review->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $review->has('product') ? $this->Html->link($review->product->name, ['controller' => 'Products', 'action' => 'view', $review->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $review->has('user') ? $this->Html->link($review->user->id, ['controller' => 'Users', 'action' => 'view', $review->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($review->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seller Id') ?></th>
                    <td><?= $this->Number->format($review->seller_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt') ?></th>
                    <td><?= h($review->dt) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $review->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Slug') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($review->slug)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Rating') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($review->rating)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Comment') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($review->comment)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Review Images') ?></h4>
                <?php if (!empty($review->review_images)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Review Id') ?></th>
                            <th><?= __('Product Image') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($review->review_images as $reviewImages) : ?>
                        <tr>
                            <td><?= h($reviewImages->id) ?></td>
                            <td><?= h($reviewImages->review_id) ?></td>
                            <td><?= h($reviewImages->product_image) ?></td>
                            <td><?= h($reviewImages->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ReviewImages', 'action' => 'view', $reviewImages->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ReviewImages', 'action' => 'edit', $reviewImages->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ReviewImages', 'action' => 'delete', $reviewImages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reviewImages->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Review Like Dislikes') ?></h4>
                <?php if (!empty($review->review_like_dislikes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Review Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Seller Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Like Type') ?></th>
                            <th><?= __('Dt') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($review->review_like_dislikes as $reviewLikeDislikes) : ?>
                        <tr>
                            <td><?= h($reviewLikeDislikes->id) ?></td>
                            <td><?= h($reviewLikeDislikes->review_id) ?></td>
                            <td><?= h($reviewLikeDislikes->product_id) ?></td>
                            <td><?= h($reviewLikeDislikes->seller_id) ?></td>
                            <td><?= h($reviewLikeDislikes->user_id) ?></td>
                            <td><?= h($reviewLikeDislikes->like_type) ?></td>
                            <td><?= h($reviewLikeDislikes->dt) ?></td>
                            <td><?= h($reviewLikeDislikes->is_active) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ReviewLikeDislikes', 'action' => 'view', $reviewLikeDislikes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ReviewLikeDislikes', 'action' => 'edit', $reviewLikeDislikes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ReviewLikeDislikes', 'action' => 'delete', $reviewLikeDislikes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reviewLikeDislikes->id)]) ?>
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
