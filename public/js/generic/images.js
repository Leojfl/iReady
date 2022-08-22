$(document).ready(function () {
    console.log("Entra")
    $('.show-image-file').change(function(){
        const file = this.files[0];
        let input = $(this);
        let showIn = input.data("for");
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#'+showIn).attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
});
