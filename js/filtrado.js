document.addEventListener("DOMContentLoaded", function() {
    const searchButton = document.querySelector('.bxs-search-alt-2');
    if (searchButton) {
        searchButton.addEventListener('click', function() {
            // Obtén el formulario y envíalo
            const form = document.querySelector('.contenedor-escuelas__navegacion');
            if (form) {
                form.submit();
            }
        });
    }
});