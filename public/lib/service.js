$(function(){
    $("#efetuarLogin").click(function(){

        var dados = $('#formLogin').serialize();

        $.ajax({
            url: "/auth/login", // url da logica que você irá executar
            type:"POST",
            data: dados, // aqui recebe um objeto com quantos parametros voce quiser assim, dados podem ser enviados dinamicamente
            dataType: "JSON"
        }).done(function(result) {

            if(result.success == true){
                window.location.assign(result.redirect);
            }else{
                alert('Usuario ou Senha inválidos');
            }

        }).fail(function(jqXHR,textStatus,errorThrown){ // se der erro entra aqui
            console.log(errorThrown);
        })
    })




    $("#logOut").click(function(){

        $.ajax({
            url: "/auth/logout", // url da logica que você irá executar
            type:"POST",
            dataType: "JSON"
        }).done(function(result) {

            if(result.success == true){
                window.location.assign(result.redirect);
            }else{
                alert('Não foi Possivel executar esta ação');
            }

        }).fail(function(jqXHR,textStatus,errorThrown){ // se der erro entra aqui
            console.log(errorThrown);
        })
    })







});

/**
 * Created by Jef on 04/05/2017.
 */
