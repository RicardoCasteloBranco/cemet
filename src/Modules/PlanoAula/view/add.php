<?php
$ger = new \CasteloBranco\Cemet\Modules\PlanoAula\Controller\PlanoAulaController();
$dados = $ger->addAction();
?>
<h2>Plano de Aula</h2>
<form method="post" action="">
        <input type="hidden" name="idinstrutor" value="">
    <div>
        <label for="data">Data</label>
        <input type="date" name="data">
    </div>
    <div>
        <label for="qtdaula">Quantidade de Aulas</label>
        <input type="text" name="qtdaula">
    </div>
    <div>
        <label for="idaula">Objetivo</label>
        <select name="idaula" multiple="true">
            <?php foreach($dados["aulas"] as $opt): ?>
            <option value="<?php echo $opt->idaula;?>"><?php echo $opt->objetivo; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="turno">Turno</label>
        <input type="radio" name="turno" value="1">Manhã
        <input type="radio" name="turno" value="2">Tarde
        <input type="radio" name="turno" value="3">Noite
    </div>
    <div>
        <label for="metodologia">Metodologia</label>
        <textarea name="metodologia"></textarea>
    </div>
        <div>
        <label for="meios">Meios</label>
        <textarea name="meios"></textarea>
    </div>
    <div>
        <label for="avaliacao">Avaliação</label>
        <textarea name="avaliacao"></textarea>
    </div>
</form>