<?php
$ger = new \CasteloBranco\Cemet\Modules\Pessoa\Controller\PessoaController();
$dados = $ger->indexAction();
?>
<h2>Usuários</h2>
<table class="sortable">
    <thead>
        <tr>
            <th>Cargo</th><th>Orgão</th><th>Nome</th><th>Cpf</th><th>Email</th><th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados["pessoas"] as $row): ?>
        <tr>
            <td><?php echo $row->cargo; ?></td>
            <td><?php echo $row->sigla;?></td>
            <td><?php echo $row->nome;?></td>
            <td><?php $cpf = str_split($row->cpf,3); echo $cpf[0].".".$cpf[1].".".$cpf[2]."-".$cpf[3];?></td>
            <td><?php echo $row->email?></td>
            <td><a href="?module=Pessoa&page=edit.php&idpessoa=<?php echo $row->idpessoa;?>">Editar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>