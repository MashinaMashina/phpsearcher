<?php
function searchContent($folderName, $pattern, &$result = []){
    // открываем текущую папку 
    $dir = opendir($folderName); 
    // перебираем папку 
    while (($file = readdir($dir)) !== false){ // перебираем пока есть файлы
        if($file != "." && $file != ".."){ // если это не папка
            if(is_file($folderName."/".$file) and pathinfo($folderName."/".$file, PATHINFO_EXTENSION ) === 'php'){ // если файл проверяем имя
               
                if(strpos(file_get_contents($folderName."/".$file), $pattern) !== false)
					$result[] = $folderName."/".$file;
            }
			
			if(count($result) > 100)
				return $result;
			
            // если папка, то рекурсивно вызываем searchContent
            if(is_dir($folderName."/".$file)) searchContent($folderName."/".$file, $pattern, $result);
        } 
    }
    // закрываем папку
    closedir($dir);
	return $result;
}
