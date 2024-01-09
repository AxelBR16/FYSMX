
    function actualizarIdLicenciatura() {
        var select = document.getElementById('escuela');
        var idLicenciaturaInput = document.getElementById('id_licenciatura');
        
        // Actualiza el valor del campo oculto con el valor seleccionado en el select
        idLicenciaturaInput.value = select.value;
    }
    function validarFormulario() {
        // Verificar si el captcha ha sido validado
        var response = grecaptcha.getResponse();
        if (response.length === 0) {
            // Si no se ha validado, mostrar un mensaje o hacer algo
            alert("Por favor, complete el captcha antes de enviar el formulario.");
            return false;
        }
    
        // Resto de la validación del formulario
        var opinion = document.getElementById('mensaje').value;
        var calificacion = document.querySelector('input[name="calificacion"]:checked');
        var carrera = document.getElementById('carreras-select').value;
    
        if (opinion.trim() === '' || !calificacion || carrera.trim() === '') {
            alert('Por favor, completa todos los campos antes de enviar el formulario.');
            return false;
        }
    
        // Habilitar el botón de envío
        document.getElementById("enviarBtn").disabled = false;
    
        return true;
    }
    