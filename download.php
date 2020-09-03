<?php
$nomeArquivo = $_GET['nomeArquivo'];
if (!file_exists('Resources/arquivos/'.$nomeArquivo)){
    echo "Arquivo não existe!";
    die;
}
$ext = pathinfo('Resources/arquivos/'.$nomeArquivo, PATHINFO_EXTENSION);
if ($ext!='txt' && $ext!='TXT'){
    echo "Arquivo não permitido";
    die;
}
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream;");
header("Content-disposition: attachment; filename=".$nomeArquivo);
header("Pragma: no-cache");
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Expires: 0");
readfile('Resources/arquivos/'.$nomeArquivo);
flush();

