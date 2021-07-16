<?php

use Library\FindSubArrayInArray;
use PHPUnit\Framework\TestCase;

class SuffixArray extends TestCase
{
  public function testFindEmptyArray()
  {
      $findSubArrayInArray = new FindSubArrayInArray([1, 2, 3, 5, 7, 9, 11], []);
      $this->assertEquals($findSubArrayInArray->isInclude(), true);
  }
  public function testSimpleArray()
  {
      $findSubArrayInArray = new FindSubArrayInArray([1, 2, 3, 5, 7, 9, 11], [3, 5, 7]);
      $this->assertEquals($findSubArrayInArray->isInclude(), true);
  }
  public function testNotFindSubArray()
  {
      $findSubArrayInArray = new FindSubArrayInArray([1, 2, 3, 5, 7, 9, 11], [4, 5, 7]);
      $this->assertEquals($findSubArrayInArray->isInclude(), false);
  }
}