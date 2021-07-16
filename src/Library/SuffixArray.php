<?php

namespace Library;

/**
 * Class SuffixArray
 *
 * @package Library
 */
class SuffixArray
{
    /**
     * @var array
     */
    private $haystack;

    /**
     * @var array
     */
    private $needle;

    /**
     * SuffixArray constructor.
     *
     * @param array $haystack
     * @param array $needle
     */
    public function __construct(array $haystack, array $needle)
    {
        $this->haystack = $haystack;
        $this->needle = $needle;
    }

    /**
     * @return bool
     */
    public function isInclude(): bool
    {
        return $this->binSearchMlr(0, count($this->haystack) - 1, 0);
    }

    /**
     * @param int $left
     * @param int $right
     * @param int $mlr
     *
     * @return bool
     */
    private function binSearchMlr(int $left, int $right, int $mlr): bool
    {
        if ($left > $right) {
            return false;
        }
        $middle = (int)(($left + $right) / 2);
        $mlr += $this->min($this->lcp($mlr + $left, $mlr), $this->lcp($mlr + $right, $mlr));
        $res = $this->cmpPrefix($middle + $mlr, $mlr);
        if ($res == 0) {
            return true;
        } elseif ($res < 0) {
            return $this->binSearchMlr($left, $middle - 1, $mlr);
        } else {
            return $this->binSearchMlr($middle + 1, $right, $mlr);
        }
    }

    /**
     * @param $posHaystack
     * @param $posNeedle
     *
     * @return int
     * -1  - меньше
     * 0   - needle является  префиксом
     * 1   - больше
     */
    private function cmpPrefix($posHaystack, $posNeedle): int
    {
        $shared = $this->lcp($posHaystack, $posNeedle);
        if (($shared + $posNeedle) == count($this->needle)) {
            return 0;
        }

        return $this->needle[$shared + $posNeedle] <=> $this->haystack[$shared + $posHaystack];
    }

    /**
     * @param $posHaystack
     * @param $posNeedle
     *
     * @return int
     */
    private function lcp($posHaystack, $posNeedle): int
    {
        $ret = 0;
        while ($posNeedle < count($this->needle) &&
            $this->needle[$posNeedle++] == $this->haystack[$posHaystack++]) {
            ++$ret;
        }

        return $ret;
    }

    /**
     * @param int $left
     * @param int $right
     *
     * @return int
     */
    private function min(int $left, int $right): int
    {
        return ($left < $right ? $left : $right);
    }

}