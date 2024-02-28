<?php
include_once("Dao/BaseDao.php");
class MenuPrincipalDao extends BaseDao
{
    function MenuPrincipalDao() {
        $this->conect();
    }

    function CarregaMenu( $codUsuario, $codMenuPai, $path ) {
        try {
            $sql_localiza = " SELECT DSC_MENU_W,
                                     M.COD_MENU_W,
                                     CONCAT('" .$path. "','/Controller/',NME_CONTROLLER) AS NME_CONTROLLER,
                                     NME_METHOD,
                                     NME_USUARIO_COMPLETO,
                                     M.COD_MENU_PAI_W,
                                     TXT_SENHA_W
                                FROM SE_MENU M
                               INNER JOIN SE_MENU_PERFIL MP
                                  ON M.COD_MENU_W = MP.COD_MENU_W
                               INNER JOIN SE_USUARIO U
                                  ON MP.COD_PERFIL_W = U.COD_PERFIL_W
                               WHERE COD_USUARIO = $codUsuario
                                 AND IND_MENU_ATIVO_W = 'S'
                                 AND M.COD_MENU_PAI_W = $codMenuPai
                               ORDER BY DSC_MENU_W";
            $rs_localiza = $this->selectDB("$sql_localiza", false);
        } catch (Exception $e) {
            echo "erro" . $e;
        }
        return $rs_localiza;
    }

    public function CarregaMenuNew($codUsuario, $path) {
        try {
            $sql_localiza = " SELECT DSC_MENU_W,
                                     M.COD_MENU_W,                   
                                     NME_CONTROLLER,
                                     CONCAT('" . $path . "','/Controller/',NME_CONTROLLER) AS NME_PATH,
                                     NME_METHOD,
                                     NME_USUARIO_COMPLETO,
                                     M.COD_MENU_PAI_W,
                                     TXT_SENHA_W,
                                     '250px' AS VLR_TAMANHO_SUBMENU
                                FROM SE_MENU M
                               INNER JOIN SE_MENU_PERFIL MP
                                  ON M.COD_MENU_W = MP.COD_MENU_W
                               INNER JOIN SE_USUARIO U
                                  ON MP.COD_PERFIL_W = U.COD_PERFIL_W
                               WHERE COD_USUARIO = $codUsuario
                                 AND IND_MENU_ATIVO_W = 'S'
                                 AND IND_VISIBLE = 'S'
                               ORDER BY DSC_MENU_W";
            $rs_localiza = $this->selectDB("$sql_localiza", false);
        } catch (Exception $e) {
            echo "erro" . $e;
        }
        return $rs_localiza;
    }

    public function CarregaController($codMenu, $path) {
        try {
            $sql_localiza = " SELECT NME_CONTROLLER,
                                     NME_METHOD
                                FROM SE_MENU M
                               WHERE M.COD_MENU_W = $codMenu";
            $rs_localiza = $this->selectDB("$sql_localiza");
        } catch (Exception $e) {
            echo "erro" . $e;
        }
        return $rs_localiza;
    }

    public function CarregaDadosUsuario($codUsuario) {
        $sql = "SELECT COD_USUARIO,
                       NME_USUARIO_COMPLETO
                  FROM SE_USUARIO U
                 WHERE U.COD_USUARIO = $codUsuario";
        return $this->selectDB($sql, false);
    }

    public function BuscarDados($codUsuario) {
        $sql = "SELECT U.COD_USUARIO,
                       U.COD_PROJETO,
                       P.DSC_PROJETO
                  FROM SE_USUARIO U
                 INNER JOIN PROJETO P ON U.COD_PROJETO = P.COD_PROJETO
                 WHERE U.COD_USUARIO = $codUsuario";
                //  echo $sql; die;
        return $this->selectDB($sql, false);
    }

    public function BuscarPontuacaoMesAtual($codUsuario, $mes, $ano) {
        $select = " SELECT COD_EXECUCAO,
                           SUM(QTD_TOTAL_PONTOS) AS PONTUACAO_ATUAL
                      FROM (SELECT E.COD_EXECUCAO,
                                   EC.COD_EXECUCAO_COMPLEXIDADE,
                                   CC.QTD_PONTOS*COUNT(EA.COD_EXECUCAO_ARQUIVO) AS QTD_TOTAL_PONTOS
                              FROM EXECUCAO E
                             INNER JOIN EXECUCAO_COMPLEXIDADE EC ON E.COD_EXECUCAO = EC.COD_EXECUCAO
                             INNER JOIN EXECUCAO_ARQUIVOS EA ON EC.COD_EXECUCAO_COMPLEXIDADE = EA.COD_EXECUCAO_COMPLEXIDADE
                             INNER JOIN COMPLEXIDADE_COMPONENTE CC ON EC.COD_COMPLEXIDADE_COMPONENTE = CC.COD_COMPLEXIDADE_COMPONENTE
                             WHERE NRO_ANO_REFERENCIA = $ano
                               AND COD_USUARIO = $codUsuario
                               AND NRO_MES_REFERENCIA = $mes
                             GROUP BY E.COD_EXECUCAO, CC.QTD_PONTOS) AS X
                     GROUP BY COD_EXECUCAO";
        return $this->selectDB($select, false);
    }

    public function BuscarPontuacaoAnoAtual($codUsuario) {
        $select = " SELECT NRO_MES_REFERENCIA,
                           SUM(QTD_TOTAL_PONTOS) AS QTD_TOTAL_PONTOS
                      FROM (SELECT E.NRO_MES_REFERENCIA,
                                   EC.COD_EXECUCAO_COMPLEXIDADE,
                                   CC.QTD_PONTOS*COUNT(EA.COD_EXECUCAO_ARQUIVO) AS QTD_TOTAL_PONTOS
                              FROM EXECUCAO E
                             INNER JOIN EXECUCAO_COMPLEXIDADE EC ON E.COD_EXECUCAO = EC.COD_EXECUCAO
                             INNER JOIN EXECUCAO_ARQUIVOS EA ON EC.COD_EXECUCAO_COMPLEXIDADE = EA.COD_EXECUCAO_COMPLEXIDADE
                             INNER JOIN COMPLEXIDADE_COMPONENTE CC ON EC.COD_COMPLEXIDADE_COMPONENTE = CC.COD_COMPLEXIDADE_COMPONENTE
                             WHERE COD_USUARIO = $codUsuario";
        if(date('m') == 12) {
            $select .= "       AND NRO_ANO_REFERENCIA = YEAR(NOW())+1";
        } else {
            $select .= "       AND NRO_ANO_REFERENCIA = YEAR(NOW())";
        }
        $select .= "         GROUP BY E.NRO_MES_REFERENCIA, EC.COD_EXECUCAO_COMPLEXIDADE) AS X
                     GROUP BY NRO_MES_REFERENCIA
                  ORDER BY NRO_MES_REFERENCIA";
        // echo $select; die;
        return $this->selectDB($select, false);
    }
    
}
?>
