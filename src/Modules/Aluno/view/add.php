<?php
$ger = new CasteloBranco\Cemet\Modules\Aluno\Controller\AlunoController();
$dados = $ger->addAction();
?>
<h2>Cadastro de Alunos</h2>
<form method="post" action="">
    <fieldset>
        <legend>Dados Pessoais</legend>
        <hr>
        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome">
        </div>
        <div>
            <label for="estadocivil">Estado civil:</label>
            <select name="estadocivil">
                <?php foreach($dados["estado_civil"] as $opt):?>
                <option value="<?php echo $opt->idestadocivil ?>"><?php echo $opt->estado_civil ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="genero">Gênero</label>
            <select form="genero">
                <?php foreach($dados["genero"] as $opt):?>
                <option value="<?php echo $opt->idgenero ?>"><?php echo $opt->genero ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="qtddependentes">Qtd de Dependentes</label>
            <input type="text" name="qtddependentes">
        </div>
    </fieldset>
    <fieldset>
        <legend>Filiação</legend>
        <div>
            <label for="pai">Nome do Pai:</label>
            <input type="text" name="pai">
        </div>
        <div>
            <label for="mae">Nome da mãe</label>
            <input type="text" name="mae">
        </div>
    </fieldset>
    <fieldset>
        <legend>Documentos Pessoais</legend>
        <div>
            <label for="identidadecivil">RG Civil</label>
            <input type="text" name="identidadecivil">
        </div>
        <div>
            <label for="orgaoexpedidoridcivil">Orgão Expedidor/UF:</label>
            <input type="text" name="orgaoexpedidoridcivil">
        </div>
        <div>
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" onkeypress="formatar_mascara(this,'###.###.###-##')">
        </div>
        </fieldset>
        <fieldset>
        <div>
            <label for="renach">Renach</label>
            <input type="text" name="renach">
        </div>
        <div>
            <label for="validadehabilitacao">Validade da Habilitação</label>
            <input type="text" name="validadehabilitacao">
        </div>
        <div>
            <label for="categoria">Categoria</label>
            <input type="checkbox" name="categoria" value="A">A
            <input type="checkbox" name="categoria" value="B">B
            <input type="checkbox" name="categoria" value="C">C
            <input type="checkbox" name="categoria" value="D">D
            <input type="checkbox" name="categoria" value="E">E
        </div>
        </fieldset>
    <fieldset>
        <legend>Datas</legend>
        <hr>
        <div>
            <label for="datapraca">Data de Praça</label>
            <input type="date" name="datapraca">
        </div>
        <div>
            <label for="datanasc">Data de Nascimento</label>
            <input type="date" name="datanasc">
        </div>
    </fieldset>
    <fieldset>
        <legend>Dados Bancários</legend>
        <hr>
        <div>
            <label for="nomebanco">Banco</label>
            <input type="text" name="nomebanco">
        </div>
        <div>
            <label for="agencia">Agencia</label>
            <input type="text" name="agencia">
        </div>
        <div>
            <label for="contacorrente">Conta corrente</label>
            <input type="text" name="contacorrente">
        </div>
    </fieldset>
    <fieldset>
        <legend>Endereço</legend>
        <hr>
        <div>
            <label for="rua">Endereço</label>
            <input type="text" name="rua">
        </div>
        <div>
            <label for="uf">UF:</label>
            <select name="uf">
                <option></option>
                <?php foreach($dados["estados"] as $opt):?>
                <option value="<?php echo $opt->idestado ?>"><?php echo $opt->uf ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="cidade">Cidade</label>
            <select name="cidade">
                <option></option>
                <?php foreach($dados["cidades"] as $opt):?>
                <option value="<?php echo $opt->idcidade ?>"><?php echo $opt->nome ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro">
        </div>
        <div>
            <label for="pontoreferencia">Ponto de Referência</label>
            <input type="text" name="pontoreferencia">
        </div>
    </fieldset>
    <fieldset>
        <legend>Formação</legend>
        <div>
            <label for="graudeinstrucao">Grau de Instrução</label>
            <select name="graudeinstrucao">
                <?php foreach($dados["grau_instrucao"] as $opt):?>
                <option value="<?php echo $opt->idgrauinstrucao ?>"><?php echo $opt->grau_instrucao ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="curso_formacao">Curso:</label>
            <select name="curso_formacao">
                <option></option>
                <?php foreach($dados["cursos"] as $opt):?>
                <option value="<?php echo $opt->idcursosfora ?>"><?php echo $opt->nome_curso; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </fieldset>
    <fieldset>
        <legend>Vestimentas</legend>
        <hr>
        <div>
            <label for="camisa">Camisa</label>
            <select name="camisa">
                <option></option>
            </select>
        </div>
        <div>
            <label for="calca">Calça</label>
            <select name="calca">
                <option></option>
            </select>
        </div>
        <div>
            <label for="calcado">Calçado</label>
            <select name="calcado">
                <option></option>
            </select>
        </div>
        <div>
            <label for="cobertura">Cabeça</label>
            <select name="cobertura">
                <option></option>
            </select>
        </div>
    </fieldset>
    <fieldset>
        <legend>Contato</legend>
        <hr>
        <div>
            <label for="telefone">Telefone Residencial</label>
            <input type="tel" name="telefone">
        </div>
        <div>
            <label for="celular">Telefone Celular</label>
            <input type="tel" name="celular">
        </div>
        <div>
            <label for="telefonecontato">Telefone de Contato</label>
            <input type="tel" name="telefonecontato">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
    </fieldset>
    <fieldset>
        <div>
            <input type="submit" name="btn_confirma" value="Adiciona">
        </div>
    </fieldset>
</form>