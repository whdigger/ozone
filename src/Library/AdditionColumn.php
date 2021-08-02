<?php

namespace Library;

class AdditionColumn {

  /**
   * @var string
   */
  protected $b;

  /**
   * @var string
   */
  protected $a;

  /**
   * @param string $a
   * @param string $b
   */
  public function __construct(string $a, string $b) {
    $this->a = $a;
    $this->b = $b;
  }

  /**
   * @return string
   */
  public function calculation(): string {
    $c = 0;
    $result = '';

    if(strlen($this->a) > strlen($this->b)) {
      $length = strlen($this->a);
      $this->b = str_pad($this->b, $length, '0', STR_PAD_LEFT);
    } else {
      $length = strlen($this->b);
      $this->a = str_pad($this->a, $length, '0', STR_PAD_LEFT);
    }

    for ($i = $length - 1; $i >= 0; $i--) {
      $sum = $c + (int) $this->a[$i] + (int) $this->b[$i];
      $result .= $sum % 10;
      $c = (int) ($sum / 10);
    }

    if ($c > 0) {
      $result[$length] = $c;
    }

    return strrev($result);
  }

  static function test(){
    echo (new AdditionColumn('9309845798134759817239857982347598013689173498538989737598236487561398746587136587136458713645871634875613849756189273456182937451', '20'))->calculation();
  }
}