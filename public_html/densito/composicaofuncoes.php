<?php
$nome = $_POST["nome"];
$dnasc = $_POST["dnasc"];
$dexame = $_POST["dexame"];
$sexo = $_POST["sexo"];
$peso = $_POST["peso"];
$altura = $_POST["altura"];
$bmc = $_POST["bmc"];
$dmot = $_POST["dmot"];
$zstotal = $_POST["zstotal"];
$mmagra = $_POST["mmagra"];
$mapend = $_POST["mapend"];
$mtotal = $_POST["mtotal"];
$gorduratotal = $_POST["gorduratotal"];
$relag = $_POST["relag"];

$empresaselect = $_POST["empresa_id"];
$medico = $_POST["medico"]; 

$dnascimento = new DateTime($dnasc);
$dataexame = new DateTime($dexame);
$idade = $dnascimento->diff($dataexame);

$dexame = str_replace("/", "-", $_POST["dexame"]);
$datadoexame = date('d/m/Y', strtotime($dexame));  
?>

<?php 
$imc = number_format($peso/($altura*$altura),2);
$indmmagra = number_format($mapend/($altura*$altura),2);
$gorduraporc = number_format($gorduratotal/($mtotal)*100,2);
$indgord = number_format($gorduratotal/($altura*$altura),2);
$resultindmagra = "resultado";
?>


<?php /* calculo imc */
if ($imc < 18.5 ){$resultimc="baixo peso";}
else if ($imc >=18.5 && $imc <= 24.99){$resultimc="normalidade";} 
else if ($imc >=25 && $imc <= 29.99){$resultimc="sobrepeso";} 
else if ($imc >=30 && $imc <= 34.99){$resultimc="obesidade grau 1";} 
else if ($imc >=35 && $imc <= 39.99){$resultimc="obesidade grau 2";} 
else if ($imc >=40){ $resultimc="obesidade grau 3";} 
?>

<?php  /* calculo zs */
if ($zstotal <=-2.0){$resultzstotal="abaixo do esperado para idade cronológica.";}
else if ($zstotal > -2.0){$resultzstotal="dentro do esperado para idade cronológica.";} ?>

<?php /* calculo indice massa magra */
if ($sexo =="fem" && $indmmagra <= 5.45){$resultindmagra="abaixo do esperado para o sexo.";}
else if ($sexo =="fem" && $indmmagra > 5.45)  {$resultindmagra="dentro do esperado para o sexo.";} 
else if ($sexo =="masc" && $indmmagra <= 7.26){$resultindmagra="abaixo do esperado para o sexo.";}
else if ($sexo =="masc" && $indmmagra > 7.26) {$resultindmagra="dentro do esperado para o sexo.";}  ?>
	
<?php /* calculo indice gordura masculino*/

if ($sexo =="masc" && $indgord < 2){$resultindgordo="deficit severo de gordura.";}
else if ($sexo =="masc" && $indgord >=2 && $indgord <= 2.3) {$resultindgordo="deficit moderado de gordura.";}
else if ($sexo =="masc" && $indgord >2.3 && $indgord <=3) {$resultindgordo="deficit leve de gordura.";}
else if ($sexo =="masc" && $indgord >3 && $indgord <=6) {$resultindgordo="índice de gordura dentro do esperado.";}
else if ($sexo =="masc" && $indgord >6 && $indgord <=9) {$resultindgordo="sobrepeso.";}
else if ($sexo =="masc" && $indgord >9 && $indgord <=12) {$resultindgordo="obesidade classe I.";}
else if ($sexo =="masc" && $indgord >12 && $indgord <=15) {$resultindgordo="obesidade classe II.";}
else if ($sexo =="masc" && $indgord >15)  {$resultindgordo="obesidade classe III.";}

  /* calculo indice gordura feminino*/
else if ($sexo =="fem" && $indgord < 3.5){$resultindgordo="deficit severo de gordura.";}
else if ($sexo =="fem" && $indgord >=3.5 && $indgord <=4) {$resultindgordo="deficit moderado de gordura.";}
else if ($sexo =="fem" && $indgord >4 && $indgord <=5) {$resultindgordo="deficit leve de gordura.";}
else if ($sexo =="fem" && $indgord >5 && $indgord <=9) {$resultindgordo="índice de gordura dentro do esperado.";}
else if ($sexo =="fem" && $indgord >9 && $indgord <=13) {$resultindgordo="sobrepeso.";}
else if ($sexo =="fem" && $indgord >13 && $indgord <=17) {$resultindgordo="obesidade classe I.";}
else if ($sexo =="fem" && $indgord >17 && $indgord <=21) {$resultindgordo="obesidade classe II.";}
else if ($sexo =="fem" && $indgord >21)  {$resultindgordo="obesidade classe III.";} ?>

<?php /* calculo predominio de gordura */
if ($relag <1.0){$resultrelag="Predomínio de gordura ginóide.";}
else if ($relag >= 1.0){$resultrelag="Predomínio de gordura andróide.";}
?>
