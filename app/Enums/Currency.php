<?php

namespace App\Enums;

enum Currency: string
{
  case AMD = 'amd';
  case EUR = 'eur';
  case USD = 'usd';
  case RUB = 'rur';

  public static function all(): array
  {
    return [
      self::AMD->value => '֏',
      self::EUR->value => '€',
      self::USD->value => '$',
      self::RUB->value => '₽',
    ];
  }
  
  public function symbol(): string
  {
    return self::all()[$this->value] ?? '';
  }
}