<?php
if ($db_level > '0') {
   print '<div class="otstup"><b>Уровень:</b> '.$db_level.'</div>';
}

if (!$db_level) {
   print '<div class="otstup"><b>Уровень:</b> '.Нет.'</div>';
}
?>
