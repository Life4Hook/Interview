<form enctype="multipart/form-data" action="upload.php" method="POST">
    Отправить этот файл: <input name="userfile" type="file" />
    <input type="submit" value="Отправить файл" />
</form>
<?php
$dir = "upload";
if(!is_dir($dir)) {
    mkdir($dir, 0777, true);
}
$file = new SplFileObject($_FILES['userfile']['name']);
$file->setFlags(SplFileObject::READ_CSV);
foreach ($file as $row):
    $create = new SplFileObject("upload/$row[0]", "w");
    $written = $create->fwrite("$row[1]");
endforeach;