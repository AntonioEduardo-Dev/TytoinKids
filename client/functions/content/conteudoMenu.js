function bodyModalContent(lqtdblocks, limagens, llinks, lsubTitulos) {
    var content = ``;
    
    if (lqtdblocks > 0) {
        for (let index = 0; index < lqtdblocks; index++) {
            content += `<div class="col text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="${llinks[index]}" name="btn_nm_categoria"><img src="client/views/assets/img/menu/${limagens[index]}" alt="" style="width: 200px; height: 200px;"></a>
                                </div>
                                <a href="${llinks[index]}" name="btn_nm_categoria"><h3>${lsubTitulos[index]}</h3></a>
                            </div>
                        </div>`;
        }
    }else{
        content += `<div class="col text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="menu" name="btn_nm_categoria"><img src="client/views/assets/img/menu/img_undefined.png" alt=""></a>
                            </div>
                            <a href="menu" name="btn_nm_categoria"><h3>Cadastrar</h3></a>
                        </div>
                    </div>`;
    }

    return content;
}

/* CONTENT MENU */
$(function() {
    const elementos_menu = [
        {
            "nome"      : "btn_nm_categoria",
            "imagem"    : "image_menu_categoria.png",
            "titulo"    : "Categorias",
            "link"      : "menu/menu"
        },
        {
            "nome"      : "btn_nm_produto",
            "imagem"    : "image_menu_categoria.png",
            "titulo"    : "Produtos",
            "link"      : "menu/menu"
        },
        {
            "nome"      : "btn_nm_encomenda",
            "imagem"    : "image_menu_encomenda.png",
            "titulo"    : "Encomendas",
            "link"      : "menu/menu"
        },
        {
            "nome"      : "btn_nm_usuario",
            "imagem"    : "image_menu_categoria.png",
            "titulo"    : "Usuários",
            "link"      : "menu/menu"
        },
        {
            "nome"      : "btn_nm_mensagem",
            "imagem"    : "image_menu_categoria.png",
            "titulo"    : "Sugestões",
            "link"      : "menu/menu"
        },
        {
            "nome"      : "btn_nm_tamanho_personagem",
            "imagem"    : "image_menu_categoria.png",
            "titulo"    : "Tamanho e Personagem",
            "link"      : "menu/menu"
        }
    ];

    var menu = ``;
    var side_bar = ``;
    
    $(".content-menu-custom").html("");
    $(".ul_itens_menu").html("");

    elementos_menu.forEach((elemento_menu, indice) => {
        
        if (indice === 0) {
            side_bar += `<li class="nav-item teste">
                                <h4>John's Blog</h4>
                        </li>
                        `;
        }

        side_bar += `<li class="nav-item">
                        <a class="nav-link modal_system_open" name="${elemento_menu.nome}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                        ${elemento_menu.titulo}
                        </a>
                    </li>
                    `;
        
        if (indice === 0 || (indice)+1 % 3 === 0) {
            menu += `<div class="row">`;
        }
        menu += `
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="#" onclick="return false;" class="modal_system_open" name="${elemento_menu.nome}"><img src="client/views/assets/img/menu/${elemento_menu.imagem}" alt="" style="width: 200px; height: 200px;"></a>
                            </div>
                            <a href="#" onclick="return false;" class="modal_system_open" name="btn_nm_categoria"><h3>${elemento_menu.titulo}</h3></a>
                        </div>
                    </div>
        `;
        if ((indice)+1 % 3 === 0 && indice != 0) {
            menu += `</div>`;
        }
    });

    $(".content-menu-custom").append(menu);
    $(".ul_itens_menu").append(side_bar);

    $(document).on('click', '.modal_system_open', function() {
        var tipo = $(this).attr('name');

        $('.conteudo').html('');

        switch(tipo) {
            case "btn_nm_categoria":
                var titulo      = "Categorias";
                var qtdblocks   = 2;
                var imagens     = ['image_menu_listar.png', 'image_menu_cadastrar.png'];
                var links       = ['listar/categorias', 'cadastrar/cadastrar_categoria'];
                var subTitulos  = ['Listar', 'Cadastrar'];

                var conteudo = bodyModalContent(qtdblocks, imagens, links, subTitulos);
                break;
            case "btn_nm_produto":
                var titulo      = "Produtos";
                var qtdblocks   = 2;
                var imagens     = ['image_menu_listar.png', 'image_menu_cadastrar.png'];
                var links       = ['listar/produtos','cadastrar/cadastrar_produto'];
                var subTitulos  = ['Listar', 'Cadastrar'];

                var conteudo = bodyModalContent(qtdblocks, imagens, links, subTitulos);
                break;
            case "btn_nm_encomenda":
                var titulo      = "Encomendas";
                var qtdblocks   = 2;
                var imagens     = ['image_menu_listar.png', 'image_menu_listar.png'];
                var links       = ['listar/encomendas','listar/mensagens'];
                var subTitulos  = ['Listar', 'Listar personalizadas'];

                var conteudo = bodyModalContent(qtdblocks, imagens, links, subTitulos);
                break;
            case "btn_nm_usuario":
                var titulo      = "Usuários";
                var qtdblocks   = 1;
                var imagens     = ['image_menu_listar.png'];
                var links       = ['listar/usuarios'];
                var subTitulos  = ['Listar'];

                var conteudo = bodyModalContent(qtdblocks, imagens, links, subTitulos);
                break;
            case "btn_nm_mensagem":
                var titulo      = "Sugestões";
                var qtdblocks   = 1;
                var imagens     = ['image_menu_listar.png'];
                var links       = ['listar/mensagens'];
                var subTitulos  = ['Listar'];

                var conteudo = bodyModalContent(qtdblocks, imagens, links, subTitulos);
                break;
            case "btn_nm_tamanho_personagem":
                var titulo      = "Tamanho e Personagem";
                var qtdblocks   = 2;
                var imagens     = ['image_menu_cadastrar.png','image_menu_cadastrar.png'];
                var links       = ['cadastrar/cadastrar_produto','cadastrar/cadastrar_produto'];
                var subTitulos  = ['Cadastrar personagem', 'Cadastrar tamanho'];

                var conteudo = bodyModalContent(qtdblocks, imagens, links, subTitulos);
                break;
            default:
                var titulo      = "Indefinido";
                var qtdblocks   = 1;
                var imagens     = ['img_undefined.png'];
                var links       = ['menu'];
                var subTitulos  = ['Link Indefinido'];

                var conteudo = bodyModalContent(qtdblocks, imagens, links, subTitulos);
                break;
        }
        var cardHeader = `<div class="card">
                            <div class="card-header">
                                <div class="form-group row">
                                    <div class="col mt-2">
                                        <h4>${titulo}</h4>
                                    </div>
                                    <div class="col mt-3 mr-3">
                                        <h4><a><i class="fas fa-window-close close-btn float-right" data-dismiss="modal"></i></a></h4>
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
});