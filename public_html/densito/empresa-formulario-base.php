    <?php include "js/viacep.js" ?>

<tr>
    <td>Empresa</td>
    <td><input class="form-control" type="text" name="empresa" value="<?=$empresa['empresa']?>" placeholder="Nome da Empresa"/></td>
</tr>
<tr>
    <td>Cep</td>
    <td><input class="form-control" type="text" id="cep" name="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" value="<?=$empresa['cep']?>" placeholder="Ex: 01225-000" /></td>
</tr>
<tr>
    <td>Rua</td>
    <td><input class="form-control" type="text" id="rua" name="rua" value="<?=$empresa['rua']?>" /></td>
</tr>
<tr>
    <td>Bairro</td>
    <td><input class="form-control" type="text" id="bairro" name="bairro" value="<?=$empresa['bairro']?>" /></td>
</tr>
<tr>
    <td>Cidade</td>
    <td><input class="form-control" type="text" id="cidade" name="cidade" value="<?=$empresa['cidade']?>" /></td>
</tr>
<tr>
    <td>Uf</td>
    <td><input class="form-control" type="text" id="uf" name="uf" value="<?=$empresa['uf']?>" /></td>
</tr>
<tr>
    <td>Contato</td>
    <td><input class="form-control" type="text" name="contato" value="<?=$empresa['contato']?>" placeholder="Ex: Telefones: 13 3448-4564 / 13 4109-2819 - E-mail:laudodensitometria@gmail.com"/></td>
</tr>
<tr>
    <td>Cnpj</td>
    <td><input class="form-control" type="text" name="cnpj" onkeypress="mascara(this, '###.###.###-####-##')" maxlength="19" value="<?=$empresa['cnpj']?>" placeholder="042.344.234-3343-43" /></td>
</tr>
<tr>
    <td>diretor</td>
    <td><input class="form-control" type="text" name="diretor" value="<?=$empresa['diretor']?>" placeholder="Nome do Diretor ou responsavel"/></td>
</tr>

<tr>
    <td>CPF diretor</td>
    <td><input class="form-control" type="text" name="cpfdiretor" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" value="<?=$empresa['cpfdiretor']?>" placeholder="042.344.234-43" /></td>
</tr>
<tr>
    <td>equipamento</td>
    <td><input class="form-control" type="text" name="equipamento" value="<?=$empresa['equipamento']?>" placeholder="Ex: DPX LUNAR"/></td>
</tr>
   
    