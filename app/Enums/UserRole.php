<?php

namespace App\Enums;

enum UserRole: string
{
  case GUEST = 'guest';
  case ADMIN = 'admin';

  public static function all(): array
  {
    return [
      self::GUEST->value,
      self::ADMIN->value,
    ];
  }
}