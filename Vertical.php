<?php
    date_default_timezone_set('Asia/Tokyo');

    $year = date('Y');
    $month = date('m');

    $endOfThisMonth = date('t');

    // スケジュール
    $scheduleArray = [];

    $calendarArray = [];

    // 1日から最終日までをループさせる。
    for ($i = 1; $i <= $endOfThisMonth; $i++) {
        $calendarArray[$i]['day'] = $i;
        $calendarArray[$i]['week'] = date('w', strtotime($year.$month.sprintf('%02d', $i)));
        if (isset($scheduleArray[$i])) {
            $calendarArray[$i]['text'] = $scheduleArray[$i];
        } else {
            $calendarArray[$i]['text'] = '';
        }
    }

    $weekArray = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
?>
