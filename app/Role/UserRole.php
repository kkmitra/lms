<?php

namespace App\Role;

/***
 * Class UserRole
 * @package App\Role
 */
class UserRole
{

  const ROLE_ADMIN = 'ROLE_ADMIN';
  const ROLE_MANAGEMENT = 'ROLE_MANAGEMENT';
  const ROLE_CUSTOMER = 'ROLE_CUSTOMER';

  /**
   * @var array
   */
  protected static $roleHierarchy = [
    self::ROLE_ADMIN => ['*'],
    self::ROLE_MANAGEMENT => [
      self::ROLE_CUSTOMER,
    ],
    self::ROLE_CUSTOMER => []
  ];

  /**
   * @param string $role
   * @return array
   */
  public static function getAllowedRoles(string $role)
  {
    if (isset(self::$roleHierarchy[$role])) {
      return self::$roleHierarchy[$role];
    }

    return [];
  }

  /***
   * @return array
   */
  public static function getRoleList()
  {
    return [
      static::ROLE_ADMIN => 'Admin',
      static::ROLE_MANAGEMENT => 'Management',
      static::ROLE_CUSTOMER => 'User',
    ];
  }

  public static function getRoleName($role) {
    return UserRole::getRoleList()[$role];
  }
}
