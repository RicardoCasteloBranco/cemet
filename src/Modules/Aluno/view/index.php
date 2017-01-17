<?php
$ger = new \CasteloBranco\Cemet\Modules\Aluno\Controller\AlunoController();
$dados = $ger->indexAction();
?>
<script type="text/javascript" src="../../../public/jscript/filtro.js"></script>
<table class="sortable" id="tabela">
    <thead>
        <tr>
            <th>Nº</th><th>Nome Completo</th><th>Nome de Guerra</th><th>Matricula</th>
            <th>Cidade</th><th>UF</th><th>Email</th>
            <th>Turma</th><th>Curso</th><th>Situação</th>
            <th>Data de Desligamento</th><th>Ações</th>
        </tr>
        <tr>
            <th></th>
            <th><input type="text" name="txtColuna1" id="filter"></th>
            <th><input type="text" name="txtColuna2" id="filter"></th>
            <th><input type="text" name="txtColuna3" id="filter"></th>
            <th><input type="text" name="txtColuna4" id="filter"></th>
            <th><input type="text" name="txtColuna5" id="filter"></th>
            <th></th>
            <th><input type="text" name="txtColuna6" id="filter"></th>
            <th><input type="text" name="txtColuna7" id="filter"></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados["alunos"] as $row): ?>
        <tr>
            <td><?php echo $row->numeroaluno; ?></td>
            <td><?php echo $row->nome_completo; ?></td>
            <td><?php echo $row->nomeguerra; ?></td>
            <td><?php echo $row->matricula; ?></td>
            <td><?php echo $row->cidade; ?></td>
            <td><?php echo $row->estado; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->turma; ?></td>
            <td><?php echo $row->siglacurso; ?></td>
            <td><?php echo $row->situacao; ?></td>
            <td><?php echo !is_null($row->desligamento)?date("d/m/Y",strtotime($row->desligamento)):NULL; ?></td>
            <td><a href="?module=Aluno&page=edit.php&idaluno=<?php echo $row->idaluno; ?>">Editar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div id="pageNav"></div>
        <script>var pager = new Pager('tabela',10);
            pager.init();
            pager.showPageNav('pager','pageNav');
            pager.showPage(1);
        </script>