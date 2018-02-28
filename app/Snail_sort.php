<?php

namespace liw;

class Snail_sort extends Horisontal_sort
{
    public $name = "Snail";

    public function sort3($arr)
    {
        $k = 0;
        $q = 0;
        $array3 = array('');

        while ($q != $this->length) {

            for ($i = $k; $i < $this->columns - 1 - $k; $i++) {
                if (empty($array3[$k][$i])) {
                    $array3[$k][$i] = $arr[$q];
                    $q++;
                }
            }

            for ($i = $k; $i < $this->rows - 1 - $k; $i++) {
                if (empty($array3[$i][$this->columns - 1 - $k])) {
                    $array3[$i][$this->columns - 1 - $k] = $arr[$q];
                    $q++;
                }
            }

            for ($i = $this->columns - 1 - $k; $i > 0; $i--) {
                if (empty($array3[$this->rows - 1 - $k][$i])) {
                    $array3[$this->rows - 1 - $k][$i] = $arr[$q];
                    $q++;
                }
            }

            for ($i = $this->rows - 1 - $k; $i > 0; $i--) {
                if (empty($array3[$i][$k])) {
                    $array3[$i][$k] = $arr[$q];
                    $q++;
                }
            }

            $k++;
        }
        return $array3;
    }

    public function output()
    {
        $title = "Равлик";

        $sort_arr = $this->sort3($this->sort1($this->arr));
        $this->result($sort_arr, $this->name, $title);
    }

}