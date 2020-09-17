<?php
    require_once('Calendar.php');

    function h($v) {
        return htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
    }

    $FILE = 'tasks.txt'; // 保存するファイル。

    $id = uniqid(); // 1意のIDを生成できる。

    $text = ''; // 入力テキスト。

    $DATA = []; // 1回分のタスクを格納する配列。

    $BOARD = []; // 全てのタスクを格納する配列。

    /* 
    $FILEというファイル名のファイルが存在すると、そのファイルからデータを取得し、
    $BOADという配列に格納。
    */
    if (file_exists($FILE)) {
        $BOARD = json_decode(file_get_contents($FILE));
        // json_decodeは、 JSON形式のファイルをPHPで利用できるようにする方法。
        // file_get_contents($ファイル名が入った変数名)は、ファイルをgetして読み込む。
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['txt'])) {
            $text = $_POST['txt']; // 入力値を格納。

            $DATA = [$id, $text];

            $BOARD[] = $DATA; // 全体用配列に1回分のタスク$DATAを追加。

            // json_encodeで保存。
            file_put_contents($FILE, json_encode($BOARD));
        } else if (isset($_POST['del'])) {
            //削除ボタンが押されると、新しい全体用の配列を作成。
            $NEWBOARD = [];

            foreach($BOARD as $DATA) {
                if ($DATA[0] !== $_POST['del']) {
                    $NEWBOARD[] = $DATA;
                }
            }
            // json_encodeで保存。
            file_put_contents($FILE, json_encode($NEWBOARD));
        }
        // webページ更新。
        header('Location:'.$_SERVER['SCRIPT_NAME']);
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <title>Calendar is here!</title>
        <link rel='stylesheet' href='./style.css'>
    </head>
    <body>
        <h1>
            <?php echo $year.'年'.$month.'月の'?>Calendar&Tasks
        </h1>
        <div class='displays'>
            <table class='calendar'>
                <tr class='week'>
                    <?php foreach ($weekArray as $week) { ?>
                        <th><?php echo $week ?></th>
                    <?php } ?>
                </tr>
                <?php foreach ($calendarArray as $calendarDay) { ?>
                    <tr>
                        <?php foreach ($calendarDay as $day) { ?>
                            <?php if ($day != date('j')) { ?>
                                <td><?php echo $day ?></td>
                            <?php } else { ?>
                                <td><?php echo $day ?></td>
                            <?php } ?>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
            
            <div>
                <form method='post'>
                    <h2>タスクリスト</h2>
                    <input type='text' name='txt'>
                    <input type='submit' value='➕'>
                </form>
                <div class='tasks'>
                    <?php foreach ($BOARD as $DATA) : ?>
                        <ul>
                            <form method='post'>
                                <li>
                                    <!--タスク-->
                                    <input type='checkbox'>
                                    <?php echo h($DATA[1]); ?>
                                
                                
                                    <input type='hidden' name= 'del' value= '<?php echo $DATA[0]; ?>'>
                                    <input type= 'submit' value= '✖️'>
                                </li>
                            </form>
                        </ul>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <footer>
            &copy;All Right Reserved By Azusa Okamoto.
        </footer>
    </body>
</html>