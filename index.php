<?php
function searchFilename($folderName, $fileName){
    // открываем текущую папку 
    $dir = opendir($folderName); 
    // перебираем папку 
    while (($file = readdir($dir)) !== false){ // перебираем пока есть файлы
        if($file != "." && $file != ".."){ // если это не папка
            if(is_file($folderName."/".$file)){ // если файл проверяем имя
                // если имя файла нужное, то вернем путь до него
                if($file == $fileName) return $folderName."/".$file;
            } 
            // если папка, то рекурсивно вызываем searchFilename
            if(is_dir($folderName."/".$file)) return searchFilename($folderName."/".$file, $fileName);
        } 
    }
    // закрываем папку
    closedir($dir);
}
function searchContent($folderName, $pattern){
    // открываем текущую папку 
    $dir = opendir($folderName); 
    // перебираем папку 
    while (($file = readdir($dir)) !== false){ // перебираем пока есть файлы
        if($file != "." && $file != ".."){ // если это не папка
            if(is_file($folderName."/".$file)){ // если файл проверяем имя
                // если имя файла нужное, то вернем путь до него
                if(strpos(file_get_contents($folderName."/".$file)) !== false) return $folderName."/".$file;
            } 
            // если папка, то рекурсивно вызываем searchContent
            if(is_dir($folderName."/".$file)) return searchContent($folderName."/".$file, $fileName);
        } 
    }
    // закрываем папку
    closedir($dir);
}
