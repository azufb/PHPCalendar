<?php
    require_once('Vertical.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <title>Vertical Type</title>
    </head>
    <body>
        <table>
        <?php foreach ($calendarArray as $value) { ?>
            <?php if ($value['day'] != date('j')) { ?>
            <tr class="week<?php echo $value['week'] ?>">
            <?php } else { ?>
            <tr class="today">
            <?php } ?>
                <td>
                    <?php echo $value['day'] ?>(<?php echo $weekArray[$value['week']] ?>)
                </td>
                <td>
                    <?php if (isset($value['text'])) { ?>
                        <input type='text'><?php echo $value['text'] ?></input>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </table>
    </body>
</html>
