function cidades(){
    var sel1 = document.getElementById("estado");
    var idEst = sel1.options[sel1.selectedIndex].value;
    $.get("../../Aluno/view/cidades_show.php?idestado="+idEst,function(dados){
        $("#cidade").find("option").remove();
        $("#cidade").append(dados);
    });
    
}
