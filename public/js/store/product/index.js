$(document).ready(function () {
    $(document).on('click', '.btn-update-status', function (e) {
        e.preventDefault();
        let element = $(this);
        showConfimGenericAlert("¿Estas seguro?", "El producto se mostrara en el menu", () => {
            let url = element.data('url');
            $.get(url, (response) => {
                let children = element.children('i')
                if (response.success) {
                    if (children.hasClass('fa-toggle-off')){
                        children.addClass('fa-toggle-on');
                        children.removeClass('fa-toggle-off');
                    } else {
                        children.addClass('fa-toggle-off');
                        children.removeClass('fa-toggle-on');
                    }

                    showSuccessAlert("Correcto", "Datos actualizados correctamente");
                } else {
                    showErrorAlert("Error", "Por el momento no fue posible actualizar la infomación, intente más tarde");
                }
            });
        });
    });
});
