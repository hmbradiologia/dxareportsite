<?php

$nome = $_POST["nome"];
$dnasc = $_POST["dnasc"];
$dexame = $_POST["dexame"];
$sexo = $_POST["sexo"];
$slombar = $_POST["slombar"];
$tsantebraco = $_POST["tsantebraco"];
$dmoantebraco = $_POST["dmoantebraco"];

$empresaselect = $_POST["empresa_id"];
$medico = $_POST["medico"]; 


$dnascimento = new DateTime($dnasc);
$dataexame = new DateTime($dexame);
$idade = $dnascimento->diff($dataexame);

$dexame = str_replace("/", "-", $_POST["dexame"]);
$datadoexame = date('d/m/Y', strtotime($dexame));  
?>

<?php 
if ($tsantebraco <=-2.5){$resultantebraco="osteoporose";}
else if ($tsantebraco>=-1.0){ $resultantebraco="normalidade";} 
else {$resultantebraco="osteopenia";}
?>

<?php  if ($tsantebraco >=-2.5){$resultfinal="O exame preenche os critérios de classificação da OMS para baixa massa óssea - osteopenia.";} ?>
<?php if ($tsantebraco <=-2.5){$resultfinal="O exame preenche os critérios de classificação da OMS para osteoporose.";} ?>
<?php if ($tsantebracob>=-1.0){$resultfinal="Segundo critérios de classificação da OMS este exame apresenta-se dentro da normalidade. ";} ?>
