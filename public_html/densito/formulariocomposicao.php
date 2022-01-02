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

	<form class="formulario" method="post" id="formulario" action="composicao.php">

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
</fieldset>

<fieldset>

	<label for="">PESO (kg)</label>  <input type="number" id="peso" name="peso" step="0.1" min="0" max ="400" size="4" maxlength="4" placeholder="ex: 80"></br>
	<label for="">ALTURA (m) </label>  <input type="number" id="altura" name="altura" step="0.01" min="0" max ="3" size="4" maxlength="4" placeholder="ex: 1.70"></br>
	
</fieldset>

<fieldset>
	<label for="">Conteúdo Mineral Ósseo Total BMC</label>  <input type="number" id="bmc" name="bmc" step="0.001" min="-100" max ="10000" size="4" maxlength="4" placeholder="ex: 3,140"></br>
	<label for="">Densidade mineral óssea Total DMO</label> <input type="number" id="dmot" name="dmot" step="0.001" min="-100" max ="10000" size="5" maxlength="5" placeholder="ex: 1,345"></br>     
	<label for="">ZSCORE TOTAL</label> <input type="number" id="zstotal" name="zstotal" step="0.1" min="-100" max ="100" size="4" maxlength="4" placeholder="ex: -2.8"> </br>
	</fieldset>

<fieldset>

	<label for="">Massa magra total (kg)</label>  <input type="number" id="mmagra" name="mmagra" step="0.1" min="0" max ="500" size="4" maxlength="4" placeholder="ex: 80"></br>
	<label for="">Massa magra apendicular (kg)</label>  <input type="number" id="mapend" name="mapend" step="0.1" min="0" max ="500" size="4" maxlength="4" placeholder="ex: 70"></br>
	
</fieldset>


<fieldset>
	<label for="">Massa Total (kg) </label>  <input type="number" id="mtotal" name="mtotal" step="0.1" min="-100" max ="500" size="5" maxlength="5" placeholder="ex: 1.70"></br>
	<label for="">Gordura corporal total (kg) </label>  <input type="number" id="gorduratotal" name="gorduratotal" step="0.1" min="0" max ="400" size="4" maxlength="4" placeholder="ex: 80"></br>	
	<label for=""> Relação A/G: </label>  <input type="number" id="realag" name="relag" step="0.01" min="-100" max ="100" size="5" maxlength="5" placeholder="ex: 1.70"></br>
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

</form>

<?php require_once("rodape.php"); ?>