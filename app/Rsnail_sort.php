<?php

namespace liw;

class Rsnail_sort extends Snail_sort
{
    public $name = "Rsnail";

    public function my_rsort($arr)
    {
        for ($i = $this->length - 1; $i >= 0; $i--) {
            for ($j = $this->length - 1; $j >= 0; $j--) {
                if ($arr[$j] > $arr[$j - 1] && (($j - 1) >= 0)) {
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j - 1];
                    $arr[$j - 1] = $tmp;
                }
            }
        }
        return $arr;
    }

    public function output()
    {
        $title = "Зворотній равлик";

        $sort_arr = $this->sort3($this->my_rsort($this->arr));
        $this->result($sort_arr, $this->name, $title);
    }

}