<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Property Entity
 *
 * @property int $id
 * @property int $client_id
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $postcode
 * @property string $description
 * @property string $full_addr
 * @property \Cake\I18n\FrozenTime $warranty_start
 * @property \Cake\I18n\FrozenTime $warranty_end
 *
 * @property \App\Model\Entity\ServiceClient $service_client
 * @property \App\Model\Entity\Job[] $jobs
 */
class Property extends Entity
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
        'client_id' => true,
        'street' => true,
        'city' => true,
        'state' => true,
        'postcode' => true,
        'description' => true,
        'warranty_start' => true,
        'warranty_end' => true,
        'service_client' => true,
        'jobs' => true,
    ];

    //get the full name of an address
    protected function _getFullAddr()
    {
        return $this->street . ', ' . $this->city . ', ' . $this->state;
    }
}
