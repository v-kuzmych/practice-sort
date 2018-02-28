<?php

namespace liw;

class Generator extends Process
{
    public $columns;
    public $rows;
    public $length;
    public $name = "Numbers";

    public function __construct($columns, $rows, $rules)
    {
        $this->rules = $rules;
        $this->length = $rows * $columns;
        $this->columns = $columns;
        $this->rows = $rows;
    }

    public function generate()
    {
        switch ($this->rules) {
            case 'random':
                $title = "Випадкові числа";
                $this->name .= " (random)";
                $num = $this->random_numbers();
                $my_arr = $this->twodim_arr($this->random_numbers());
                $this->result($my_arr, $this->name, $title);
                return $num;
                break;
            case 'simple':
                $title = "Прості числа";
                $this->name .= " (simple)";
                $num = $this->simple_numbers();
                $my_arr = $this->twodim_arr($this->simple_numbers());
                $this->result($my_arr, $this->name, $title);
                return $num;
                break;
            default:
                echo 'ERROR';
                break;
        }
    }

    public function random_numbers()
    {
        $y = array('');
        for ($i = 0; $i < $this->length; $i++) {
            $y[$i] = rand(1, $this->length);
        }

        for ($i = 0; $i < $this->length; $i++) {
            for ($j = 0; $j < $this->length; $j++) {
                if ($y[$i] == $y[$j] && $i != $j) {
                    $x = rand(1, 50);
                    $y[$i] += $x;

                    for ($k = 0; $k < $this->length; $k++) {
                        if ($y[$i] == $y[$k] && $i != $k) {
                            $var = rand(1, $this->length);
                            $y[$i] += $var;
                            $k = -1;
                        }
                    }
                }
            }
        }

        return $y;
    }

    public function simple_numbers()
    {
        $i = 0;

        while ($i != $this->length) {

            $y[$i] = rand(1, $this->length * 10);

            for ($q = 2; $q <= $y[$i]; $q++) {
                if ($y[$i] % $q == 0 && $y[$i] != $q) {
                    break;
                }
                if ($y[$i] == $q) {
                    for ($k = 0; $k < $this->length; $k++) {
                        if ($y[$i] == $y[$k] && $i != $k) {
                            break;
                        }
                        if ($k == $this->length - 1) {
                            $i++;
                        }
                    }
                }
            }
        }

        return $y;
    }
}