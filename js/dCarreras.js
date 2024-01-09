document.addEventListener('DOMContentLoaded', function () {
    // Obtén el select de carreras
    const carrerasSelect = document.getElementById('carreras-select');

    // Realizar una solicitud AJAX para obtener las carreras desde el servidor PHP
    fetch('config/get_carreras.php')
        .then(response => response.json())
        .then(carreras => {
            // Agrega cada carrera como una opción en el select
            carreras.forEach(carrera => {
                const option = document.createElement('option');
                option.value = carrera.nombre; // Puedes usar otra propiedad si es necesario
                option.textContent = carrera.nombre;
                carrerasSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error al obtener las carreras:', error));
});

function actualizarIdLicenciatura() {
    var select = document.getElementById('escuela');
    var idLicenciaturaInput = document.getElementById('id_licenciatura');
    
    // Actualiza el valor del campo oculto con el valor seleccionado en el select
    idLicenciaturaInput.value = select.value;
}
