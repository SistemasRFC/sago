<?php
include_once("Model/BaseModel.php");
include_once("Dao/Usuario/UsuarioDao.php");
include_once("Resources/php/FuncoesArray.php");
include_once("Resources/php/FuncoesString.php");
class UsuarioModel extends BaseModel
{
    function UsuarioModel(){
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    function ListarUsuario(){
        $dao = new UsuarioDao();
        $lista = $dao->ListarUsuario();
        if ($lista[0]){
            if ($lista[1]!=null){
                $lista = FuncoesArray::AtualizaBooleanInArray($lista, 'IND_ATIVO', 'ATIVO');
                for($i=0; $i<count($lista[1]);$i++){
                    if(!$lista[1][$i]['COD_PROJETO']){
                        $lista[1][$i]['COD_PROJETO']=-1;
                    }
                }                
            }
        }
        return json_encode($lista);
    }
    
    function ListarUsuarioCombo(){
        $dao = new UsuarioDao();
        $lista = $dao->ListarUsuarioCombo();
        $return[0] = false;
        $return[1][0]['ID'] = "-1";        
        $return[1][0]['DSC'] = "Selecione...";
        if ($lista[0]){
            $return[0] = true;
            $c = count($lista[1]);
            for ($i=0;$i<$c;$i++){
                $return[1][$i+1]['ID'] = $lista[1][$i]['COD_USUARIO'];
                $return[1][$i+1]['DSC'] = $lista[1][$i]['NME_USUARIO_COMPLETO'];
            }
        }
        $lista = $return;        
        return json_encode($lista);
    }

    function ListaDadosUsuario(){
        $dao = new UsuarioDao();
        $lista = $dao->ListaDadosUsuario($_SESSION['cod_perfil']);
        return json_encode($lista);
    }
    
    function AddUsuario(){
        $dao = new UsuarioDao();
        return json_encode($dao->AddUsuario());
    }

    function UpdateUsuario(){
        $dao = new UsuarioDao();
        return json_encode($dao->UpdateUsuario());
    }

    function DeleteUsuario(){
        $dao = new UsuarioDao();
        return $dao->DeleteUsuario();
    }
    
    function AddLogin(){
        $dao = new UsuarioDao();
        $result = $dao->AddLogin();
        return $result;
    }

    Public Function ReiniciarSenha(){
        $dao = new UsuarioDao();
        return json_encode($dao->ReiniciarSenha());
    }

    Public Function ResetaSenha(){
        $dao = new UsuarioDao();
        return json_encode($dao->ResetaSenha());
    }

    Public Function RecuperarSenha(){
        $dao = new UsuarioDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        // $nroCpf = filter_input(INPUT_POST, 'nroCpf', FILTER_SANITIZE_NUMBER_INT);
        if (isset($this->objRequest->nroCpf)){
            $nroCpf = $this->objRequest->nroCpf;
            if (FuncoesString::validaCPF($nroCpf)) {
                $result = $dao->VerificaUsuario($nroCpf);
                if($result[0]) {
                    if($result[1] > 0) {
                        $codUsuario = $result[1][0]['COD_USUARIO'];
                        $novaSenha = base64_encode('954321');
                        $result = $dao->RecuperarSenha($codUsuario, $novaSenha);
                        // if ($result[0]) {
                        //     Enviar email para o usuário com a nova senha
                        // }
                    } else {
                        $result[0] = false;
                        $result[1] = "Nenhum Usuário encontrado com o CPF informado!";
                    }
                }
            } else {
                $result[0] = false;
                $result[1] = "CPF inválido!";
            }
        } else {
            $result[0] = false;
            $result[1] = "Informe o CPF!";
        }
        return json_encode($result);
    }
}
?>
