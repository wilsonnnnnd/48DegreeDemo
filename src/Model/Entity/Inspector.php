<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inspector Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_no
 * @property string|null $street
 * @property string|null $city
 * @property string|null $state
 * @property string|null $postcode
 * @property string|null $notes
 *
 * @property \App\Model\Entity\Job[] $jobs
 */
class Inspector extends Entity
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
        'phone_no' => true,
        'street' => true,
        'city' => true,
        'state' => true,
        'postcode' => true,
        'notes' => true,
        'jobs' => true,
    ];

    //get the full name of a users
    protected function _getFullName()
    {
        return $this->first_name . '  ' . $this->last_name;
    }
    //get the phone number of a users
    public function _getPhoneNum(){
        return $this->phone_no;
    }

    //get the address of a users
    public function _getInsAddr(){
        return $this->street.", ".$this->city.", ".$this->state;
    }
}
