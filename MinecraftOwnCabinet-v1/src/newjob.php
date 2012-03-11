<?php
$sdd_db_host='p78011.mysql.ihc.ru';// ваш адрес где находится, хостится ваша база данных
$sdd_db_name='p78011_server';// Имя базы данных с которой вы хотите работать, так как их может быть множество
$sdd_db_user='p78011_server';// логин доступ к базе данных
$sdd_db_pass='mcpartyserv';// пароль доступа к базе данных
@mysql_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass);// устанавливаем связь с сервером
@mysql_select_db($sdd_db_name);// переключаемся на нужную нам базу данных
$result=mysql_query("SELECT * FROM jobs WHERE username='$username' ");// делаем выборку из таблиц
while($row=mysql_fetch_array($result))// берем результаты из каждой строки
{$db_job .= ''.$row['job'].'';
 $db_level .=''.$row['level'].'';
 $db_exp .= ''.$row['experience'].'';}
 
if($_POST['Job'] == "1") {
mysql_query("UPDATE  `p78011_server`.`jobs` SET  `job` =  'Miner', `level` = '0' WHERE  `jobs`.`username` =  '$username' LIMIT 1 ;");
if (mysql_query)
{echo '<script type="text/javascript">window.location.reload("http://mc-party.ru/cabinet/index.php")</script>';}
}

	if($_POST['Job'] == "2") {
mysql_query("UPDATE  `p78011_server`.`jobs` SET  `job` =  'Digger', `level` = '0' WHERE  `jobs`.`username` =  '$username' LIMIT 1 ;");
if (mysql_query)
echo '<script type="text/javascript">window.location.reload("http://mc-party.ru/cabinet/index.php")</script>';
}

if($_POST['Job'] == "3") {
mysql_query("UPDATE  `p78011_server`.`jobs` SET  `job` =  'Hunter', `level` = '0'  WHERE  `jobs`.`username` =  '$username' LIMIT 1 ;");
if (mysql_query)
echo '<script type="text/javascript">window.location.reload("http://mc-party.ru/cabinet/index.php")</script>';
}

if($_POST['Job'] == "4") {
mysql_query("UPDATE  `p78011_server`.`jobs` SET  `job` =  'Builder', `level` = '0' WHERE  `jobs`.`username` =  '$username' LIMIT 1 ;");
if (mysql_query)
echo '<script type="text/javascript">window.location.reload("http://mc-party.ru/cabinet/index.php")</script>';
}

if($_POST['Job'] == "5") {
mysql_query("UPDATE  `p78011_server`.`jobs` SET  `job` =  'Farmer', `level` = '0' WHERE  `jobs`.`username` =  '$username' LIMIT 1 ;");
if (mysql_query)
echo '<script type="text/javascript">window.location.reload("http://mc-party.ru/cabinet/index.php")</script>';
}


if($_POST['Job'] == "6") {
mysql_query("UPDATE  `p78011_server`.`jobs` SET  `job` =  'Woodcutter', `level` = '0' WHERE  `jobs`.`username` =  '$username' LIMIT 1 ;");
if (mysql_query)
echo '<script type="text/javascript">window.location.reload("http://mc-party.ru/cabinet/index.php")</script>';
}
?>
 