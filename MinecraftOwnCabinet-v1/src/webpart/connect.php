<?php
if(!defined('INCLUDE_CHECK')) die('У вас нет прав на выполнение данного файла!');

// Конфигурация подключения к базе данных
$db_host		= 'dbhost'; // Ip-адрес базы данных
$db_port		=  3306; // Порт базы данных
$db_user		= 'dbuser'; // Пользователь базы данных
$db_pass		= 'dbpass'; // Пароль базы данных

// Конфигурация базы данных для плагинов AuthMe, xAuth, CAuth
/*
$db_database - имя базы данных, значение по умолчанию для плагинов:
AuthMe = authme, xAuth = отсутствует (указывается вручную), CAuth = cauth
*/
$db_database	= 'database';

/*
$db_table - таблица базы данных, значение по умолчанию для плагинов:
AuthMe = authme, xAuth = accounts, CAuth = users
*/
$db_table       = 'dle_users';

/*
$db_columnId - уникальный идентификатор, значение по умолчанию для плагинов:
AuthMe = id, xAuth = id, CAuth = id
*/
$db_columnId  = 'user_id';

/*
$db_columnUser - колонка логина, значение по умолчанию для плагинов:
AuthMe = username, xAuth = playername, CAuth = login
*/
$db_columnUser  = 'name';

/*
$db_columnPass - колонка пароля, значение по умолчанию для плагинов:
AuthMe = password, xAuth = password, CAuth = password
*/
$db_columnPass  = 'password';


$link = @mysql_connect($db_host.':'.$db_port,$db_user,$db_pass) or die('Невозможно установить соединение с базой данных!');

mysql_select_db($db_database,$link);
mysql_query("SET names UTF8");
?>