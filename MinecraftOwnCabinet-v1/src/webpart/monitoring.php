<td align="left"  width="100%" class="maintable" border="1">
<div align="left"  style="margin-top:5px; text-shadow: 0 1px #fff; margin-left:10px; color: #2b2b2b"><h2>Мониторинг сервера:</h2></div>
<?php
$arr = query($server, $portmc);
						
						if ($arr == false)
						{
							$fp = @fsockopen($server, $port, $errno, $errstr, 0.1);
							
							if ($fp) 
							{
								echo '<div>Версия:'.$version.'Сервер:'.$server.':'.$port.'</div>';
								fclose($fp);
							} 
							else
							{
								echo '<div class="pechkaoff"></div>';
								echo '<p><br />Сервер отключен!<br /></p>';
							}
						}
						else
						{
							echo '<div class="pechkaon"></div>';
							echo '<br />Версия: '.$version;
							echo '<br />Сервер: '.$server.':'.$port;
							echo '<div class="online_img">Игроков:'.$arr['playerCount'].'/'.$arr['maxPlayers'].'</div>';
							echo '<br />Задержка: '.round($arr['latency']);
							echo '<br /><br />Игроки онлайн: ';
						

							echo '<a href="#" onclick="return swch(2);" id="block2_swch">[+]</a><br /><br />
							<div id="block2" style="display : none;">';

							$first = true;
							
							foreach ($arr['playerList'] as $value)
							{
							
								if (empty($value))
								{
								echo '<b />Пусто, все ушли на фронт';
								}
								else
							
								if (!$first) print ', ';
								$first = false;
								echo $value;
							}
							echo '</div>';
						}
								
?>
</td></tr></table>