window.showConfimGenericAlert = function(title, text, handleYes, handleNo){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-dark px-4 mx-4',
          cancelButton: 'btn btn-primary px-4 mx-4'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: title,
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            if(handleYes){
                handleYes();
            }
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            if (handleNo){
                handleNo();
            }
        }
      })
}

window.showSuccessAlert = function(title, description) {
    Swal.fire(
        title,
        description,
        'success'
      )
}

window.showErrorAlert = function(title, description) {
    Swal.fire(
        title,
        description,
        'error'
      )
}


