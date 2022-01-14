let cep = document.querySelector('#cep');

function atribuirCampos(dados){
    $('#logradouro').val(dados.logradouro);
    $('#cidade').val(dados.localidade);
    $('#estado').val(dados.uf);
    $('#bairro').val(dados.bairro);
    $('#complemento').val(dados.complemento);
}

function buscarEndereco(cep){
    $.ajax({
        url: "https://viacep.com.br/ws/"+cep+"/json/",
        method: "GET",
        data:{},
        success: function(res){
            if(res.error == true){
                alert('O Cep informado não foi encontrado!');
            }
            atribuirCampos(res);
        },
        error: function(){
            alert('O Cep informado não foi encontrado!');
        }
    }
    );
}

$('#cep').on('keyup', e => {
    let tamanho = cep.value.length;

    if(tamanho == 8){
        buscarEndereco(cep.value);
    }
});
