<?php

use Library\SuffixArray;

chdir(dirname(__DIR__));
require_once 'vendor/autoload.php';

$fixtures = [
  [[1, 2, 3, 5, 7, 9, 11], []],
  [[1, 2, 3, 5, 7, 9, 11], [3, 5, 7]],
  [[1, 2, 3, 5, 7, 9, 11], [4, 5, 7]],
];

foreach ($fixtures as $fixture) {
  $findSubArrayInArray = new SuffixArray($fixture[0], $fixture[1]);
  echo 'Haystack [' . implode(',', $fixture[0]) . ']  Needle [' . implode(',', $fixture[1]) . '] - ' . var_export($findSubArrayInArray->isInclude(),true) . '<br>';
}
