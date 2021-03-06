<?php
namespace YummyDemo\Model\Entity;

use Cake\ORM\Entity;

/**
 * Team Entity
 *
 * @property bool $id
 * @property int $division_id
 * @property string $name
 * @property string $abbreviation
 *
 * @property \YummyDemo\Model\Entity\Division $division
 */
class Team extends Entity
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
