<?php
/**
 * Created by PhpStorm.
 * User: wouter
 * Date: 4-4-17
 * Time: 16:53
 */

namespace FrozenAuth\Model;


class UserStatusTypes
{

    const STATUS_ACTIVE = 1;
    const STATUS_RETIRED = 2;

    public static function getStatusList()
    {
        //TODO: translate
        return array(
          self::STATUS_ACTIVE => 'Active',
          self::STATUS_RETIRED => 'Retired'
        );
    }

}