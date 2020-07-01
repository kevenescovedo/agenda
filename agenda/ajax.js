(document).ready(function(){
    	
	$.ajax({
		type:'post',		//Definimos o método HTTP usado
		dataType: 'json',	//Definimos o tipo de retorno
		url: 'getdata.php',//Definindo o arquivo onde serão buscados os dados
		success: function(dados){
			for(var i=0;dados.length>i;i++){
				//Adicionando registros retornados na tabela
				$('#').append('<tr><td>'+dados[i].dt_compromisso+'</td><td>'+dados[i].descricao_compromisso+'</td><td>'+dados[i].email+'</td></tr>');
			}
		}
	});
});