<?php

if(!defined('INCLUDE_CHECK')) die('У вас не прав запускать файл на выполнение');

function uploadHandle($max_file_size = 5, $upload_dir = '.')  
    {  
		global $dir_skins, $dir_cloaks, $username;
        $error = null;  
        $info  = null;  
        $max_file_size *= 1024;
		//$username = $_SESSION['playername'].".png";
		if($_POST['Mod'] == "1") { $upload_dir = $dir_skins; 
		if ($_FILES['userfile']['error'] === UPLOAD_ERR_OK)  
        {  
            // проверяем расширение файла  
			if (($_FILES['userfile']['type'] == "image/png")  || ($_FILES['userfile']['type'] == "image/x-png"))
            {  
                // проверяем размер файла  
                if ($_FILES['userfile']['size'] < $max_file_size)  
                {  
					// проверяем разрешение файла
					$ImageSize = getimagesize($_FILES['userfile']['tmp_name']); 
					if($ImageSize['0'] == 64 && $ImageSize['1'] == 32) {
						
						$destination = $upload_dir .'/' .$username.".png";  
      					if (move_uploaded_file($_FILES['userfile']['tmp_name'], $destination))
							$info = 'Файл успешно загружен.';
							else  
							$error = 'Не удалось загрузить файл.';
							
					}   
					else  
						$error = 'Разрешение файла отличается от  допустимого 64pх на 32px.';
					
                }   
                else  
                    $error = 'Размер файла больше допустимого.';  
            }   
            else  
                $error = 'Разрешена загрузка только изображений в формате "png".';  
        }   
        else { 

            // массив ошибок  
            $error_values = array( 

                UPLOAD_ERR_INI_SIZE   => 'Размер файла больше разрешенного директивой upload_max_filesize в php.ini',  
                UPLOAD_ERR_FORM_SIZE  => 'Размер файла превышает указанное значение в MAX_FILE_SIZE',                            
                UPLOAD_ERR_PARTIAL    => 'Файл был загружен только частично',   
                UPLOAD_ERR_NO_FILE    => 'Не был выбран файл для загрузки',   
                UPLOAD_ERR_NO_TMP_DIR => 'Не найдена папка для временных файлов',   
                UPLOAD_ERR_CANT_WRITE => 'Ошибка записи файла на диск' 

                                  );  
      
            $error_code = $_FILES['userfile']['error'];  
      
            if (!empty($error_values[$error_code]))  
                $error = $error_values[$error_code];  
            else  
                $error = 'Случилось что-то непонятное';  
			}
			}
			if($_POST['Mod'] == "2") { $upload_dir = $dir_cloaks; 
			if ($_FILES['userfile']['error'] === UPLOAD_ERR_OK)  
        {  
            // проверяем расширение файла  
			if (($_FILES['userfile']['type'] == "image/png")  || ($_FILES['userfile']['type'] == "image/x-png"))
            {  
                // проверяем размер файла  
                if ($_FILES['userfile']['size'] < $max_file_size)  
                {  
					// проверяем разрешение файла
					$ImageSize = getimagesize($_FILES['userfile']['tmp_name']); 
					if($ImageSize['0'] == 22 && $ImageSize['1'] == 17) {
						
						$destination = $upload_dir .'/' .$username.".png";  
      					if (move_uploaded_file($_FILES['userfile']['tmp_name'], $destination))
							$info = 'Файл успешно загружен.';
							else  
							$error = 'Не удалось загрузить файл.';
							
					}   
					else  
						$error = 'Разрешение файла отличается от  допустимого 64pх на 32px.';
					
                }   
                else  
                    $error = 'Размер файла больше допустимого.';  
            }   
            else  
                $error = 'Разрешена загрузка только изображений в формате "png".';  
        }   
        else { 

            // массив ошибок  
            $error_values = array( 

                UPLOAD_ERR_INI_SIZE   => 'Размер файла больше разрешенного директивой upload_max_filesize в php.ini',  
                UPLOAD_ERR_FORM_SIZE  => 'Размер файла превышает указанное значение в MAX_FILE_SIZE',                            
                UPLOAD_ERR_PARTIAL    => 'Файл был загружен только частично',   
                UPLOAD_ERR_NO_FILE    => 'Не был выбран файл для загрузки',   
                UPLOAD_ERR_NO_TMP_DIR => 'Не найдена папка для временных файлов',   
                UPLOAD_ERR_CANT_WRITE => 'Ошибка записи файла на диск' 

                                  );  
      
            $error_code = $_FILES['userfile']['error'];  
      
            if (!empty($error_values[$error_code]))  
                $error = $error_values[$error_code];  
            else  
                $error = 'Случилось что-то непонятное';  
			}
		}	 
        return array('info' => $info, 'error' => $error);  
    }
	
// функции постраничного вывода из файла
function get_page( $page, $start ){
  global $text, $len, $chars_per_page, $pagebreak;
  if( $page < 1 || $start >= $len ) return "";
  $end = $start + $chars_per_page;
  if( $end >= $len ) $end = $len;
  else{
    $end = strpos( $text, $pagebreak, $end );
    if( $end === false ) $end = $len;
    }
  if( $page == 1 ) return @substr( $text, $start, $end-$start );
  return get_page( $page-1, $end );
  }
 
function get_pages_count(){
  global $text, $len, $chars_per_page, $pagebreak;
  $pages = 1;
  $pos = 0;
  while( ( $pos = @strpos( $text, $pagebreak, $pos+$chars_per_page ) ) !== false )
    $pages++;
  return $pages;
  }
 
function paginate(){
  global $this_url, $text, $len, $chars_per_page;
 
  if( $len <= $chars_per_page ){
    echo $text;
    return;
    }
 
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $pages = get_pages_count();
  if( $page < 1 ) $page = 1;
  elseif( $page > $pages ) $page = $pages;
 
  echo get_page( $page, 0 );
  echo '<br /><br /><hr /><br />';
  echo '<p style="text-align:center;font-size:14px;"/>';
  for( $i = 1; $i <= $pages; $i++ ){
    if( $i == $page ) echo ' <b>'.$i.'</b>';
    else echo ' <a href="'.$this_url.'?page='.$i.'">'.$i.'</a>';
    }
  }
// функция мониторинга сервера  
function query($address, $port, $timeout = 1) {
		$query = array();

		$beginning_time = microtime(true);

		$socket = @fsockopen($address, $port, $errno, $errstr, $timeout);

		if (!$socket) {
			return false;
		}

		$end_time = microtime(true);

		fwrite($socket, "QUERY\n");

		$response = "";
		
		while(!feof($socket)) {
			$response .= fgets($socket, 1024);
		}

		$response = explode("\n", $response);

		// Server port
		$query['serverPort'] = explode(" ", $response[0], 2);
		$query['serverPort'] = $query['serverPort'][1];

		// Player count
		$query['playerCount'] = explode(" ", $response[1], 2);
		$query['playerCount'] = $query['playerCount'][1];

		// Max players
		$query['maxPlayers'] = explode(" ", $response[2], 2);
		$query['maxPlayers'] = $query['maxPlayers'][1];

		// Player list
		$query['playerList'] = explode(" ", $response[3], 2);
		$query['playerList'] = explode(", ", trim($query['playerList'][1], "[]"));

		$query['latency'] = ($end_time - $beginning_time) * 1000;

		return $query;
	}
?>