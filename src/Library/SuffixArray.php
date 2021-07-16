<?php

namespace Library;

class FindSubArrayInArray {

  private $haystack;

  private $needle;

  public function __construct(array $haystack, array $needle) {
    $this->haystack = $haystack;
    $this->needle = $needle;
  }

  public function isInclude():bool {
  }


public function quickSort($array, $order = 'ask')
  {
      $sortArray = $array;
      quickSortAlg($sortArray, 0, count($array) - 1, $order);
      return $sortArray;
  }

public function quickSortAlg(&$array, $left, $right, $order)
  {
      $i = $left;
      $j = $right;
      $mid = $array[(int)($left + $right) / 2];
      do {

          while ($order($array[$i], $mid)) {
              $i++;
          }

          while (!$order($array[$j], $mid) && $array[$j] != $mid) {
              $j--;
          }

          if ($i <= $j) {
              list($array[$i], $array[$j]) = array($array[$j], $array[$i]);
              $i++;
              $j--;
          }
      } while ($i <= $j);

      if ($i < $right) {
          quickSortAlg($array, $i, $right, $order);
      }

      if ($j > $left) {
          quickSortAlg($array, $left, $j, $order);
      }
  }

  function binarySearch(array $array, int $item, int $start, $end = null) : int
  {
          if ($end === null) {
                  $end = count($array) - 1;
          }

          if($start > $end) {
                  throw new LogicException("NotFound");
          }

          $halfIndex = (int) (($start + $end) / 2);

          if ($array[$halfIndex] !== $item) {
                  if($array[$halfIndex] < $item) {
                          $start = $halfIndex + 1;
                  } else {
                          $end = $halfIndex - 1;
                  }
                  return binarySearch($array, $item, $start, $end);
          }
          return $halfIndex;
  }

}