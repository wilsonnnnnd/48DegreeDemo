<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $id
 * @property int $property_id
 * @property int $inspector_id
 * @property date $expected_completion_date
 * @property int $status
 * @property string|null $description
 * @property string $full_name
 * @property \App\Model\Entity\Property $property
 * @property \App\Model\Entity\Inspector $inspector
 * @property \App\Model\Entity\Report[] $reports
 */
class Job extends Entity
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
        'property_id' => true,
        'inspector_id' => true,
        'expected_completion_date' => true,
        'status' => true,
        'description' => true,
        'property' => true,
        'inspector' => true,
        'reports' => true,
    ];

    //get the full name of an address
    protected function _getFullName()
    {
        return "Address: " . $this->property->full_addr. ". Inspector: " . $this->inspector->full_name;
    }
}
