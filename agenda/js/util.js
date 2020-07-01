


$(function () {
	'use strict';
    $(document).ready(function(){
        var data = $("#data").val();
		$("#imagemcarregando").show();
        var result = document.getElementById("listagemdecompromissos");
        $.ajax({
            type: "POST",
            url: "listacompromisso.php",
            data: {
                'data': data
            },
            success: function (retorno) {
                // Atribui o retorno HTML para a div correspondente 
                $("#imagemcarregando").hide();
				$(result).html(retorno);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("Não foi possível realizar a busca!");
            }
        });
    });
	
	$("#data").change(function(){
        var data = $("#data").val();
		var result = document.getElementById("listagemdecompromissos");
		$(result).html("");
		$("#imagemcarregando").show();
        $.ajax({
            type: "POST",
            url: "listacompromisso.php",
            data: {
                'data': data
            },
            success: function (retorno) {
                // Atribui o retorno HTML para a div correspondente
				$("#imagemcarregando").hide();
                $(result).html(retorno);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("Não foi possível realizar a busca!");
            }
        });
    });
	
	
});