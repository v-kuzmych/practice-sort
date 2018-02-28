<?php

namespace liw;

use mysqli;

abstract class Process
{
    public $arr;
    public $length;
    public $columns;
    public $rows;

    public function __construct($arr, $columns, $rows)
    {
        $this->arr = $arr;
        $this->length = count($arr);
        $this->columns = $columns;
        $this->rows = $rows;
    }

    //перетворення одновимірного масиву у двовимірний
    public function twodim_arr($arr)
    {
        $count = 0;
        for ($i = 0; $i < $this->rows; $i++) {
            for ($j = 0; $j < $this->columns; $j++) {
                $arr2[$i][$j] = $arr[$count];
                $count++;
            }
        }
        return $arr2;
    }

    //вивід масиву у вигляді таблиці
    public function make_table($arr, $title)
    { ?>
        <div class="box">
            <div class="box-header">
                <div class="box-title">
                    <small><?php echo $title ?></small>
                </div>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped"
                ">

                <?php
                for ($i = 0; $i < $this->rows; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < $this->columns; $j++) {
                        echo "<td>" . $arr[$i][$j] . "</td>";
                    }
                    echo "</tr>";
                }
                ?>

                </table>
            </div>
        </div>
    <?php }

    public function save_to_file($num, $name)
    {
        $file = fopen('sort.txt', 'a');
        $str = "\n---------------\n" . $name . "\n";
        fputs($file, $str);
        for ($i = 0; $i < count($num); $i++) {
            $text = $num[$i][0];
            for ($j = 1; $j < count($num[$i]); $j++) {
                $text .= "\t" . $num[$i][$j];
            }
            $text .= "\n";
            fputs($file, $text);
        }
        fclose($file);
    }

    public function save_to_db($arr, $type)
    {
        $host = 'localhost';
        $database = 'sortdb';
        $user = 'vasilisa';
        $password = 'ubuntu';

        $mysqli = new mysqli("$host", "$user", "$password", "$database");

        if ($mysqli->connect_errno) {
            echo "Не вдалося підключитися до MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        } else {
            $stmt = $mysqli->prepare("INSERT INTO sort_history(type, array) VALUES (?, ?)");

            $my_arr = json_encode($arr);

            if (!$stmt->bind_param("ss", $type, $my_arr)) {
                echo "Не вдалося прив'язати параметри: (" . $stmt->errno . ") " . $stmt->error;
            }

            if (!$stmt->execute()) {
                echo "Не вдалося виконати запит: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->close();
        }
    }

    public function result($arr, $name, $title)
    {
        $this->make_table($arr, $title);
        $this->save_to_file($arr, $name);
        $this->save_to_db($arr, $name);
    }
}