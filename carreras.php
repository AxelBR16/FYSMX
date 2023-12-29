<?php
// Importa la clase Database si no lo has hecho ya
require 'config/database.php';

//Importa configuracion
require 'config/config.php';

// Crea una instancia de la clase Database
$db = new Database();

// Establece la conexión a la base de datos
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] :'';
$token = isset($_GET['token']) ? $_GET['token'] :'';

if ($id == ''  || $token == '') {
    echo '<h1 style="text-align: center; background-color: #f9bbbb; padding: 30px;">Error al procesar la petición :(</h1>';
    exit;
} else {
    $token_tmp = hash_hmac('sha1',$id,KEY_TOKEN);
    if($token_tmp == $token) {
        // Prepara la consulta SQL (puedes corregir el error en la columna "codigoPostal" repetido)
        $sql = $con->prepare('SELECT count(id) FROM licenciaturas WHERE id=?');

        // Ejecuta la consulta
        $sql->execute([$id]);
        if($sql->fetchColumn() > 0) {

            $sql = $con->prepare('SELECT nombre, precio, descripcionC, planEstudios, procesoAdmision, sedes FROM licenciaturas WHERE id=?
            LIMIT 1');
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $precio = $row['precio'];
            $descripcionC = $row['descripcionC'];
            $planEstudios = $row['planEstudios'];/**/ 
            $procesoAdmision = $row['procesoAdmision'];
            $sedes = $row['sedes'];
        
            $directorio = "img/escuelas/" . $id . "/";
            $extensiones = ['jpg', 'jpeg', 'png', 'gif'];

            $imagen = null;

            foreach ($extensiones as $extension) {
                $posibleImagen = $directorio . "principal." . $extension;
                
                if (file_exists($posibleImagen)) {
                    $imagen = $posibleImagen;
                    break;
                }
            }
             if(!file_exists($imagen)) {
                      $imagen = "img/escuelas/noFoto.png";
                    }

            
            //codigo prueba
        
        function area($planEstudios){
            // Inicializar variables para almacenar las áreas y las licenciaturas            
            $areas = [];
            $licenciaturas = '';

            // Iterar sobre los resultados de la consulta

                // Dividir la cadena por asteriscos "*"
                $datosAreas = explode('*', $planEstudios);

                // Iterar sobre las áreas encontradas
                for ($i = 1; $i < count($datosAreas); $i += 2) {
                    $area = trim($datosAreas[$i]);

                    // Verificar si el área actual es diferente a la anterior
                    if (!in_array($area, $areas)) {
                        //cerrar el Div anterior si existe
                        if(!empty($licenciaturas)){
                            echo"</ul></div>";
                        }
                        // Imprimir el encabezado <h2> para el área
                        echo "<div class='contenido_periodo'>";
                        echo "<h4>$area</h4>";
                        echo "<ul>"; // Iniciar la lista <ul>
                        $areas[] = $area; // Agregar el área actual al array
                    }

                    // Obtener las licenciaturas
                    if ($i + 1 < count($datosAreas)) {
                        $licenciaturas = trim($datosAreas[$i + 1]);
                        // Dividir las licenciaturas por coma y crear <li> para cada una
                        $licenciaturasArray = explode(',', $licenciaturas);
                        foreach ($licenciaturasArray as $lic) {
                            echo "<li>$lic</li>";
                        }
                    }
               // echo "</ul>";
                }
                // Cerrar el último div y la última lista
                if (!empty($licenciaturas)) {
                    echo "</ul></div>";
                }
        }
            
    //FIN CODIGO PRUEBA


            
        } 


    } else {
        echo '<h1 style="text-align: center; background-color: #f9bbbb; padding: 30px;">Error al procesar la petición :(</h1>';
        exit;
    }    

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
    <!--BoxIcons Link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Preload (lo que se cargue primero)-->
    <!-- Internas -->
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">

    <!-- Externas -->
    <link rel="preload" href="https://db.onlinewebfonts.com/c/240a7cb10b49b02c94ceddc459d385a9?family=Gagalin-Regular" as="style">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" crossorigin="anonymous" as="style">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/brutus-academy" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    
    
                
   
                
    <!-- Internas -->
    <link rel="preload" href="css/style.css" as="style">
    <link rel="stylesheet" href="css/style.css">

    <link rel="preload" href="css/carreras.css" as="style">
    <link rel="stylesheet" href="css/carreras.css">


</head>
       
<body>
    <div class="contenedor barra sticky">
        <div class="barraR">
            <ion-icon id="btn-menu" class="ico" name="menu-outline"></ion-icon>
            <a class="logo" href="index.html" >
                <img class="logo__img" src="./img/logo.svg" alt="logoImagen" width="135" height="100">
                <h1 class="logo__nombre">FYSM<span class="logo__x">X</span></h1>
            </a>
        </div>
        <nav class="navegacion">
                <a class="text-center iconoText navegacion__enlace" href="index.html">
                    <ion-icon class="ico" name="home-sharp"></ion-icon>
                    <p>Inicio</p>
                </a>
                <a class="text-center iconoText navegacion__enlace" href="escuela.php">
                    <ion-icon class="ico" name="school-sharp"></ion-icon>
                    <p>Escuelas</p>
                </a>
                <a class="text-center iconoText navegacion__enlace" href="valora.html">
                    <ion-icon class="ico" name="star"></ion-icon>
                    <p>Valora</p>
                </a>
        </nav>
    </div>
        <main>
            <div class="contenedor">
                <h2 class="detalles__titulo"><?php echo $nombre; ?></h2>
                <div>
                <img  class="img-fluid detalles__imagen" src="<?php echo $imagen; ?>" alt="">
                    <p><?php echo $descripcionC; ?></p>
                    <br>

                    <div class="servicios">

                        <section class="servicio">
                            <h3>Costo</h3>
                                <div class="iconos">
                                    <i class='bx bx-money'></i>
                                </div>
                                <p>Esta carrera tiene una mensualidad de $ <?php echo number_format($row['precio'],2,'.',','); ?> MXN.</p>

                        </section>



                        <section class="servicio sede">

                            <h3>Sedes</h3>
                            
                                <div class="iconos">
                                    <i class='bx bxs-school' ></i>
                                </div>
                                
                                <p><?php echo $sedes;?></p>    
                        </section>
                    </div><!--Servicios-->

                    <br>

                    <div class="planestudios">
                        <h3>Plan de estudios</h3>
                        <div class="periodos">
                        <?php area($planEstudios);?>
                        </div>   
                    </div>
                                        
                    <br>
                    <h3>Proceso para ingresar</h3>
                    <p><?php echo $procesoAdmision;?></p>
                    <br>
                </div>
             </div><!--.contenedor -->
        </main>
    </div>
    
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>