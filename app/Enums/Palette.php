<?php

namespace App\Enums;

enum Palette: string
{
  case MONOCHROME = 'monochrome';
  case MULTICOLOR = 'multicolor';

  public static function all(): array
  {
    return [
      self::MONOCHROME->value,
      self::MULTICOLOR->value,
    ];
  }
}