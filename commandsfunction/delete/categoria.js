/* INSERIR PRODUTOS */
$(function() {

    $(document).on('click', '.modal_system_open', function() {
        value = ($(this).attr('name')).split("-&-");

        btn_clicked     = value[0];
        identificador   = value[1];
        
        if (btn_clicked === "btn_nm_edit") {
            
        }else if (btn_clicked === "btn_nm_remove") {
            $(".conteudo_modal_sm").html('');
            if (true) {
                var conteudo = `<div class="modal-body">
                                    <div class="form-group">
                                        <h3>Sucesso!</h3>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>`;
                $(".conteudo_modal_sm").append(conteudo);
                $(".modal_system_success_class").modal("show");
            }else{
                var conteudo = ``;
                $(".conteudo_modal_sm").append(conteudo);
                $(".modal_system_success_class").modal("show");
            }
        }else{

        }

        
    });

    function exibirModalAlerta() {
    }
    
});