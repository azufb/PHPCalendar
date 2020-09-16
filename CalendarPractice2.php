<?php
    // タイムゾーンを'Asia/Tokyo'にし、日本の時刻が表示されるように設定する。
    // 日付関数の使用前に設定しておく必要がある。
    date_default_timezone_set('Asia/Tokyo');
    
    // 表示させる年と月を指定する。Yは年、mは月。現在の年や月を表すことができる。
    $year = date('Y');
    $month = date('m');
    echo $month;

    // 月末日を取得する。
    // 次の月の初めの1日-今月の1日との差分を求める。
    $nextMonth = $month + 1;
    echo '<br />'.$month;
    echo '<br />'.$nextMonth;

    $d1 = new DateTime();
    $d1->setDate($year, $month, 01);
    $d2 = new DateTime();
    $d2->setDate($year, $nextMonth, 01);
    echo '<br />'.$d1->format('Y-m-d');
    echo '<br />'.$d2->format('Y-m-d');
    
    $interval = $d1->diff($d2);
    $diffDays = $interval->format('%a');
    echo '<br />'.$diffDays;

    // 1日の曜日を取得する
    $firstDay = $d1->format('l');
    echo '<br />'.$firstDay;

    // 月末日の取得
    $lastDay = new DateTime();
    $lastDay->setDate($year, $month, $diffDays);
    echo '<br />'.$lastDay->format('Y-m-d');
    $last = $lastDay->format('l');
    echo '<br />'.$last.'<br />';
    
    // dateメソッドは、ローカルの日付・時刻を書式化する
    $today = date('F j, Y, g:i:a');
    echo $today.'<br />';
    $today = date('t');
    echo $today.'<br />';
    $today = date('w');
    echo $today.'<br />';
    /* 
    0->日
    1->月
    2->火
    3->水
    4->木
    5->金
    6->土
    */

    $n = strtotime("now");
    echo $n.'<br />';
    
    $e = date('t', strtotime($year.$month.'01'));
    echo $e.'<br />';
    $end = date('t', strtotime($year.$nextMonth.'01'));
    echo $end.'<br />';
    $tw = date('j');
    echo $tw.'<br />';
?>