<?php
$ger = new CasteloBranco\Cemet\Modules\Curso\Controller\CursoController();
$dados = $ger->indexAction();
?>
<h2>Cursos</h2>
<table class="sortable" id="tabela">
    <thead>
        <tr>
            <th>Curso</th><th>Sigla</th><th>Orgão</th><th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados["cursos"] as $row): ?>
        <tr>
            <td><?php echo $row->nomecurso; ?></td>
            <td><?php echo $row->siglacurso; ?></td>
            <td><?php echo $row->sigla; ?></td>
            <td>
                <a href="?module=Companhia&page=show.php&idcurso=<?php echo $row->idcurso; ?>">Companhias</a>
            </td>
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