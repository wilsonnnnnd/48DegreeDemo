<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Report Entity
 *
 * @property int $id
 * @property int $job_id
 * @property string|null $body
 * @property \App\Model\Entity\Property $property
 * @property \App\Model\Entity\Inspector $inspector
 * @property \App\Model\Entity\Job $job
 *
 */
class Report extends Entity
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
        'job_id' => true,
        'body' => true,
        'job' => true,
    ];

    //get the full name of an address
    protected function _getReportName()
    {

        return  "Address: ".$this->job->property->street.". Inspector: ".$this->job->inspector->first_name." ".$this->job->inspector->last_name;

    }
}


