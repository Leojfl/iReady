$(document).ready(function () {
    $('.show-image-file').change(function(){
        const file = this.files[0];
        let input = $(this);
        let showIn = input.data("for");
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            $('#'+showIn).attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
});
