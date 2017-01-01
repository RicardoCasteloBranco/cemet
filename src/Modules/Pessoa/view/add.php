<?php
$ger = new \CasteloBranco\Cemet\Modules\Pessoa\Controller\PessoaController();
$dados = $ger->addAction();
$optGroup = 0;
?>
<h2>Usuários</h2>
<form method="post" action="">
    <div>
        <label for="idcargo">Cargo</label>
        <select name="idcargo">
            <option></option>
        <?php foreach ($dados["cargos"] as $opt):?>
        <?php if($opt->idorgao != $optGroup):?>
        <optgroup label="<?php $optGroup = $opt->idorgao; echo $opt->sigla;?>">
        <?php endif; ?>
        <option value="<?php echo $opt->idcargo;?>"><?php echo $opt->cargo;?></option>
        <?php if($opt->idorgao != $optGroup): ?>
        </optgroup>
        <?php endif; ?>
        <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="nome">Nome</label>
        <input type="text" name="nome">
    </div>
    <div>
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" onkeypress="formatar_mascara(this,'###.###.###-##')" id="campo">
    </div>
    <div>
        <label for="senha">Senha</label>
        <input type="password" name="senha">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email">
    </div>
    <div>
        <input type="submit" name="btn_confirma" value="Adiciona">
    </div>
</form>