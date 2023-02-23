<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Enquiry Entity
 *
 * @property int $id
 * @property string $full_name
 * @property string $email
 * @property string $subject
 * @property string $body
 * @property bool $email_sent
 * @property \Cake\I18n\FrozenTime $created
 */
class Enquiry extends Entity
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
        'full_name' => true,
        'email' => true,
        'subject' => true,
        'body' => true,
        'email_sent' => true,
        'created' => true,
    ];
}
