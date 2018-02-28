<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Практика</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/dist/css/main.css">
    <link rel="stylesheet" href="/dist/css/skin-purple.css">
    <link rel="stylesheet" href="/dist/css/go_top.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple layout-top-nav">
<div class="wrapper">

    <header class="main-header">
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand"><i class="fa fa-fw fa-cube fa-lg"></i>Завдання на практику<b> Василини
                            Вайман</b></a>
                </div>
            </div>
        </nav>
    </header>
    <div class="content-wrapper">
        <div class="container">
            <section class="content-header">
                <h1>
                    Сортування масиву чисел
                </h1>
            </section>

            <section class="content">

                <div class="box">
                    <div class="callout callout-info">
                        <div class="box-header">
                            <h3 class="box-title text-white">Вітаю Вас на моєму сайті!</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="remove"
                                        data-toggle="tooltip" title="Закрити">
                                    <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <p>Тут Ви можете згенерувати будь-який масив чисел (випадкових чи простих) та відсортувати
                                його
                                шістьма різними способами.</p>
                            <p>Доступні такі алгоритми сортування:</p>
                            <ul>
                                <li>горизонтальне та вертикальне сортування;</li>
                                <li>сортування равликом та зворотнім равликом;</li>
                                <li>сортування діагоналлю та змійкою.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="box box-dark">
                    <div class="box-header with-border">
                        <h3 class="box-title">Форма для введення даних</h3>
                    </div>
                    <form class="form-horizontal" action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputColumns" class="col-sm-4 control-label">Кількість стовпців</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="columns" min="2" max="25" required
                                           placeholder="Введіть кількість стовпців матриці">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputRows" class="col-sm-4 control-label">Кількість рядків</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="rows" min="2" max="25" required
                                           placeholder="Введіть кількість рядків матриці">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Оберіть вид чисел</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="numbers">
                                        <option value="random">Випадкові числа</option>
                                        <option value="simple">Прості числа</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="my_button" class="btn bg-navy btn-flat pull-right">Згенерувати
                                масив
                            </button>
                        </div>
                    </form>
                </div>

                <?php

                require 'vendor/autoload.php';

                use liw\Horisontal_sort;
                use liw\Vertical_sort;
                use liw\Snail_sort;
                use liw\Rsnail_sort;
                use liw\Diahonal_sort;
                use liw\Snake_sort;
                use liw\Generator;

                if (isset($_POST['my_button'])) {

                $columns = $_POST["columns"];
                $rows = $_POST["rows"];
                $number = $_POST['numbers'];

                file_put_contents("sort.txt", '');

                ?>

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Вивід згенерованих чисел</h3>
                    </div>
                    <div class="box-body" style="width: auto; align: center">
                        <?php
                        $object = new Generator ($columns, $rows, $number);
                        $arr = $object->generate();
                        ?>
                    </div>
                </div>


                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Результат сортування</h3>
                    </div>
                    <div class="box-body">
                        <?php

                        $horisontal = new Horisontal_sort($arr, $columns, $rows);
                        $horisontal->output();

                        $vertical = new Vertical_sort($arr, $columns, $rows);
                        $vertical->output();

                        $snail = new Snail_sort($arr, $columns, $rows);
                        $snail->output();

                        $rsnail = new Rsnail_sort($arr, $columns, $rows);
                        $rsnail->output();

                        $diagonal = new Diahonal_sort($arr, $columns, $rows);
                        $diagonal->output();

                        $snake = new Snake_sort($arr, $columns, $rows);
                        $snake->output();

                        }
                        ?>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <footer class="main-footer">
        <div class="container">
            <strong>Василина Вайман &copy; <?php echo date("Y"); ?> <a href="http://v-vaiman.zzz.com.ua/">Портфоліо</a>
                <div class="footer-social pull-right">
                    <a href="https://github.com/v-vaiman">
                        <i class="fa fa-fw fa-github fa-lg"></i>
                    </a>
                    <a href="https://vk.com/vasilisa.vaiman">
                        <i class="fa fa-fw fa-vk fa-lg"></i>
                    </a>
                    <a href="https://www.facebook.com/profile.php?id=100006295087469">
                        <i class="fa fa-fw fa-facebook fa-lg"></i>
                    </a>
                </div>
        </div>
    </footer>
</div>

<script src="/components/jquery/dist/jquery.min.js"></script>
<script src="/components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/components/fastclick/lib/fastclick.js"></script>
<script src="/dist/js/go_top.js"></script>
<script src="/dist/js/adminlte.js"></script>
</body>
</html>