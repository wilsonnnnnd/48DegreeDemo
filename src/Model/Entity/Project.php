<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property int $property_id
 * @property int $subcontractor_id
 * @property date expected_completion_date
 * @property int $status
 * @property string|null $description
 * @property \App\Model\Entity\ServiceClient $service_client
 *
 * @property \App\Model\Entity\Property $property
 * @property \App\Model\Entity\Subcontractor $subcontractor
 */
class Project extends Entity
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
        'subcontractor_id' => true,
        'expected_completion_date' => true,
        'status' => true,
        'description' => true,
        'property' => true,
        'subcontractor' => true,
    ];


    //get the full name of an address
    protected function _getFullPro()
    {
        return "Address: " . $this->property->street . ", " . $this->property->city . " Subcontractor: " . $this->subcontractor->business ;
    }
}
