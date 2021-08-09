<?php

namespace Library;

class SubtractionCulc
{

    /** @var string */
    protected $b;

    /** @var string */
    protected $a;

    public function __construct(string $a, string $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function calculation(): string
    {
        $c = 0;
        $result = '';

        if ($this->compare()) {
            $result = '-';
            [$this->a, $this->b] = [$this->b, $this->a];
        }

        for ($i = strlen($this->a) - 1; $i >= 0; $i--) {
            $c = $c + (int) $this->a[$i] - (int) $this->b[$i] + 10;
            $result .= $c % 10;
            $c < 10 ? $c = -1 : $c = 0;
        }

        return $result;
    }

    private function compare(): bool
    {
        $result = false;
        $lengthA = strlen($this->a);
        $lengthB = strlen($this->b);

        if ($lengthA < $lengthB) {
            $result = true;
        } elseif ($lengthA == $lengthB) {
            for ($i = 0; $i < $lengthA; $i++) {
                if ((int) $this->a[$i] > (int) $this->b[$i]) {
                    break;
                } elseif ((int) $this->a[$i] < (int) $this->b[$i]) {
                    $result = true;
                    break;
                }
            }
        }

        return $result;
    }

    static function test()
    {
        echo (new SubtractionCulc('9', '99'))->calculation();
    }
}
