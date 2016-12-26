/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function verificaExtensao(formulario, arquivo){
    var ext_permitida = ".pdf";
    var permitida = false;
    var erro = "";
    if(!arquivo){
            erro = "Não foi selecionado nenhum arquivo";
    }else{
        extensao = arquivo.substring(arquivo.lastIndexOf("."));
        if(extensao.toLowerCase() === ext_permitida.toLowerCase()){
            permitida = true;
        }
    }
    if(!permitida){
        erro = "Extensões do arquivo permitido.\não podem ser submetidos arquivos do tipo pdf";
    }else{
        formulario.submit();
        return 1;
    }
    alert(erro);
    return 0;
}

