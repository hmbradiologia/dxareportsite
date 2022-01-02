<?php require_once("cabecalho.php");
require_once("banco-empresa.php");
require_once("banco-usuario.php");
require_once("logica-usuario.php");
verificaUsuario();

$empresas = listaEmpresa($conexao);
$medicos = listaMedico($conexao);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset="utf-8">
	<title>Laudo Densitometria</title>
	<link rel="stylesheet" href="css/index.css"/>
</head>

<body>

	<form class="formulario" method="post" id="formulario" action="zscore.php">

		<fieldset>
			<label for="">EMPRESA/CLÍNICA</label>
			<select name="empresa_id" id="empresa_id">
				<?php foreach($empresas as $empresa) :
				$essaEmpresa = $empresa['empresa_id'] == $empresa['id'];
				$selecao = $essaEmpresa ? "selected='selected'" : "";
				?>
				<option value="<?=$empresa['id']?>" <?=$selecao?>>
					<?=$empresa['empresa']?>
				</option>
			<?php endforeach ?>
		</select>
		
	</br>
</fieldset>

<fieldset>
	<label for="">NOME</label><input type="text" id="nome" name="nome" size="30" maxlength="40" placeholder="Nome Completo"> </br>
	<label for="sexo">SEXO: Feminino</label> <input type="radio" id="sexfem" name="sexo" checked value="fem">
	<label for="">Masculino</label> <input type="radio" id="sexmasc" name="sexo" value="masc"></br>
	<label for="">DATA NASCIMENTO </label> <input type="date" id="dnasc" name="dnasc"></br>
	<label for="">DATA DO EXAME </label> <input type="date" id="dexame" name="dexame"></br>
	<p> Sexo feminino < 40 anos Sexo masculino < 50 anos </br> USE TABELA ZSCORE   </p>
</fieldset>

<fieldset>

	<label for="">ZSCORE COLUNA</label>  <input type="number" id="zslomb" name="zslomb" step="0.1" min="-100" max ="100" size="4" maxlength="4" placeholder="ex: -2.8"></br>
	<label for="">DMO COLUNA</label>  <input type="number" id="dmolomb" name="dmolomb" step="0.001" min="-100" max ="100" size="5" maxlength="5" placeholder="ex: 0.823"></br>
	<label for="seglombar">SEGMENTO LOMBAR </label>
	<select name="slombar" id ="seglombar">
		<option selected value="(L1-L4)">(L1 -L4) </option> 
		<option value="(L2-L4)">(L2 -L4)</option>
		<option value="(L3-L4)">(L3 -L4)</option>
		<option value="(L1-L3)">(L1 -L3)</option>
		<option value="(L1-L2)">(L1 -L2)</option>
		<option value="(L2-L3)">(L2 -L3)</option>
	</select>

</fieldset>

<fieldset>
	<label for="">ZSCORE COLO</label>  <input type="number" id="zscolo" name="zscolo" step="0.1" min="-100" max ="100" size="4" maxlength="4" placeholder="ex: -2.8"></br>
	<label for="">DMO COLO</label> <input type="number" id="dmocolo" name="dmocolo" step="0.001" min="-100" max ="100" size="5" maxlength="5" placeholder="ex: -0,835"></br>     
</fieldset>

<fieldset>
	<label for="">ZSCORE FEMUR TOTAL</label> <input type="number" id="zsft" name="zsft" step="0.1" min="-100" max ="100" size="4" maxlength="4" placeholder="ex: -2.8"> </br>
	<label for="">DMO FEMUR TOTAL</label> <input type="number" id="dmoft" name="dmoft" step="0.001" min="-100" max ="100" size="5" maxlength="5" placeholder="ex: -0,835"></br>     
</fieldset>

<fieldset>
	<label for="comentarios">Comentários:</label>
	<select name="comentarios" id ="comentarios">
		<option selected value="Qualidade técnica adequada">Qualidade adequada</option> 
		<option value="Qualidade técnica adequada. Escoliose lombar com convexidade para esquerda.">Escoliose Esquerda</option>
		<option value="Qualidade técnica adequada. Escoliose lombar com convexidade para direita.">Escoliose Direita</option>
		<option value="A definir">A definir</option>
	</select>
</br>
</fieldset>

<fieldset>	
	<label for="compara">Comparação</label>
	<select name="compara" id ="compara">
		<option selected value="sem">Sem exame anterior para comparar</option> 
		<option value="com">Com exame anterior para comparar</option>
	</select>
</fieldset>

<input class="btn btn-primary" type="submit" value="Enviar" /> </br>

<fieldset>
	<label for="">MÉDICO</label>
	<select name="medico_id" id ="medico_id">
		<?php foreach($medicos as $medico) :
				$essemedico = $medico['medico_id'] == $medico['id'];
				$selecao = $essemedico ? "selected='selected'" : "";
				?>
				<option value="<?=$medico['id']?>" <?=$selecao?>>
					<?=$medico['medico']?>
				</option>
			<?php endforeach ?>
		</select></br>
</fieldset>


<fieldset>
	<label for="">DATA DO EXAME ANTERIOR </label> <input type="date" id="dataant" name="dataant"></br>
	<label for="">DMO COLUNA ANTERIOR</label>  <input type="number" id="dmolombant" name="dmolombant" step="0.001" min="-100" max ="100" size="5" maxlength="5" placeholder="ex: -2.8"></br>
	<label for="">DMO COLO ANTERIOR</label> <input type="number" id="dmocoloant" name="dmocoloant" step="0.001" min="-100" max ="100" size="5" maxlength="5" placeholder="ex: -0,835"></br>     
	<label for="">DMO FEMUR ANTERIOR</label> <input type="number" id="dmoftant" name="dmoftant" step="0.001" min="-100" max ="100" size="5" maxlength="5" placeholder="ex: -0,835"></br>  
</fieldset>

<input class="btn btn-primary" type="submit" value="Enviar" /> 

</form>

<?php require_once("rodape.php"); ?>