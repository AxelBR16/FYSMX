<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new mysqli("localhost", "root", "", "fysmx");
    if ($db->connect_error) {
        die("Error de conexión: " . $db->connect_error);
    }

    // Obtención de los datos del formulario
    $opinion = isset($_POST["opinion"]) ? $_POST["opinion"] : "";
    $calificacion = isset($_POST["calificacion"]) ? $_POST["calificacion"] : "";
    $nombre_licenciatura = isset($_POST["nombre_licenciatura"]) ? $_POST["nombre_licenciatura"] : "";

    // Validación y sanitización de los datos
    $opinion = filter_var($opinion, FILTER_SANITIZE_STRING);
    $calificacion = filter_var($calificacion, FILTER_SANITIZE_NUMBER_INT);
    $nombre_licenciatura = filter_var($nombre_licenciatura, FILTER_SANITIZE_STRING);

    // Búsqueda del id de la licenciatura
    $query1 = "SELECT id
    FROM licenciaturas
    WHERE nombre = '{$nombre_licenciatura}';";
    $resultado = $db->query($query1);

    // Obtención del id
    $id_licenciatura = $resultado->fetch_assoc()['id'];

    // Preparación de la consulta SQL
    $query = "INSERT INTO opiniones (opinion, calificacion, id_licenciatura, fecha_creacion) VALUES (?, ?, ?, CURRENT_TIMESTAMP)";
    $stmt = $db->prepare($query);

    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt === false) {
        die('Error de preparación: ' . $db->error);
    }

    // Vinculación de los valores
    $stmt->bind_param("ssi", $opinion, $calificacion, $id_licenciatura);

    // Ejecución de la consulta
    $resultado = $stmt->execute();

    // Envío de comentarios al usuario
    if ($resultado) {
        // Comentarios exitosos
        echo '<script>
                window.onload = function() {
                    alert("Gracias por tu opinión. Se ha guardado correctamente.");
                };
            </script>';
    } else {
        // Comentarios fallidos
        echo '<script>
        window.onload = function() {
            alert("Hubo un error al guardar la opinión. Por favor, vuelve a intentarlo.");
        };
        </script>';
    }

    // Cierre de la conexión a la base de datos
    $stmt->close();
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sitio Web informativo para escuelas privadas en la CDMX">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>FYSMX</title>
    <!-- Prefetch -->
    
    <!-- Preload (lo que se cargue primero)-->
    <!-- Internas -->
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">

    <!-- Externas -->
    <link rel="preload" href="https://db.onlinewebfonts.com/c/240a7cb10b49b02c94ceddc459d385a9?family=Gagalin-Regular" as="style">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" crossorigin="anonymous" as="style">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/brutus-academy" rel="stylesheet">
    
    
                
   
                
    <!-- Internas -->
    <link rel="preload" href="css/style.css" as="style">
    <link rel="stylesheet" href="css/style.css">

    <!-- Internas -->
    <link rel="preload" href="css/valora.css" as="style">
    <link rel="stylesheet" href="css/valora.css">
</head>
<body>
    <header>
            <div class="contenedor barra">
                <div class="barraR">
                    <ion-icon id="btn-menu" class="ico" name="menu-outline"></ion-icon>
                    <a class="logo" href="index.html" >
                        <img class="logo__img" src="./img/logo.svg" alt="logoImagen"width="135" height="100">
                        <h1 class="logo__nombre">FYSM<span class="logo__x">X</span></h1>
                    </a>
                </div>
                <nav class="navegacion">
                        <a class="text-center iconoText  navegacion__enlace" href="index.html">
                            <ion-icon class="ico" name="home-sharp"></ion-icon>
                            <p>Inicio</p>
                        </a>
                        <a class="text-center iconoText  navegacion__enlace" href="escuela.php">
                            <ion-icon class="ico" name="school-sharp"></ion-icon>
                            <p>Escuelas</p>
                        </a>
                        <a class="text-center iconoText navegacion__enlace" href="valora.php">
                            <ion-icon class="ico" name="star"></ion-icon>
                            <p>Valora</p>
                        </a>
                </nav>
            </div>
    </header>

    <section class="contenedor valora">
        <div class="text-center iconoText">
            <ion-icon class="ico" name="star"></ion-icon>
            <h3 class="centrar-texto">Valora Licenciaturas</h3>
        </div>
        <div class="contacto-bg"></div>
        <form id="1" class="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return validarFormulario() ">
            <div class="campo iconoText">
                <ion-icon class="ico" name="school"></ion-icon>
                <label class="campo__label" for="carrera">Carrera:</label>
                <select id="carreras-select" class="campo__field" name="nombre_licenciatura" onchange="actualizarIdLicenciatura()">
                </select>
            </div>
            <!-- Otros campos de formulario -->
            <div class="campo iconoText">
                <ion-icon class="ico" name="help-outline"></ion-icon>
                <label class="campo__label" for="mensaje">Opinion:</label>
                <textarea class="campo__field campo__field--textarea" id="mensaje" name="opinion"></textarea>
            </div>
            <div class="campo iconoText">
                <ion-icon class="ico" name="star"></ion-icon>
                <label for="calificacion">Calificación:</label>
                <div class="star-rating">
                    <input class="radio" type="radio" name="calificacion" id="star5" value="5" />
                    <label for="star5"></label>
                    <input type="radio" name="calificacion" id="star4" value="4" />
                    <label for="star4"></label>
                    <input type="radio" name="calificacion" id="star3" value="3" />
                    <label for="star3"></label>
                    <input type="radio" name="calificacion" id="star2" value="2" />
                    <label for="star2"></label>
                    <input type="radio" name="calificacion" id="star1" value="1" />
                    <label for="star1"></label>
                </div>
            </div>
            <div class="campo">
                <div class="g-recaptcha campo__reCAPTCHA" data-sitekey="6LfQuTQpAAAAAMdhOs72aogdADFsA0v1bbp2Wy_A"></div>
            </div> 
            <div class="campo">
                <input type="submit" value="Enviar" class="boton campo__reCAPTCHA">
            </div>        
        </form>
    </section>

    <footer >
        <div style="height: 150px; overflow: hidden; position: relative;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-0.00,49.85 C150.00,149.60 271.37,-49.85 500.00,49.85 L500.00,0.00 L-0.00,0.00 Z" style="stroke: none; fill: #a5f3fc;"></path></svg></div>
            <div class="contenedor-footer">
                
                <section class="f-logo">
                    <div class="f-text">
                        <p>© 2023</p>
                    </div>  
                </section>
        
                <section>
                    <div class="f-contactos">
                        <img class="footer__logo img-fluid" src="img/logoP.svg" alt="">
                    </div>
                </section>

                
                <section class="f-sobre--comp">
                    <div class="redes">
                        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                        <svg style="margin-bottom: 1rem;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                        </svg>
                        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-linkedin"></ion-icon></a>
                    </div>
                </section>

            </div>
    </footer>

    <!-- Script Iconos -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <!-- Script  Responsive-->
    <script src="js/menuR.js"></script>
    <!-- Script  soporte Webp-->
    <script src="js/imagenWebp.js"></script>
    <!-- Script recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Script desplegable -->
    <script src="js/dCarreras.js"></script>

    <script src="js/r.js"></script>
</body>
</html>