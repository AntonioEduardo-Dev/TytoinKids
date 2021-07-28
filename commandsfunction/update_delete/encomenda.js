/* INSERIR PRODUTOS */
$(function() {

    $(document).on('click', '.modal_system_open', function() {
        value = ($(this).attr('name')).split("-|-");

        btn_clicked     = value[0];
        identificador   = value[1];
        
        $(".modal_system_success_class").modal("show");
    });
    
});