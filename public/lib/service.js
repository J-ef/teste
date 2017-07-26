$(function(){
    $("#efetuarLogin").click(function(){

        var dados = $('#formLogin').serialize();

        $.ajax({
            url: "/auth/login",
            type:"POST",
            data: dados,
            dataType: "JSON"
        }).done(function(result) {

            alert(result);

            /*
            if(result.success == true){
                window.location.assign(result.redirect);
            }else{
                alert('Usuario ou Senha inválidos');
            }*/

        }).fail(function(jqXHR,textStatus,errorThrown){
            console.log(errorThrown);
        })
    });


    $("#logOut").click(function(){

        $.ajax({
            url: "/auth/logout",
            type:"POST",
            dataType: "JSON"
        }).done(function(result) {

            if(result.success == true){
                window.location.assign(result.redirect);
            }else{
                alert('Não foi Possivel executar esta ação');
            }

        }).fail(function(jqXHR,textStatus,errorThrown){
            console.log(errorThrown);
        })
    });
});

/**
 * Created by Jef on 04/05/2017.
 */
