<?php
//function filesizecurl($arquivo)
//{
//    if (is_file($arquivo) === false) {
//        return false;
//    }
//
//    $arquivo = realpath(preg_replace('#^file:#', '', $arquivo));
//
//    $ch = curl_init('file://' . ltrim($arquivo, '/'));
//
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Faz o retorno ser salvo na variável
//    curl_setopt($ch, CURLOPT_HEADER, 1); //Faz retornar os headers
//    curl_setopt($ch, CURLOPT_NOBODY, 1); //Evita retornar o corpo
//
//    $headers = curl_exec($ch);
//    curl_close($ch);
//
//    $ch = null;
//
//    //Com preg_match extraímos o tamanho retornado de Content-Length
//    if (preg_match('#(^c|\sc)ontent\-length:(\s|)(\d+)#i', $headers, $matches) > 0) {
//        return $matches[3];
//    }
//
//    return false;
//}
$nomeArquivo = $_GET['nomeArquivo'];
echo 'Resources/arquivos/'.$nomeArquivo;
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
//header("Content-Length:".filesizecurl('Resources/arquivos/'.$nomeArquivo));
header("Content-disposition: attachment; filename=".$nomeArquivo);
header("Pragma: no-cache");
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Expires: 0");
readfile('Resources/arquivos/'.$nomeArquivo);
flush();

