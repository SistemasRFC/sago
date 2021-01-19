TYPE=VIEW
query=select straight_join `pp`.`QTD_NECESSARIA` AS `QTD_NECESSARIA`,`pp`.`TXT_OBSERVACAO` AS `TXT_OBSERVACAO`,`l`.`DSC_LOJA` AS `DSC_LOJA`,`l`.`DSC_LOJA_ABREVIADO` AS `DSC_LOJA_ABREVIADO`,`l`.`COD_LOJA` AS `COD_LOJA`,`pr`.`DSC_PRODUTO` AS `DSC_PRODUTO`,`p`.`IND_FECHADO` AS `IND_FECHADO`,`p`.`DATA_ENTREGA_PREVISTA` AS `DATA_ENTREGA_PREVISTA`,`p`.`COD_PERIODO_DIA` AS `COD_PERIODO_DIA`,`l`.`COD_CLIENTE` AS `COD_CLIENTE`,`d`.`COD_DEPARTAMENTO` AS `COD_DEPARTAMENTO`,`c`.`COD_CLASSIFICACAO` AS `COD_CLASSIFICACAO`,`d`.`DSC_DEPARTAMENTO` AS `DSC_DEPARTAMENTO`,`c`.`DSC_CLASSIFICACAO` AS `DSC_CLASSIFICACAO` from (((((`capanew`.`re_pedido` `p` join `capanew`.`re_pedido_produto` `pp` on(((`p`.`COD_PEDIDO` = `pp`.`COD_PEDIDO`) and (year(`p`.`DATA_PEDIDO`) = year(now()))))) join `capanew`.`en_produto` `pr` on((`pp`.`COD_PRODUTO` = `pr`.`COD_PRODUTO`))) join `capanew`.`en_classificacao` `c` on((`pr`.`COD_CLASSIFICACAO` = `c`.`COD_CLASSIFICACAO`))) join `capanew`.`en_loja` `l` on((`p`.`COD_LOJA` = `l`.`COD_LOJA`))) join `capanew`.`en_departamento` `d` on((`c`.`COD_DEPARTAMENTO` = `d`.`COD_DEPARTAMENTO`)))
md5=403ce05cfae5b3a43f8a22c0c690e975
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2015-11-29 20:50:59
create-version=1
source=select straight_join `pp`.`QTD_NECESSARIA` AS `QTD_NECESSARIA`,`pp`.`TXT_OBSERVACAO` AS `TXT_OBSERVACAO`,`l`.`DSC_LOJA` AS `DSC_LOJA`,`l`.`DSC_LOJA_ABREVIADO` AS `DSC_LOJA_ABREVIADO`,`l`.`COD_LOJA` AS `COD_LOJA`,`pr`.`DSC_PRODUTO` AS `DSC_PRODUTO`,`p`.`IND_FECHADO` AS `IND_FECHADO`,`p`.`DATA_ENTREGA_PREVISTA` AS `DATA_ENTREGA_PREVISTA`,`p`.`COD_PERIODO_DIA` AS `COD_PERIODO_DIA`,`l`.`COD_CLIENTE` AS `COD_CLIENTE`,`d`.`COD_DEPARTAMENTO` AS `COD_DEPARTAMENTO`,`c`.`COD_CLASSIFICACAO` AS `COD_CLASSIFICACAO`,`d`.`DSC_DEPARTAMENTO` AS `DSC_DEPARTAMENTO`,`c`.`DSC_CLASSIFICACAO` AS `DSC_CLASSIFICACAO` from (((((`re_pedido` `p` join `re_pedido_produto` `pp` on(((`p`.`COD_PEDIDO` = `pp`.`COD_PEDIDO`) and (year(`p`.`DATA_PEDIDO`) = year(now()))))) join `en_produto` `pr` on((`pp`.`COD_PRODUTO` = `pr`.`COD_PRODUTO`))) join `en_classificacao` `c` on((`pr`.`COD_CLASSIFICACAO` = `c`.`COD_CLASSIFICACAO`))) join `en_loja` `l` on((`p`.`COD_LOJA` = `l`.`COD_LOJA`))) join `en_departamento` `d` on((`c`.`COD_DEPARTAMENTO` = `d`.`COD_DEPARTAMENTO`)))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select straight_join `pp`.`QTD_NECESSARIA` AS `QTD_NECESSARIA`,`pp`.`TXT_OBSERVACAO` AS `TXT_OBSERVACAO`,`l`.`DSC_LOJA` AS `DSC_LOJA`,`l`.`DSC_LOJA_ABREVIADO` AS `DSC_LOJA_ABREVIADO`,`l`.`COD_LOJA` AS `COD_LOJA`,`pr`.`DSC_PRODUTO` AS `DSC_PRODUTO`,`p`.`IND_FECHADO` AS `IND_FECHADO`,`p`.`DATA_ENTREGA_PREVISTA` AS `DATA_ENTREGA_PREVISTA`,`p`.`COD_PERIODO_DIA` AS `COD_PERIODO_DIA`,`l`.`COD_CLIENTE` AS `COD_CLIENTE`,`d`.`COD_DEPARTAMENTO` AS `COD_DEPARTAMENTO`,`c`.`COD_CLASSIFICACAO` AS `COD_CLASSIFICACAO`,`d`.`DSC_DEPARTAMENTO` AS `DSC_DEPARTAMENTO`,`c`.`DSC_CLASSIFICACAO` AS `DSC_CLASSIFICACAO` from (((((`capanew`.`re_pedido` `p` join `capanew`.`re_pedido_produto` `pp` on(((`p`.`COD_PEDIDO` = `pp`.`COD_PEDIDO`) and (year(`p`.`DATA_PEDIDO`) = year(now()))))) join `capanew`.`en_produto` `pr` on((`pp`.`COD_PRODUTO` = `pr`.`COD_PRODUTO`))) join `capanew`.`en_classificacao` `c` on((`pr`.`COD_CLASSIFICACAO` = `c`.`COD_CLASSIFICACAO`))) join `capanew`.`en_loja` `l` on((`p`.`COD_LOJA` = `l`.`COD_LOJA`))) join `capanew`.`en_departamento` `d` on((`c`.`COD_DEPARTAMENTO` = `d`.`COD_DEPARTAMENTO`)))
