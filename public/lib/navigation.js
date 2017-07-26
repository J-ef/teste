/**
 * Created by Jef on 07/05/2017.
 */

$(document).ready(function () {

    $('.menu-anchor').on('click', function (e) {
        e.preventDefault();
        $('html').toggleClass('menu-active');

    });


    $(document).on("click",'.crud_action', function (e) {
        e.preventDefault();
        var action = $(this).data('action');
        $('#'+action).prop('checked', true)
    });



});


