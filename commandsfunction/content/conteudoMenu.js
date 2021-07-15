/* MENU */
$(function() {

    $(document).on('click', '.modal_system_open', function() {
        var tipo = $(this).attr('name');

        $('.conteudo').html('');

        switch(tipo) {
            case "btn_nm_categoria":
                var titulo = "Categorias";
                var qtdblocks = 2;
                var imagens = ['image_menu.png', 'image_menu.png'];
                var links = ['../create/insert_categories', '../list/categorias'];
                var subTitulos = ['Cadastrar', 'Listar'];

                var conteudo = bodyModalContent(qtdblocks, imagens, links, subTitulos);
                break;
            case "btn_nm_produto":
                var titulo = "Produtos";
                var qtdblocks = 2;
                var imagens = ['image_menu.png', 'image_menu.png'];
                var links = ['../create/insert_products', '../list/produtos'];
                var subTitulos = ['Cadastrar', 'Listar'];

                var conteudo = bodyModalContent(qtdblocks, imagens, links, subTitulos);
                break;
            case "btn_nm_encomenda":
                var titulo = "Encomendas";
                var qtdblocks = 1;
                var imagens = ['image_menu.png'];
                var links = ['../create/insert_products'];
                var subTitulos = ['Cadastrar'];

                var conteudo = bodyModalContent(qtdblocks, imagens, links, subTitulos);
                break;
            default:
                var titulo = "Indefinido";
                var qtdblocks = 1;
                var imagens = ['img_undefined.png'];
                var links = ['menu'];
                var subTitulos = ['Link Indefinido'];

                var conteudo = bodyModalContent(qtdblocks, imagens, links, subTitulos);
                break;
        }
        var cardHeader = `<div class="card">
                            <div class="card-header">
                                <div class="form-group row">
                                    <div class="col mt-2">
                                        <h3>`+titulo+`</h3>
                                    </div>
                                    <div class="col mt-2">
                                        <button type="button" class="btn btn-danger float-right modal_sistem_close">Fechar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mt-5 ml-3 mr-3">`;

        var cardBody = `
                                </div>
                            </div>
                        </div>`;

        var fullCard = cardHeader+conteudo+cardBody;

        $(".conteudo").append(fullCard);

        $('.modal_system_open_class').modal('show')
    });

    $(document).on('click', '.modal_sistem_close', function() {
        $('.modal_system_open_class').modal('hide')
    });

    function bodyModalContent(lqtdblocks, limagens, llinks, lsubTitulos) {
        var content = ``;
        
        if (lqtdblocks > 0) {
            for (let index = 0; index < lqtdblocks; index++) {
                content += `<div class="col text-center">
                                <div class="single-product-item">
                                    <div class="product-image">
                                        <a href="`+llinks[index]+`" name="btn_nm_categoria"><img src="../commandview/assets/img/menu/`+limagens[index]+`" alt=""></a>
                                    </div>
                                    <a href="`+llinks[index]+`" name="btn_nm_categoria"><h3>`+lsubTitulos[index]+`</h3></a>
                                </div>
                            </div>`;
            }
        }else{
            content += `<div class="col text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="menu" name="btn_nm_categoria"><img src="../commandview/assets/img/menu/img_undefined.png" alt=""></a>
                                </div>
                                <a href="menu" name="btn_nm_categoria"><h3>Cadastrar</h3></a>
                            </div>
                        </div>`;
        }

        return content;
    }
});