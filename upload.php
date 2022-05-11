<form enctype="multipart/form-data" action="upload.php" method="POST">
    Отправить этот файл: <input name="userfile" type="file" />
    <input type="submit" value="Отправить файл" />
</form>
<?php
$dir = "upload";
if(!is_dir($dir)) {
    mkdir($dir, 0777, true);
}
$filecount = get_files_count($dir);

$file = new SplFileObject($_FILES['userfile']['name']);
$file->setFlags(SplFileObject::READ_CSV);

foreach ($file as $row) {
    $filecount += 1;
    $fileNameCmps = explode(".", $row[0]);
    $create = new SplFileObject("upload/" . $filecount . "." . end($fileNameCmps), "w");
    $create->fwrite("$row[1]");
}

function get_files_count($directory)
{
    $files = glob($directory . "/*");
    if ($files) {
        return count($files);
    } else {
        return 0;
    }
}

/*Насколько я понял ТЗ, имена сохраняемых файлов задаются нумерацией, поэтому предусморел загрузку нескольких файлов,
имена будут 1.txt, 2.log, 3.html и 4.txt, 5.log, 6.html.
Если отвечать на вопрос какие с ним могут быть проблемы:
1. Нет проверки типа файла. Пользователь может загрузить не то, что мы можем обработать. Нужно проверять расширение
загружаемого файла.
2. Можно добавить проверку на формат данных, что мы ожидаем только 2 колонки, иначе мы получим некорректные данные.
3. Можно проверять размер файла и ограничивать его, при необходимости.*/
