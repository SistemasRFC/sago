<?php
$nomeArquivo = $_GET['nomeArquivo'];
echo 'Resources/arquivos/'.$nomeArquivo;
//if (!file_exists('/var/www/html/sago/Resources/arquivos/'.$nomeArquivo)){
//    echo "Arquivo não existe!";
//    die;
//}
$ext = pathinfo('Resources/arquivos/'.$nomeArquivo, PATHINFO_EXTENSION);
if ($ext!='txt' && $ext!='TXT'){
    echo "Arquivo não permitido";
    die;
}
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream;");
header("Content-Length:".filesize('http://localhost/sago/Resources/arquivos/'.$nomeArquivo));
header("Content-disposition: attachment; filename=".$nomeArquivo);
header("Pragma: no-cache");
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Expires: 0");
readfile('http://localhost/sago/Resources/arquivos/'.$nomeArquivo);
flush();

