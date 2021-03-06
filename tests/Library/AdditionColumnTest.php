<?php

use Library\AdditionColumn;
use PHPUnit\Framework\TestCase;

/**
 * Class AdditionColumnTest
 */
class AdditionColumnTest extends TestCase
{
  public function testFindEmptyArray()
  {
      $findSubArrayInArray = new AdditionColumn('9309845798134759817239857982347598013689173498538989737598236487561398746587136587136458713645871634875613849756189273456182937451', '20');;
      $this->assertEquals($findSubArrayInArray->calculation(), '9309845798134759817239857982347598013689173498538989737598236487561398746587136587136458713645871634875613849756189273456182937471');
  }
}