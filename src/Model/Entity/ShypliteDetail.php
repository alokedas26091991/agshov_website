<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShypliteDetail Entity
 *
 * @property int $id
 * @property int $invoice_item_id
 * @property int $type
 * @property string $shipment
 * @property string $carreierName
 * @property string $manifestID
 * @property string $awbNo
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\InvoiceItem $invoice_item
 */
class ShypliteDetail extends Entity
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
        '*' => true,
        'id' => false
    ];
}
