/**
 * Created by Jef on 07/05/2017.
 */

    $(document).ready(function () {
        $('.menu-anchor').on('click', function (e) {
            $('html').toggleClass('menu-active');
            e.preventDefault();
        });
    })


$(function() {


     $("#menuOperador").on("click", function () {

         $("#central-content").load("/app/operador/index");

     });



/*
    $("#menuOperador").click(function () {

        //  var dados = $('#formLogin').serialize();

        $.ajax({
            url: "/app/operador/index", // url da logica que você irá executar
            type: "POST",
            data: '', // aqui recebe um objeto com quantos parametros voce quiser assim, dados podem ser enviados dinamicamente
            dataType: "JSON"
        }).done(function (result) {

            if (result.success == true) {
                alert(result.success);
            } else {
                alert('num rolo véeyyy');
            }

        }).fail(function (jqXHR, textStatus, errorThrown) { // se der erro entra aqui
            console.log(errorThrown);
        })
    })
    */

});