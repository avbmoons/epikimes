<?php

namespace App\Enums;

enum MailStatus: string
{
  case DRAFT = 'draft';
  case ACTIVE = 'active';
  case READ = 'read';
  case BLOCKED = 'close';

  public static function all(): array{
    return [
      self::DRAFT->value,
      self::ACTIVE->value,
      self::READ->value,
      self::BLOCKED->value,
    ];
  }
}
