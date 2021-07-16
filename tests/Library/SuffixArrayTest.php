<?php

use Library\SuffixArray;
use PHPUnit\Framework\TestCase;

/**
 * Class SuffixArrayTest
 */
class SuffixArrayTest extends TestCase
{
  public function testFindEmptyArray()
  {
      $findSubArrayInArray = new SuffixArray([1, 2, 3, 5, 7, 9, 11], []);
      $this->assertEquals($findSubArrayInArray->isInclude(), true);
  }
  public function testSimpleArray()
  {
      $findSubArrayInArray = new SuffixArray([1, 2, 3, 5, 7, 9, 11], [3, 5, 7]);
      $this->assertEquals($findSubArrayInArray->isInclude(), true);
  }
  public function testNotFindSubArray()
  {
      $findSubArrayInArray = new SuffixArray([1, 2, 3, 5, 7, 9, 11], [4, 5, 7]);
      $this->assertEquals($findSubArrayInArray->isInclude(), false);
  }
  public function testOneElementSubArray()
  {
      $findSubArrayInArray = new SuffixArray([1, 2, 3, 5, 7, 9, 11], [1]);
      $this->assertEquals($findSubArrayInArray->isInclude(), true);
  }
}