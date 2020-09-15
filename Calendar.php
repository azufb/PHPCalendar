<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <title>Calendar</title>
    </head>
    <body>
        <h1><?php echo 'dateメソッドとstrtotimeメソッドについてテキストで学習しましょう!!'; ?>
        <?php
            // 曜日の取得の仕方に気をつける。formatで取得すると文字列で取得してしまう。

            // タイムゾーンを設定する。日本の場合は、'Asia/Tokyo'。
            date_default_timezone_set('Asia/Tokyo');

            // 表示させる年月を設定する。(現在の年・月)
            $year = date('Y');
            $month = date('m');

            // 月末日を取得する。

        ?>
    </body>
</html>