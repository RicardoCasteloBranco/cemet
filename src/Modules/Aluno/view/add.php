<?php
$ger = new CasteloBranco\Cemet\Modules\Aluno\Controller\AlunoController();
$dados = $ger->addAction();
?>
<form method="post" action="">
    <fieldset class="grupo">
        <label>Dados Pessoais</label>
        <hr>
        <div class="campo">
            <label for="nome">Nome</label>
            <input type="text" name="nome">
        </div>
        <div class="campo">
            <label for="cpf">Cpf</label>
            <input type="text" name="cpf" onkeypress="formatar_mascara(this,'###.###.###-##')">
        </div>
        <div class="campo">
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
    </fieldset>
    <fieldset class="grupo">
        <label>Datas</label>
        <hr>
        <div class="campo">
            <label for="datapraca">Data de Praça</label>
            <input type="date" name="datapraca">
        </div>
        <div class="campo">
            <label for="datanasc">Data de Nascimento</label>
            <input type="date" name="datanasc">
        </div>
    </fieldset>
    <fieldset class="grupo">
    <label>Dados Bancários</label>
        <hr>
        <div class="campo">
            <label for="nomebanco">Banco</label>
            <input type="text" name="nomebanco">
        </div>
        <div class="campo">
            <label for="agencia">Agencia</label>
            <input type="text" name="agencia">
        </div>
        <div class="campo">
            <label for="contacorrente">Conta corrente</label>
            <input type="text" name="contacorrente">
        </div>
    </fieldset>
    <fieldset class="grupo">
    <label>Endereço</label>
        <hr>
        <div class="campo">
            <label for="rua">Endereço</label>
            <input type="text" name="rua">
        </div>
        <div class="campo">
            <label for="uf">UF:</label>
            <select name="uf">
                <option></option>
            </select>
        </div>
        <div class="campo">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade">
        </div>
        <div class="campo">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro">
        </div>
        <div class="campo">
            <label for="pontoreferencia">Ponto de Referência</label>
            <input type="text" name="pontoreferencia">
        </div>
    </fieldset>
    
</form>