<?php session_start();
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=relatorio_fretes_'.date('d-m-Y').'.csv');
echo "Data;Produto;Origem;Destino;Transportador;Total\n";
if(!empty($_SESSION['fretes'])) foreach($_SESSION['fretes'] as $f){
  echo "{$f['data']};{$f['produto']};{$f['origem']};{$f['destino']};{$f['transportador']};{$f['total']}\n";
}
exit;
