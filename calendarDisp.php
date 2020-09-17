<?php
require_once('Calendar.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <title>Calendar is here!</title>
    </head>
    <body>
        <h1>
            <?php echo $year.'年'.$month.'月の'?>Calendar
        </h1>
        <table>
            <tr>
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
    </body>
</html>