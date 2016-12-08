$(function () {
    $(".mask-data").mask("99/99/9999");
    $(".mask-hora").mask("99:99");
    $(".mask-telefone").mask("(99) 99999-9999");
    $(".mask-cnpj").mask('99.999.999/9999-99', {reverse: true});
    $('.mask-cep').mask('99999-999');
    $(".mask-cpf").mask("999.999.999-99");
    $(".mask-rg").mask("999.999.999");

    $('#close-alert').click(function () {
        $('.alert').slideUp();
    });

    $(".input-file").fileinput({
        showUpload: false,
        layoutTemplates: {
            main1:  "<div class=\'input-group {class}\'>\n" +
                    "   <div class=\'input-group-btn\'>\n" +
                    "       {browse}\n" +
                    "       {upload}\n" +
                    "       {remove}\n" +
                    "   </div>\n" +
                    "   {caption}\n" +
                    "</div>"
        }
    });
});