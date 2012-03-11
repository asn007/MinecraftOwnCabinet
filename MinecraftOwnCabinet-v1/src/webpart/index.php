<?php
define('INCLUDE_CHECK',true);

require 'functions.php';
require 'config.php'; 


if ($login == 'on')
{
	require 'connect.php';
	
	session_name('Login');
	session_set_cookie_params(2*7*24*60*60);
	session_start();

	if(empty($_SESSION['id']))
	{
		$_SESSION['id'] = false;
	}
	
	if($_SESSION['id'] && !isset($_COOKIE['Remember']) && !$_SESSION['rememberMe'])
	{
		$_SESSION = array();
		session_destroy();
	}
 
	if(isset($_GET['logoff']))
	{
		$_SESSION = array();
		session_destroy();
		header("Location: index.php");
		exit;
	}
	
	if(empty($_POST['submit']))
	{
		$_POST['submit'] = false;
	}
	
	if($_POST['submit']=='Войти')
	{
		$err = array();
	
		if(!$_POST['username'] || !$_POST['password'])
		$err[] = 'Все поля должны быть заполнены!';
		
		if ((!preg_match('#^[A-Za-z0-9]+$#i', $_POST['username'])) || (!preg_match('#^[A-Za-z0-9]+$#i', $_POST['password'])))  // Проверка логина и пароля на допустимые символы
		{
			$err[] = 'Разрешены только цифры и латинские буквы!';
		}
		else
		{
		
			if(!count($err))
			$_POST['username'] = mysql_real_escape_string($_POST['username']);
			$_POST['password'] = mysql_real_escape_string($_POST['password']);
			$_POST['rememberMe'] = (int)$_POST['rememberMe'];

			$row = mysql_fetch_assoc(mysql_query("SELECT $db_columnId,$db_columnUser,$db_columnPass FROM $db_table WHERE $db_columnUser='{$_POST['username']}'"));

			if($row[$db_columnPass])
			{
				$realPass = $row[$db_columnPass];
				$postPass = $_POST['password'];
				$checkPass = '';
			
				if (strlen($realPass) == 32)
				{
					$checkPass = md5(md5($postPass));
				}
				else
				{
				
					if (strlen($realPass) <= 32)
					{
					$checkPass = substr(md5(md5($postPass)),-31);
					}
					else
					{
					
						if(strpos($realPass,'$SHA$') !== false)
						{
							$ar = preg_split("/\\$/",$realPass);
							$salt = $ar[2];
							$checkPass = '$SHA$'.$salt.'$'.hash('sha256',hash('sha256',$postPass).$salt);
						}
						else
						{
							$saltPos = (strlen($postPass) >= strlen($realPass) ? strlen($realPass) : strlen($postPass));
							$salt = substr($realPass, $saltPos, 12);
							$hash = hash('whirlpool', $salt . $postPass);
							$checkPass = substr($hash, 0, $saltPos) . $salt . substr($hash, $saltPos);
						}
					}
				}
				
				if(strcmp($realPass,$checkPass) == 0)
				{
					$_SESSION['playername']=$row[$db_columnUser];
					$_SESSION['id'] = $row[$db_columnId];
					$_SESSION['rememberMe'] = $_POST['rememberMe'];
					setcookie('Remember',$_POST['rememberMe']);
				}
				else
				{
					$err[]='Неправильный пароль.';
				}
			}
			else
			{
				$err[] = '<p>Такого пользователя не существует.<br /></p>';
			}
		}

		if($err)
		$_SESSION['msg']['login-err'] = implode('<br />',$err);
		header("Location: index.php");
		exit;
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Minecrfat</title>
<link rel="stylesheet" type="text/css" href="template/css/style.css" media="screen" />
<script type="text/javascript" src="../js/libs.js"></script>
</head>
<body>
{AJAX}
<div class="wwide pagebg">
	<div id="headbar">
		<div id="header">
			<div class="wrapper">
				<div class="container">
					<h1><a class="thide" href="/" title="MC-Party">На главную</a></h1>
					<div class="loginbox">{login}</div>
					<div class="headlinks">
						<ul class="reset">
							<li><a href="http://mc-party.ru/">На сайт</a></li>
							<li><a href="http://mc-party.ru/forum/">Форум</a></li>
							<li><a href="/">Ссылка</a></li>
							</ul>
					</div>
				</div>
			</div>
		</div>
		
	</div>

<div  class="wrapper">
    
    <div class="shadlr"><div class="shadlr">
			<div  style="background: #fff; height:100%; -webkit-border-radius:3px;-moz-border-radius:3px;-khtml-border-radius:3px;">
			
			<?php
			require 'osnova.php';
		    ?>
			
<div class="clr"></div>
			</div>	
				<div id="vsepfoot" class="wsh"><div class="wsh">&nbsp;</div></div>
			</div>
		</div></div>
	</div>
</div>			
<div class="wwide footer">
	<div class="wrapper">
		<div class="container">
			<h2><a class="thide" href="/index.php" title="DataLife Engine - Softnews Media Group">DataLife Engine - Softnews Media Group</a></h2>
			<span class="copyright">
				Copyright &copy; 2004-2012 <a href="http://dle-news.ru">SoftNews Media Group</a> All Rights Reserved.<br />
				Powered by DataLife Engine &copy; 2012
			</span>
		</div>
		
		
	</div>
	<div class="banners">
			<div class="counts">
				<ul class="reset">
					<li><img src="{THEME}/images/count.png" alt="count 88x31px" /></li>
					<li><img src="{THEME}/images/count.png" alt="count 88x31px" /></li>
					<li><img src="{THEME}/images/count.png" alt="count 88x31px" /></li>
				</ul>
			</div>
	</div>
</div>

</body>
</html>