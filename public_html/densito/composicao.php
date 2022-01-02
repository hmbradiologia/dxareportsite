<?php
require_once("banco-empresa.php");
require_once("composicaofuncoes.php");
require_once("banco-usuario.php"); 

$selecionada = $_POST["empresa_id"];
$id = $_POST["empresa_id"];
$empresa = buscaEmpresa($conexao, $id);

$medicoselecionado = $_POST["medico_id"];
$id = $_POST["medico_id"];
$medico = buscaMedico($conexao, $id);

require_once("banco-paciente.php"); 

insereComposicao($conexao, $nome, $sexo, $dnasc, $dexame, $peso, $altura, $imc, $bmc, $dmot, $zstotal, $mmagra, $mapend, $mtotal, $gorduratotal, 
	$gorduraporc, $indgord, $relag, $selecionada);
	?>  


<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/laudo.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?= $nome?></title>
</head>

<body>
	
	<div class="logo">
		<img class="imglogo" src="logos/<?=$empresa['empresa']?>.jpg">
	</div>

	
<div class="identificacao">
		<p><b>NOME :</b> 	<?= $nome ?></br>					
			<b> IDADE:</b> 	<?= $idade->y ?> ANOS</br>
			<b> DATA:</b> 	<?= $datadoexame ?></p>	
</div>

	<h3>COMPOSIÇÃO CORPORAL</h3>

	<div class="tecnica">
		<p>Este exame densitométrico foi realizado pelo método DXA em equipamento <?=$empresa['equipamento']?></br>
		Laudo por telerradiologia seguindo critérios da International Society for Clinical Densitometry (ISCD)</br>
		Comentários: Qualidade técnica do exame adequada. </p></div>

			
		<div class="antropometrico">	
			<p><b>MEDIDAS ANTROPOMÉTRICAS:</b>PESO:<?= $peso ?>: Kg  ALTURA: <?= $altura ?> m  IMC: <?= $imc ?></br>		
			</p>		
			<p><b>Conclusão:</b> De acordo com classificação da Organização Mundial da Saúde, paciente classificado como <?= $resultimc ?></p>
			</div>
			<div class="osseo">	
				<p><b>COMPARTIMENTO ÓSSEO:</b></br>
				Conteúdo Mineral Ósseo Total : <?=$bmc?> g | Densidade mineral óssea Total :<?=$dmot ?> g/cm<sup>2</sup> | Z-score : <?=$zstotal ?> </p>
				<p><b>Conclusão:</b>  Paciente com densidade mineral óssea do corpo inteiro  <?=$resultzstotal ?></p>
			</div>

			<div class="magro">	
			<p><b>COMPARTIMENTO MAGRO:</b></br>
				 Massa magra total : <?= $mmagra?> Kg  | Massa magra apendicular :<?= $mapend?> Kg </br>
				 Índice de massa magra apendicular : <?= $indmmagra?>Kg/m<sup>2</sup> </p>
					<p><b> Conclusão:</b> Paciente com massa magra apendicular <?= $resultindmagra ?></p>
									
			<div class="gordura">	
				<p><b>COMPARTIMENTO ADIPOSO:</b></br>
				
				Gordura corporal total :  <?=$gorduratotal?> Kg | Índice de gordura corporal: <?=$indgord ?> Kg/m<sup>2</sup> </br>
				  %  gordura corporal total :	<?=$gorduraporc ?> % |	Relação A/G: <?= $relag ?> </br>

				<p> <b>Conclusão:</b> Segundo valores de referência paciente classificado com <?= $resultindgordo ?></br>
				<?= $resultrelag ?>		</p>	
			</div>
			
			
			<div class="medico">
					<img class="assinatura" src="assinatura/<?=$medico['medico']?>.jpg">
					<p class="linhaassin">	_______________________________</br>	
					DR. <?=$medico['nomemedico']?>	</br>	
				        <?=$medico['crm']?>	</p>
			</div>
			

		<div class="rodape">
			<p>     _______________________________________________________________________________________	</br>				
				Endereço: <?=$empresa['rua']?> - <?=$empresa['bairro']?>- <?=$empresa['cidade']?>/<?=$empresa['uf']?> - CEP: <?=$empresa['cep']?></br>				
				<?=$empresa['contato']?>						</p>
			</div>
		</div>
	</div>
</body>
</html>
<?php die() ?>