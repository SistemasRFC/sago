<?php
$nomeArquivo = $_GET['nomeArquivo'];
$pasta = $_GET['pasta'];
if (!file_exists($pasta.$nomeArquivo)){
    echo "Arquivo não existe!";
    die;
}
$ext = pathinfo($pasta.$nomeArquivo, PATHINFO_EXTENSION);
if ($ext!='txt' && $ext!='zip'){
    echo "Arquivo não permitido";
    die;
}
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream;");
header("Content-Transfer-Encoding: binary");
header("Content-disposition: attachment; filename=".$nomeArquivo);
header("Pragma: no-cache");
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Expires: 0");
readfile($pasta.$nomeArquivo);
flush();

