<?php

$nome = $_POST["nome"];
$dnasc = $_POST["dnasc"];
$dexame = $_POST["dexame"];
$sexo = $_POST["sexo"];
$slombar = $_POST["slombar"];
$tslomb = $_POST["tslomb"];
$dmolomb = $_POST["dmolomb"];
$dexame = $_POST["dexame"];
$tscolo = $_POST["tscolo"];
$dmocolo = $_POST["dmocolo"];
$tsft = $_POST["tsft"];
$dmoft = $_POST["dmoft"];

$zslomb = $_POST["zslomb"];
$zscolo = $_POST["zscolo"];
$zsft = $_POST["zsft"];

$empresaselect = $_POST["empresa_id"];
$medico = $_POST["medico"]; 

$comentarios = $_POST["comentarios"]; 
$compara = $_POST['compara'];

$dataant = str_replace("/", "-", $_POST["dataant"]);
$dataanterior = date('d/m/Y', strtotime($dataant));  
  
$dmolombant = $_POST["dmolombant"];
$dmocoloant = $_POST["dmocoloant"];
$dmoftant = $_POST["dmoftant"];

$dnascimento = new DateTime($dnasc);
$dataexame = new DateTime($dexame);
$idade = $dnascimento->diff($dataexame);

$dexame = str_replace("/", "-", $_POST["dexame"]);
$datadoexame = date('d/m/Y', strtotime($dexame));  
?>

<?php 
if ($tslomb <=-2.5){$resultlomb="osteoporose";}
else if ($tslomb>=-1.0){ $resultlomb="normalidade";} 
else {$resultlomb="osteopenia";}
?>

<?php 
if ($tscolo <=-2.5 || $tsft <=-2.5){$resultfemur="osteoporose";}
else if ($tscolo>=-1.0 && $tsft>=-1.0){ $resultfemur="normalidade";} 
else {$resultfemur="osteopenia";}
?>


<?php  if ($tslomb >=-2.5 && $tslomb <-1.0 || $tscolo >=-2.5 && $tscolo <-1.0 || $tsft >=-2.5 && $tsft <-1.0){$resultfinal="O exame preenche os critérios de classificação da OMS para baixa massa óssea - osteopenia.";} ?>

<?php if ($tslomb <=-2.5 || $tscolo <=-2.5 || $tsft <=-2.5){$resultfinal="O exame preenche os critérios de classificação da OMS para osteoporose.";} ?>

<?php if ($tslomb>=-1.0 && $tscolo>=-1.0 && $tsft>=-1.0){$resultfinal="Segundo critérios de classificação da OMS este exame apresenta-se dentro da normalidade. ";} ?>

<?php 
if ($compara == com) {
$diflomb = number_format(($dmolomb - $dmolombant)*100/$dmolombant);
$difcolo = number_format(($dmocolo - $dmocoloant)*100/$dmocoloant);
$difft = number_format(($dmoft - $dmoftant)*100/$dmoftant);}

else {$diflomb = null && $difcolo = null && $difft = null;}
 ?>

<?php 
if ($compara=="com"){$textocompara="A comparação com exame anterior de ".$dataanterior." mostra variação de ".$diflomb."% na coluna lombar " .$difcolo."% no colo e ".$difft. "% no fêmur total.";} 
else {$textocompara="";}
?>
