document.getElementById("title").addEventListener('keyup', slugChange);

function slugChange() {

    title = document.getElementById("title").value;
    document.getElementById("slug").value = slug(title);

}

function slug(str) {
    var $slug = '';
    var trimmed = str.trim(str);
    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
        replace(/-+/g, '-').
        replace(/^-|-$/g, '');
    return $slug.toLowerCase();
}


document.addEventListener('DOMContentLoaded', () => {
    const descriptionElement = document.querySelector('#description');

    if (descriptionElement) {
        ClassicEditor
            .create(descriptionElement, {
                // Personalización de la barra de herramientas
                toolbar: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'blockQuote',

                ]
                // Al omitir 'link', 'uploadImage', 'insertTable' o 'mediaEmbed', se excluyen de la interfaz.
            })
            .then(editor => {
                console.log('CKEditor 5 personalizado correctamente');
            })
            .catch(error => {
                console.error('Error al inicializar CKEditor:', error);
            });
    }
});

//Cambiar imagen
document.getElementById("file").addEventListener('change', cambiarImagen);

function cambiarImagen(event) {
    var file = event.target.files[0];

    var reader = new FileReader();
    reader.onload = (event) => {
        document.getElementById("picture").setAttribute('src', event.target.result);
    };

    reader.readAsDataURL(file);
}