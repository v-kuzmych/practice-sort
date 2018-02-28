<?php

namespace liw;

class Vertical_sort extends Horisontal_sort
{
    public $name = "Vertical";

    public function sort2($arr)
    {
        $var = 0;
        $i = 0;

        while ($var < $this->columns) {
            for ($j = $var; $j < $this->length; $j += $this->columns) {
                $stack[$j] = $arr[$i];
                $i++;
            }
            $var++;
        }
        return $stack;
    }

    public function output()
    {
        $title = "Вертикальний порядок";

        $sort_arr = $this->twodim_arr($this->sort2($this->sort1($this->arr)));
        $this->result($sort_arr, $this->name, $title);
    }

}