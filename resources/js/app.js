import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: "sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true, //elimanr su imagen
    dictRemoveFile: 'borrar archivo',
    maxFiles: 3,
    uploadMultiple: false,


    init: 
    function functionName(){
        if (document.querySelector("#ocultoinput").value.trim()) {
            const imagenPublicada={};
            imagenPublicada.size = 123;
                imagenPublicada.name = document.querySelector("#ocultoinput").value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');

        }
           
    
    }
});


/* dropzone.on('sending', function (file, xhr, formData) {
    console.log(file);
    
}) */

dropzone.on("success", function (file, response) {
    console.log(response);
    console.log(response.imagen);
    document.querySelector("#ocultoinput").value = response.imagen;
})

dropzone.on("error", function (file, message) {
    console.log(message);
})

dropzone.on("removedfile", function () {
    document.querySelector("#ocultoinput").value = "";
})