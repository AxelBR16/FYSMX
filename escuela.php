<?php
// Importa la clase Database 
require 'config/database.php';
// Importa configuracion
require 'config/config.php';

// Crea una instancia de la clase Database
$db = new Database();

// Establece la conexión a la base de datos
$con = $db->conectar();
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  

     <!--BoxIcons Link-->
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
                
    <!-- Internas -->
    <link rel="preload" href="css/style.css" as="style">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/sidebar.css">

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
                <a class="text-center iconoText navegacion__enlace" href="">
                    <ion-icon class="ico" name="star"></ion-icon>
                    <p>Valora</p>
                </a>
        </nav>
    </div>
    
    <div class="contenedor-escuelas">
        <div>
        <div class="sidebar">
        <form class="contenedor-escuelas__navegacion" action="" method="GET"><!---->
        <div class="hiding-arrow">
            <i class='bx bx-left-arrow' style='color:#ffffff;'></i>
        </div>

            <div class="logo-details">
                <i class='bx bxs-search-alt-2'></i>
                <span class="logo_name">Busca</span>
            </div>
    
            <ul class="nav-links">
                <li>
                    <div class="icon-links">
                        <a href="#">
                            <i class='bx bxs-location-plus' ></i>
                            <span class="link_name">Ubicacion</span>
                        </a>
                        <i class='bx bx-chevron-down arrow'></i>
                    </div>
    
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Ubicacion</a></li>
                        <li><input type="text" name="CP" placeholder="Codigo Postal" size="10" maxlength="5"></li>
                    </ul>
    
                </li>
    
               
    
                <li>
                    <div class="icon-links">
                        <a href="#">
                            <i class='bx bx-money-withdraw' ></i>
                            <span class="link_name">Pago</span>
                        </a>
                        <i class='bx bx-chevron-down arrow'></i>
                    </div>
    
                    <ul class="sub-menu">
                    <li class="radio">
                        <p>Rango-Precio</p>
                        <input type="radio" name="rango-precio" value="0" id="rango-0"> Ninguno <br>
                        <input type="radio" name="rango-precio" value="1" id="rango-1"> - 1000 <br>
                        <input type="radio" name="rango-precio" value="2" id="rango-2"> 1000 - 2500<br>
                        <input type="radio" name="rango-precio" value="3" id="rango-3"> 2500 - 5000<br>
                        <input type="radio" name="rango-precio" value="4" id="rango-4"> 5000 +
                    </li>

                    </ul>
    
    
                </li>
    
    
                <li>
                    <div class="icon-links">
                        <a href="#">
                            <i class='bx bxs-graduation' ></i>
                            <span class="link_name">Carrera</span>
                        </a>
                        <i class='bx bx-chevron-down arrow'></i>
                    </div>
    
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Area</a></li>
                        <li><select name="Estado">
                                <option value="0">Area</option>
                                <option value="1">Fisico Matematica</option>
                                <option value="2">Quimica</option>
                            </select> 
                        </li>
                    
                        <li><select name="Localidad">
                                <option value="0">Carrera</option>
                                <option value="1">Carrera1</option>
                                <option value="2">Carrera2</option>
                            </select> 
                        </li>
                    </ul>
                </li>
    
                <li>

                    <div class="icon-links">
                        <a href="#">
                            <i class='bx bxs-star-half' ></i>
                            <span class="link_name">Prestigio</span>
                        </a>
                        <i class='bx bx-chevron-down arrow'></i>
                    </div>
    
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Prestigio</a></li>
                        <li>
                            <i class='bx bx-star' ></i>
                            <i class='bx bx-star' ></i>
                            <i class='bx bx-star' ></i>
                            <i class='bx bx-star' ></i>
                            <i class='bx bx-star' ></i>
                        </li>
                    </ul>
                </li>
            </ul>
            </form>
            <?php
                $resultadosPorPagina = 12;

                // Página actual
                if (isset($_GET['pagina'])) {
                    $pagina = $_GET['pagina'];
                } else {
                    $pagina = 1;
                }

                // Calcula el número de filas a saltar (offset)
                $offset = ($pagina - 1) * $resultadosPorPagina;

                // Construye la condición del rango de precios y código postal
                $condicionPrecio = '';
                $condicionCodigoPostal = '';
                if (isset($_GET['rango-precio']) && $_GET['rango-precio'] != '0') {
                    $rangosPrecios = array(
                        '1' => array(0, 1000),
                        '2' => array(1000, 2500),
                        '3' => array(2500, 5000),
                        '4' => array(5000, PHP_INT_MAX)
                    );

                    $selectedRange = $_GET['rango-precio'];
                    $minPrecio = $rangosPrecios[$selectedRange][0];
                    $maxPrecio = $rangosPrecios[$selectedRange][1];

                    $condicionPrecio = ' AND precio BETWEEN :minPrecio AND :maxPrecio';
                }

                if (isset($_GET['CP']) && !empty($_GET['CP'])) {
                    $codigoPostal = $_GET['CP'];
                    $condicionCodigoPostal = ' AND FIND_IN_SET(:codigoPostal, codigosPostales) > 0';
                }

                // Modificar la consulta para obtener el total de filas
                $sqlCount = $con->prepare("SELECT COUNT(*) as total FROM licenciaturas WHERE 1 $condicionPrecio $condicionCodigoPostal");

                // Si hay condición de precio, también vincula los parámetros del rango de precios
                if (!empty($condicionPrecio)) {
                    $sqlCount->bindParam(':minPrecio', $minPrecio, PDO::PARAM_INT);
                    $sqlCount->bindParam(':maxPrecio', $maxPrecio, PDO::PARAM_INT);
                }

                // Si hay condición de código postal, también vincula el parámetro del código postal
                if (!empty($condicionCodigoPostal)) {
                    $sqlCount->bindParam(':codigoPostal', $codigoPostal, PDO::PARAM_STR);
                }

                // Ejecuta la consulta para obtener el total de filas
                $sqlCount->execute();
                $totalFilas = $sqlCount->fetch(PDO::FETCH_ASSOC)['total'];

                // Prepara la consulta SQL con LIMIT, OFFSET y la condición del rango de precios y código postal
                $sql = $con->prepare("SELECT id, nombre, precio, sedes, universidad FROM licenciaturas WHERE 1 $condicionPrecio $condicionCodigoPostal LIMIT :resultadosPorPagina OFFSET :offset");

                $sql->bindParam(':resultadosPorPagina', $resultadosPorPagina, PDO::PARAM_INT);
                $sql->bindParam(':offset', $offset, PDO::PARAM_INT);

                // Si hay condición de precio, también vincula los parámetros del rango de precios
                if (!empty($condicionPrecio)) {
                    $sql->bindParam(':minPrecio', $minPrecio, PDO::PARAM_INT);
                    $sql->bindParam(':maxPrecio', $maxPrecio, PDO::PARAM_INT);
                }

                // Si hay condición de código postal, también vincula el parámetro del código postal
                if (!empty($condicionCodigoPostal)) {
                    $sql->bindParam(':codigoPostal', $codigoPostal, PDO::PARAM_STR);
                }

                // Ejecuta la consulta
                $sql->execute();

                // Obtiene todos los resultados como un array asociativo
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            ?>
            </div>
        </div>
        <main  class="contenedor-escuelas__main">
            <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-<?php echo (count($result) === 1) ? '2' : '3'; ?> g-3">
                <?php
                if (!empty($result)) {
                   foreach($result as $row) {  ?>
                  <div class="col">
                    <div class="card shadow-sm"  style="height: 100%;">
                      <?php
                    $id = $row['id'];
                   
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
                      ?>
                       <img class="img-fluid tam-img-escuelas card-img-top" src="<?php echo $imagen; ?>" alt="<?php echo $id; ?>">
                      <div class="card-body">
                        <h4 class="centrar-texto carrera__titulo"><b><?php echo $row['nombre']; ?></b></h4>
                        <div class="iconoText">
                          <ion-icon class="ico-p carrera__ico" name="wallet-outline"></ion-icon>
                          <small class="text-muted carrera__descripcion">Mensualidad: $
                            <?php echo number_format($row['precio'],2,'.',','); ?> MXN</small>
                        </div>
                        <div class="iconoText escuela__sede">
                          <ion-icon class="ico" name="locate-outline"></ion-icon>
                          <small class="text-muted carrera__descripcion">Sedes:
                                        <?php
                                        // Obtén el texto de $row['sedes']
                                        $texto = $row['sedes'];

                                        // Utiliza una expresión regular para encontrar todos los textos entre asteriscos
                                        preg_match_all('/\*(.*?)\*/', $texto, $coincidencias);

                                        // Verifica si se encontraron coincidencias
                                        if (!empty($coincidencias[1])) {
                                            // Imprime todos los textos encontrados
                                            $totalCoincidencias = count($coincidencias[1]);
                                            $contador = 0;

                                            foreach ($coincidencias[1] as $textoEncontrado) {
                                                echo $textoEncontrado;

                                                // Si no es la última coincidencia, agrega una coma
                                                if (++$contador < $totalCoincidencias) {
                                                    echo ",";
                                                }
                                            }
                                        } else {
                                            // Si no se encontraron coincidencias, puedes imprimir un mensaje o tomar otra acción
                                            echo "No se encontró texto entre asteriscos.";
                                        }
                                        ?>
                          </small>
                        </div>
                        <div class="text-end">
                            <a href="carreras.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1',$row['id'], KEY_TOKEN);  ?>" 
                            class="boton carrera__boton">Ver mas</a>
                        </div>                        
                      </div>
                    </div>
                  </div>
                    <?php } } else {?>
                </div>
                    <p>No se encontraron Registros</p>
                    <img class="img-tam" src="img/triste.jpg" alt="">
                    <?php 
                    }
                    ?>
              </div>
        </main>
    </div>

    <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
    <?php
        // Calcula el número total de páginas
        $totalPaginas = ceil($totalFilas / $resultadosPorPagina);

        // Boton anterior
        if ($pagina > 1) {
            // Verifica si el parámetro 'rango-precio' está definido antes de acceder a él
            $rangoPrecio = isset($_GET['rango-precio']) ? $_GET['rango-precio'] : '';
            $codigoPostal = isset($_GET['CP']) ? $_GET['CP'] : '';

            echo '<li class="page-item"><a class="page-link paginacion__item" href="?pagina=' . ($pagina - 1) . '&rango-precio=' . urlencode($rangoPrecio) . '&CP=' . urlencode($codigoPostal) . '">
            <ion-icon aria-hidden="true" name="caret-back-outline"></ion-icon></a></li>';
        }

        // Enlaces de paginación
        for ($i = 1; $i <= $totalPaginas; $i++) {
            $claseActiva = ($i == $pagina) ? 'paginacion--active' : '';
            $rangoPrecio = isset($_GET['rango-precio']) ? $_GET['rango-precio'] : '0'; // Valor predeterminado de '0'
            $codigoPostal = isset($_GET['CP']) ? $_GET['CP'] : '';
            // Añade los parámetros de filtrado a los enlaces de paginación
            echo '<li class="page-item"><a class="page-link paginacion__item ' . $claseActiva . '" href="?pagina=' . $i . '&rango-precio=' . urlencode($rangoPrecio) . '&CP=' . urlencode($codigoPostal) . '">' . $i . '</a></li>';
        }

        // Botón siguiente
        if ($pagina < $totalPaginas) {
            $rangoPrecio = isset($_GET['rango-precio']) ? $_GET['rango-precio'] : '0'; // Valor predeterminado de '0'
            $codigoPostal = isset($_GET['CP']) ? $_GET['CP'] : '';

            echo '<li class="page-item"><a class="page-link paginacion__item" href="?pagina=' . ($pagina + 1) . '&rango-precio=' . urlencode($rangoPrecio) . '&CP=' . urlencode($codigoPostal) . '">
            <ion-icon name="caret-forward-outline" style="display:absolute; top:3rem;"></ion-icon></a></li>';
        }
    ?>
    </ul>
    </nav>
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
    <!-- Bootsrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--Scrip sidebar-->
    <script src="js/sidebar.js"></script>
    <!-- filtrado -->
    <script src="js/filtrado.js"></script>

</body>
</html>