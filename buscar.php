<?php
    include './config.php';
    //$con = connect();

    $texto_buscado= "";
    $lista_resultados = array();
    if(isset($_GET["busqueda"])){
        $texto_buscado = $_GET["busqueda"];

        $sql = "SELECT * FROM sets WHERE name LIKE '%" . $texto_buscado . "%'";
        $resultado_query = mysqli_query(connect(), $sql);
        //mysqli_query es un objeto iterable de la consulta, entida que podemos iterar como un arreglo asociativo
        //var_dump($resultado_query);
        
        $fila = mysqli_fetch_assoc($resultado_query);
        var_dump($fila);
        echo "<br>";
        
        if($resultado_query)
        {
            while($fila = mysqli_fetch_assoc($resultado_query))
            {
                $theme_id=$fila["theme_id"];
                $sql2 = "SELECT name FROM themes WHERE theme_id = $theme_id";
                $query2 = mysqli_query(connect(), $sql2);
                if($query2)
                {
                    $res = mysqli_fetch_assoc($query2);
                }
                var_dump($res);
            }

        }
        
        //echo $fila["count(*)"];
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de Búsqueda - LEGOD</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>

    <div class="encabezado">
        <h2>LEGOD - Resultados</h2>
        <a href="index.html">Volver al inicio</a>
    </div>

    <div class="contenedor-resultados">
        <!-- PHP --> 
        <h3>Resultados para la palabra: <?php ?></h3>

        <!-- PHP --> 
        <?php
        
        ?>
    </div>

</body>
</html>