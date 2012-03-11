<?php

if ($db_job== 'Miner') {
   print '<div class="otstup"><b>Профессия:</b> '.Шахтер.'</div>';
}

if ($db_job== 'Hunter') {
   print '<div class="otstup"><b>Профессия:</b> '.Охотник.'</div>';
}

if ($db_job== 'Farmer') {
   print '<div class="otstup"><b>Профессия:</b> '.Фермер.'</div>';
}

if ($db_job== 'Digger') {
   print '<div class="otstup"><b>Профессия:</b> '.Копатель.'</div>';
}

if ($db_job== 'Builder') {
   print '<div class="otstup"><b>Профессия:</b> '.Строитель.'</div>';
}

if ($db_job== 'Woodcutter') {
   print '<div class="otstup"><b>Профессия:</b> '.Лесоруб.'</div>';
}

if (!$db_job) {
   print '<div class="otstup"><b>Профессия:</b> '.Безработный.'</div>';
}
?>

