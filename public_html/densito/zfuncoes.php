<?php

$nome = $_POST["nome"];
$dnasc = $_POST["dnasc"];
$dexame = $_POST["dexame"];
$sexo = $_POST["sexo"];
$slombar = $_POST["slombar"];
$zslomb = $_POST["zslomb"];
$dmolomb = $_POST["dmolomb"];
$dexame = $_POST["dexame"];
$zscolo = $_POST["zscolo"];
$dmocolo = $_POST["dmocolo"];
$zsft = $_POST["zsft"];
$dmoft = $_POST["dmoft"];

$tslomb = $_POST["tslomb"];
$tscolo = $_POST["tscolo"];
$tsft = $_POST["tsft"];

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
if ($zslomb <=-2.0){$resultlomb="abaixo do esperado para idade.";}
else if ($zslomb > -2.0){$resultlomb="dentro do esperado para idade.";} 
?>

<?php 
if ($zscolo <=-2.0 || $zsft <=-2.0){$resultfemur="abaixo do esperado para idade.";}
else if ($zscolo >-2.0 && $zsft>-2.0){ $resultfemur="dentro do esperado para idade.";} 
else {$resultfemur="abaixo do esperado para idade.";}
?>


<?php if ($zslomb <=-2.0 || $zscolo <=-2.0 || $zsft <=-2.0){$resultfinal="O exame de densitometria óssea apresenta baixa densidade óssea para a idade cronológica.";} ?>

<?php if ($zslomb>-2.0 && $zscolo>-2.0 && $zsft>-2.0){$resultfinal="O exame de densitometria óssea apresenta-se dentro do esperado para idade.";} ?>

<?php 
if ($compara == com) {
$diflomb = number_format(($dmolomb - $dmolombant)*100/$dmolombant);
$difcolo = number_format(($dmocolo - $dmocoloant)*100/$dmocoloant);
$difft = number_format(($dmoft - $dmoftant)*100/$dmoftant);}

else {$diflomb = null && $difcolo = null && $difft = null;}
 ?>

<?php 
if ($compara=="com"){$textocompara=$textocompara="A comparação com exame anterior de ".$dataanterior." mostra variação de ".$diflomb."% na coluna lombar " .$difcolo."% no colo e ".$difft. "% no fêmur total.";} 
else {$textocompara="";}
?>

