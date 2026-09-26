<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Social Entity
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $phone_1
 * @property string|null $phone_2
 * @property string|null $email_1
 * @property string|null $email_2
 * @property string|null $address
 * @property string|null $fb
 * @property string|null $instra
 * @property string|null $youtube
 * @property string|null $twitter
 * @property string|null $linkdin
 * @property string|null $whatsapp
 * @property string|null $xzender
 * @property string|null $ticktok
 */
class Social extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'phone_1' => true,
        'phone_2' => true,
        'email_1' => true,
        'email_2' => true,
        'address' => true,
        'fb' => true,
        'instra' => true,
        'youtube' => true,
        'twitter' => true,
        'linkdin' => true,
        'whatsapp' => true,
        'xzender' => true,
        'ticktok' => true,
    ];
}
