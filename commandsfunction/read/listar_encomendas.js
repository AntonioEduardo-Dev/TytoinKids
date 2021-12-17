// Exibir dados das encomendas
$(function() {
    const capitalize = (s) => {
        if (typeof s !== 'string') return ''
        return s.charAt(0).toUpperCase() + s.slice(1)
    }

    const verifyColor = (s) => {
        if (s === 'finalizado') return 'success';
        if (s === 'aprovado')   return 'info';
        if (s === 'pendente')   return 'warning';
        if (s === 'recusado')   return 'danger';
    }

    var id_user = $("#id_usuario").val();
    
    if (id_user != "") {
        var dados = {
            btn_listar_encomendas   : true,
            id_usuario              : id_user
        }
    
        $.get('commandscontrol/Encomendas.php', dados, function(retorna) {
            var encomendas = jQuery.parseJSON(retorna);

            $("#tbody_data").html(``);
            encomendas.data.forEach((dados_encomenda, index) => {
                var status = `
                    <td><span class="badge badge-pill badge-${verifyColor(dados_encomenda.status)}">${capitalize(dados_encomenda.status)}</span></td>
                `;

                $("#tbody_data").append(`
                    <tr>
                        <td scope="row">${(index+1)}</td>
                        <td>${dados_encomenda.nome_produto}</td>
                        <td>${dados_encomenda.data_hora}</td>
                        <td>${dados_encomenda.quantidade}</td>
                        ${status}
                        <td>
                            <button class="btn" name="btn_nm_view" alt="Visualizar" value="${dados_encomenda.id_encomenda}" id="btn_view_order">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                `);
            });
        });
    }
});