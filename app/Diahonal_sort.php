<?php

namespace liw;

class Diahonal_sort extends Horisontal_sort
{
    public $name = "Diahonal";

    public function sort5($my_arr)
    {
        $i = 0;
        $N = 0; //к-сть неповних діагоналей
        $var = 1;
        $min = $this->columns - 1;
        $max = $this->rows - 1;
        $q = 0;
        $array5 = array('');

        if ($this->rows - $this->columns < 0) {
            $min = $this->rows - 1;
            $max = $this->columns - 1;
        }

        //перша частина
        while ($i < $min) {
            $N++;
            for ($j = 0; $j < $this->columns; $j++) {
                if ($i >= 0) {
                    $array5[$i][$j] = $my_arr[$q];
                    $q++;
                    $i--;
                } else {
                    $i = $var;
                    $var++;
                    break;
                }
            }
        }

        //повні діагоналі
        $temp1 = 0;
        $temp2 = 0;
        for ($k = $min; $k <= $max; $k++) {
            if ($min == $this->columns - 1) {
                $i = $min + $temp1;
                for ($j = 0; $j < $this->columns; $j++) {
                    $array5[$i][$j] = $my_arr[$q];
                    $q++;
                    $i--;
                }
            } else {
                $j = $temp2;
                for ($i = $min; $i >= 0; $i--) {
                    $array5[$i][$j] = $my_arr[$q];
                    $q++;
                    $j++;
                }
            }

            $temp1++;
            $temp2++;
        }

        //друга частина
        $temp = 0;
        for ($N; $N > 0; $N--) {
            $count = $min - $temp;
            $i = $this->rows - 1;
            for ($count; $count > 0; $count--) {
                $j = $this->columns - $count;
                $array5[$i][$j] = $my_arr[$q];
                $q++;
                $i--;
            }
            $temp++;
        }

        return $array5;
    }

    public function output()
    {
        $title = "Діагональ";

        $sort_arr = $this->sort5($this->sort1($this->arr));
        $this->result($sort_arr, $this->name,  $title);
    }

}