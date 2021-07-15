/* INSERIR PRODUTOS */
$(function() {

    $(document).on('click', '.modal_system_open', function() {
        $(".modal_system_open_class").modal("show");
    });
});

function erroMsg(msg) {
    alert(msg);
}