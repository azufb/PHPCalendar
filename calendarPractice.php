<?php
    $now = new DateTime(null, new DateTimeZone('Asia/Tokyo'));
    echo $now->format('Y年m月d日 H:i:s').'<br />';

    $now->setDate(2020, 9, 16);
    $now->setTime(14, 70, 59);
    echo $now->format('Y年m月d日 H:i:s').'<br />';

    echo $now->format('L') ? '閏年です' : '閏年ではありません' .'<br />';

    echo $now->format('l');

    $now->sub(new DateInterval('P1Y'));
    print $now->format('Y年m月d日 H:i:s');

    function calendar($year, $month) {
        for($i = 1; $i < 32; $i++) {
            if(checkdate($month, $i, $year)) { echo "{$i} &nbsp;"; }
        }
    }

    echo '<br />2020年2月のカレンダー:<br />';
    calendar(2020, 2);
?>