(function () {
    $(document).ready(function () {
        $('#refeicao').formSelect();
        $('#alimentos').formSelect();
        $('.tabs').tabs();
    });

    $('#alimentos').on('contentChanged', function () {
        $(this).formSelect();
    });
})()
