<?php
$ger = new \CasteloBranco\Cemet\Modules\Pessoa\Controller\PessoaController();
$dados = $ger->editAction();
$user = $dados["pessoa"];
$optGroup = 0;
?>
<h2>Usuários</h2>
<form method="post" action="">
    <input type="hidden" name="idpessoa" value="<?php echo $user->getIdPessoa() ?>">
    <div>
        <label for="idcargo">Cargo</label>
        <select name="idcargo">
            <option></option>
        <?php foreach ($dados["cargos"] as $opt):?>
        <?php if($opt->idorgao != $optGroup):?>
        <optgroup label="<?php $optGroup = $opt->idorgao; echo $opt->sigla;?>">
        <?php endif; ?>
        <option value="<?php echo $opt->idcargo;?>"
                <?php if($user->getIdCargo() == $opt->idcargo):?>
                selected="true"
                <?php endif;?>
                ><?php echo $opt->cargo;?></option>
        <?php if($opt->idorgao != $optGroup): ?>
        </optgroup>
        <?php endif; ?>
        <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="nome">Nome</label>
        <input type="text" name="nome" value="<?php echo $user->getNome() ?>">
    </div>
    <div>
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" value="<?php echo $user->getCpf(); ?>" onkeypress="formatar_mascara(this,'###.###.###-##')" id="campo">
    </div>
    <div>
        <label for="senha">Senha</label>
        <input type="password" name="senha">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $user->getEmail();?>">
    </div>
    <div>
        <label for="confirma">Confirma</label>
        <input type="radio" name="confirma" value="0" <?php if($user->getConfirma() == 0): ?>checked="true" <?php endif; ?>>Não
        <input type="radio" name="confirma" value="1" <?php if($user->getConfirma() == 1): ?>checked="true" <?php endif; ?>>Sim
    </div>
    <div>
        <input type="submit" name="btn_confirma" value="Atualiza">
    </div>
</form>