<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subcontractor Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $speciality
 * @property string $business
 * @property string $phone_no
 * @property string|null $street
 * @property string|null $city
 * @property string|null $state
 * @property string|null $postcode
 * @property string|null $notes
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Project[] $projects
 */
class Subcontractor extends Entity
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
        'user_id' => true,
        'first_name' => true,
        'last_name' => true,
        'speciality' => true,
        'business' => true,
        'phone_no' => true,
        'street' => true,
        'city' => true,
        'state' => true,
        'postcode' => true,
        'notes' => true,
        'user' => true,
        'projects' => true,
    ];

    //get the full name of a users
    protected function _getFullName()
    {
        return $this->first_name . '  ' . $this->last_name;
    }
    public function getPhoneNum(){
        return $this->phone_no;
    }
}
