<?php

namespace liw;

class Horisontal_sort extends Process
{
    public $name = "Horisontal";

    public function sort1($arr)
    {
        $x = 0;
        for ($i = 1; $i < $this->length; $i++) {
            for ($j = $this->length - 1; $j >= $i; $j--) {
                if ($arr[$j] < $arr[$j - 1]) {
                    $tmp = $arr[$j - 1];
                    $arr[$j - 1] = $arr[$j];
                    $arr[$j] = $tmp;
                }
            }
            $x++;
        }
        return $arr;
    }

    public function output()
    {
        $title = "Горизонтальний порядок";

        $sort_arr = $this->twodim_arr($this->sort1($this->arr));
        $this->result($sort_arr, $this->name, $title);
    }

}

    
