$(function () {
	'use strict';
    $(document).ready(function(){
        var data = $("#data").val();
		$("#imagemcarregando").show();
        var result = document.getElementById("listagemdecompromissos");
        $.ajax({
            type: "POST",
            url: "listacompromissos.php",
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
            url: "listacompromissos.php",
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
	
	$('#cep').blur(function () {
        var Qtdecep = $("#cep").val().replace(/[\*\^\'\!\_\-\,]/g, '').split('').length;
        if (Qtdecep < 8 && Qtdecep != 0) {
            //Diálogo de alerta
            alert("CEP inválido ou não encontrado. Digite um CEP válido para que as informações de endereço possam ser preenchidas automaticamente.");
            $('#cep').val($("#cep").inputmask("99999-999"));
            $('#rua').val('');
            $('#bairro').val('');
            $('#cidade').val('');
            $('#estado option[value="' + data.estado + '"]').attr({ selected: "selected" });
            $('#rua').focus();
        }
        else {
            /* Configura a requisição AJAX */
            $.ajax({
                url: 'consultar_cep.php', /* URL que será chamada */
                type: 'POST', /* Tipo da requisição */
                data: 'cep=' + $('#cep').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function (data) {
                    if (data.sucesso > 0) {
                        $('#rua').val(data.rua);
                        $('#bairro').val(data.bairro);
                        $('#cidade').val(data.cidade);
                        $('#uf option[value="' + data.estado + '"]').attr({ selected: "selected" });
                        $('#numero').focus();
                    }
                }
            });
            return false;
        }
    })
});