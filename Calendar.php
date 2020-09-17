<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <title>Calendar</title>
    </head>
    <body>
        <?php
            // 曜日の取得の仕方に気をつける。formatで取得すると文字列で取得してしまう。
            // タイムゾーンを設定する。日本の場合は、'Asia/Tokyo'。
            date_default_timezone_set('Asia/Tokyo');

            // 表示させる年月を設定する。(現在の年・月)
            $year = date('Y');
            $month = date('m');

            // 今月末日を取得する。月末日の取得は、t。
            $endOfThisMonth = date('t', strtotime($year.$month.'01'));

            // 1日の曜日を取得する。曜日の取得は、w。
            $firstDay = date('w', strtotime($year.$month.'01'));

            // 今月末日の曜日を取得する。
            $lastDay = date('w', strtotime($year.$month.$endOfThisMonth));

            $calendarArray = [];
            $j = 0;

            // 1日が始まる曜日まで穴埋め。
            for ($i = 0; $i < $firstDay; $i++) {
                $calendarArray[$j][] = '';
            }

            // 1日〜月末日までループさせる。
            for ($i = 1; $i <= $endOfThisMonth; $i++) {
                // 日曜日になったら改行させる。
                if (isset($calendarArray[$j]) && count($calendarArray[$j]) === 7) {
                    $j++;
                }
                $calendarArray[$j][] = $i;
            }

            // 月末曜日の穴埋め。
            for ($i = count($calendarArray[$j]); $i < 7; $i++) {
                $calendarArray[$j][] = '';
            }

            $weekArray = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        ?>
    </body>
</html>