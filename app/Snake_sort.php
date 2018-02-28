<?php

namespace liw;

class Snake_sort extends Horisontal_sort
{
    public $name = "Snake";

    public function sort6($array6)
    {
        for ($i = 0; $i < count($array6); $i++) {
            if (($i + 1) % 2 == 0) {
                $k = count($array6[$i]) - 1;
                for ($j = 0; $j < count($array6[$i]); $j++) {
                    $temp[$i][$k] = $array6[$i][$j];
                    $k--;
                }
                for ($j = 0; $j < count($array6[$i]); $j++) {
                    $array6[$i][$j] = $temp[$i][$j];
                }
            }
        }
        return $array6;
    }

    public function output()
    {
        $title = "Змійка";

        $sort_arr = $this->sort6($this->twodim_arr($this->sort1($this->arr)));
        $this->result($sort_arr, $this->name, $title);
    }
}
