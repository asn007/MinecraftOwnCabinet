

<?php
if ($login == 'on') // Загрузка скинов с авторизацией пользователя
{	

								if(!$_SESSION['id'])
								{
								
									if(empty($_SESSION['msg']['login-err']))
									{
										$_SESSION['msg']['login-err'] = false;
									}
									
									if($_SESSION['msg']['login-err'])
									{
										echo '<br><div class="error message"><h1>Ошибка:</h1><p>'.$_SESSION['msg']['login-err'].'</p><br /></div>';
										unset($_SESSION['msg']['login-err']);
									}
echo '
<table border="0"   cellspacing="8">
<tr>
<td align="left" style="height:100px;" class="maintable" border="1">
<div align="left"  style="margin-top:5px; text-shadow: 0 1px #fff; margin-left:10px; color: #2b2b2b"><h2>Авторизация:</h2></div>
<form action="" method="post" enctype="multipart/form-data">
<input type="text" name="username" id="username" placeholder="Логин" class="pole" /><br />
<input type="password" name="password" id="password" placeholder="Пароль" class="pole" /><br />
<input style="margin-left:10px;margin-top:5px;" name="rememberMe" id="rememberMe" type="checkbox"  value="1" /><font style=" margin-left:4px;margin-botom:50px;">Запомнить меня</font><br />
<center><input type="submit" name="submit" value="Войти" class="fbutton" /></center><br /></form>
</td>';
$M=require 'monitoring.php';
echo $M;


 
}
else
								{
									$username = $_SESSION['playername'];


									
?>






									
										
										<table border="0"  cellspacing="8">
										<tr>
								    <?php
									$username = $_SESSION['playername'];
									
require 'newjob.php';										
										if(!empty($_POST['upload_submit'])) 
										{      
											$message = uploadHandle();
											
											if (!empty($message['error']))
											{
												echo '<br><div class="error message"><h1>Ошибка:</h1><p>'.$message['error'].'</p></div>';
											}
											
											if (!empty($message['info']))
											{
											if($_POST['Mod'] == "1")
												{
												echo '<br><div class="success message"><h1>Готово</h1><p>Скин успешно загружен :)</p></div>';
												}
												
												if($_POST['Mod'] == "2")
												{
												echo '<br><div class="success message"><h1>Готово</h1><p>Плащ успешно загружен :)</p></div>';
												}
											}
										}
										if($_SESSION['id'])
									{
										echo '<h1 style="padding-top:10px; text-shadow: 0 1px #fff; margin-left:10px; color: #2b2b2b">'.$username.', добро пожаловать в личный кабинет!</h1>';
										?>
										
										<td align="center" width="130px" class="maintable" border="1">
										<div align="left"  style="margin-top:5px; text-shadow: 0 1px #fff; margin-left:10px; color: #2b2b2b"><h2>Смена скина:</h2></div>
										<?php
										
									
										if ($skinpreview == '3d') // Вывод 3d просмотра загруженного скина (java).
										{
											echo '<div class="skinfon" style="margin: 5px 0;"><applet code="skinpreviewapplet.AppletLauncher" archive="./template/js/skin3d.jar" width="160" height="160" style="margin-top:2px;" codebase=".">
											<param name="url" value="http://mc-party.ru/cabinet/upload/skins/'.$username.'.png" /></applet></div>';
										}
										
    ?>
	<?php
										echo '<form action="" method="post" enctype="multipart/form-data">
										<input type="file" name="userfile" />
										<div align="right">
										<p>Тип:<select name="Mod"  class="field">
										<option value=1>Скин</option>
										<option value=2>Плащ</option>	
										<br /></p></select>
										</div>
										
										<p><center><input type="submit" value="Загрузить"  name="upload_submit" align="center" class="fbutton"></center></p></form>';
										?>
										
								</td>
<td width="100%" class="maintable" border="1">	
<div align="left"  style="margin-top:5px; text-shadow: 0 1px #fff; margin-left:10px; color: #2b2b2b"><h2>Информация:</h2></div>
<?php
// Профессия
require 'jobnames.php';
// Профессия

// Уровень
require 'level.php';
// Уровень
echo '<div class="otstup"><b>Опыт:</b> '.$db_exp.'</div>';

//Деньги
$sdd_db_host='p78011.mysql.ihc.ru';// ваш адрес где находится, хостится ваша база данных
$sdd_db_name='p78011_server';// Имя базы данных с которой вы хотите работать, так как их может быть множество
$sdd_db_user='p78011_server';// логин доступ к базе данных
$sdd_db_pass='mcpartyserv';// пароль доступа к базе данных
@mysql_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass);// устанавливаем связь с сервером
@mysql_select_db($sdd_db_name);// переключаемся на нужную нам базу данных
$checkname= $_SESSION['playername'];
$result=mysql_query("SELECT * FROM iConomy WHERE username='$checkname' ");// делаем выборку из таблиц
while($row=mysql_fetch_array($result))// берем результаты из каждой строки
{$db_balance .= ''.$row['balance'].'';}
echo '<div class="otstup"><b>Деньги:</b> '.$db_balance.' $</div>'; // выводим в таблицу HTML	
// Деньги		
?>
</td>		
							</tr>
<tr>
<td class="maintable" border="1">
<div align="left"  style="margin-top:5px; text-shadow: 0 1px #fff; margin-left:10px; color: #2b2b2b"><h2>Сменить работу:</h2></div>
<?php
echo '<font class="otstup"; style="margin-bottom:2px;">Я хочу стать</font>
<form action="" method="post" enctype="multipart/form-data">
<select name="Job">
<option value=1>Шахтером</option>
<option value=2>Копателем</option>
<option value=3>Охотником</option>	
<option value=4>Строителем</option>
<option value=5>Фермером</option>	
<option value=6>Лесорубом</option>								
<br /></p></select>
<p><center><input type="submit"  value="Изменить" name="upload_job" align="center" class="fbutton"></center></p></form>
'
?>
</td>
</tr>
							</table>
							
							
<?php
										echo '<p><input type="button" onclick="location.href=\'?logoff\'" value="Выход" class="fbutton" style="float:right;"/></p>';
									}
								}
							}
							
							
							if ($login == 'off') // Загрузка скинов без авторизации пользователя
							{	
							
								if(empty($_POST['username']))
								{
									$_POST['username'] = false;
								}
								
								$username = $_POST['username'];
								
								if(!empty($_POST['upload_submit'])) 
								{      
									$message = uploadHandle();
									
									if (!empty($message['error']))
									{
										echo '<p class="err">'.$message['error'].'<br /></p>';
									}
									
									if (!empty($message['info']))
									{
										echo '<p class="ok">'.$message['info'].'<br /></p>';
									}
								}

								echo '<form action="" method="post" enctype="multipart/form-data">
								<p><br />Логин:<br /><input type="text" name="username" id="username" class="field" value="Имя в игре" onFocus="this.value=\'\'" /><br /></p>
								<br /><input type="file" name="userfile" />
								<p><br /><select name="Mod" class="field">
								<option value=1>Скин</option>
								<option value=2>Плащ</option>	
								<br /></p></select>
								<p><input type="submit" value="Закачать" name="upload_submit" class="button" /><br /><br /></p></form>';
								
								if ($skinpreview == '3d') // Вывод 3d просмотра загруженного скина (java).
										{
											echo '<applet code="skinpreviewapplet.AppletLauncher" archive="./template/js/skin3d.jar" codebase="." width="160" height="160">
											<param name="url" value="http://'.$url.$dir.$dir_skins.$username.'.png" /></applet>';
										}
										if ($skinpreview == '2d') // Вывод 2d просмотра загруженного скина (php).
										{ 
										
											if ( !file_exists($dir_skins.$username.'.png'))
											{
												$skinpath = $dir_skins.'default.png';
											}
											else
											{
												$skinpath = $dir_skins.$username.'.png';
											}
											echo '<img src="skin2d.php?skinpath='.$skinpath.'" />';
										}
							}
							?>
							
