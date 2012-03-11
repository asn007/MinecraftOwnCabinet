<?php
if(!defined('INCLUDE_CHECK')) die('У вас нет прав на выполнение данного файла!');

// Режим загрузки скинов
$login = 'on'; // 'on' - загрузка скина с предварительной авторизацией пользователя, 'off' - загрузка скина без авторизации пользователя

// Директории для загрузки скинов/плащей
$dir_skins = 'upload/skins/';
$dir_cloaks = 'upload/cloaks/';

// Переключение режима просмотра загруженного скина
$skinpreview = '3d'; // '3d' - режим просмотра скина в 3d (java), '2d' - режим просмотра скина в 2d (php)

// Настройки мониторинга
$version = '1.1.0'; // версия сервера
$server = '46.254.16.6'; // ip сервера
$port = 25565; // порт сервера
$portmc = 25566; // порт плагина мониторинга Minequery (http://dev.bukkit.org/server-mods/minequery/)

// Вывод текста из файла
$text = file_get_contents( 'pages/test.txt' ); // месторасположение загружаемого файла
$text = preg_replace( '#(^.*?<body[^>]*>)|(</body>.*$)#i', '', $text ); // обрезка <body> включительно и конец, оставляем только текст (для html страниц)
$len = strlen( $text );
$pagebreak = '<!-- pagebreak -->'; // метка для разделения страниц
$this_url = $_SERVER['PHP_SELF'];
$chars_per_page = 10;

$url = $_SERVER['HTTP_HOST'];
$dir = preg_replace('~\index.*$~', '', $_SERVER['REQUEST_URI']);
?>