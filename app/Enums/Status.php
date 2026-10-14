<?php

namespace App\Enums;

enum Status: string
{
  case DRAFT = 'draft';
  case ACTIVE = 'active';
  case CLOSE = 'close';

  public static function all(): array{
    return [
      self::DRAFT->value,
      self::ACTIVE->value,
      self::CLOSE->value,
    ];
  }
}
