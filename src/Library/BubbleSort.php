<?php
declare(strict_types=1);

namespace Library;


class BubbleSort
{
    /** @var string */
    protected $a;

    public function __construct(array $a) {
        $this->a = $a;
    }


    public function sort()
    {
        $size = count($this->a) - 1;
        for($i = $size; $i >= 0; $i--) {
            for ($j = 0; $j < $i; $j++) {
                if ($this->a[$j] > $this->a[$j + 1]) {
                    [$this->a[$j], $this->a[$j + 1]] = [$this->a[$j + 1], $this->a[$j]];
                }
            }
        }

        return $this->a;
    }

    static function test(){
        echo implode(',', (new BubbleSort([1,2,0,0,0,3,4,5,6,7,8,9,77,66,55,44,33,22,11]))->sort());
    }
}
