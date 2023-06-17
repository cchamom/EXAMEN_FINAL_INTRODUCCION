<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica de php</title>
    <link href="style.css" rel="stylesheet"/>
</head>
<body class="container">
    <?php
    //abre la conexion a la base de datos
        $pdo_option[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
        $conexion = new PDO("mysql:host=localhost;dbname=Final_0907_23_11907", "root", "", $pdo_option);

        if(isset($_POST["accion"])) { 
            if ($_POST["accion"] == "Crear"){
                $insert = $conexion->prepare("INSERT INTO Producto (codigo,nombre,precio,
                existencia) VALUES (:codigo,:nonmbre,:precio,:existencia)");
                $insert->bindValue("codigo", $_POST["codigo"]);
                $insert->bindValue("nombre", $_POST["nombre"]);
                $insert->bindValue("precio", $_POST["precio"]);
                $insert->bindValue("existencia", $_POST["existencia"]);
                $insert->execute();
            }
        }

    //Ejecuramos la consulta
        $select = $conexion->query("SELECT codigo, nombre, precio, existencia FROM Producto");

  ?>
  <br>
  <?php if(isset($_POST["accion"]) && $_POST["accion"] == "Crear" ) { ?>
     
    <?php } { ?>
        <form method="POST">
            <input type="text" name="codigo" placeholder="Ingrese el Codigo"/>
            <input type="text" name="nombre" placeholder="Ingrese el Nombre"/>
            <input type="text" name="precio" placeholder="Ingrese el Precio"/>
            <input type="text" name="existencia" placeholder="ingrese el Existencia"/>
            <input type="hidden" name="accion" value="Crear"/>
            <button type="submit">Crear</button>
        </form>
    <?php } ?>

     

<table border='1'> 
<thead>
        <tr>
            <th>CODIGO</th>
            <th>NOMBRE</th>
            <th>PRECIO</th>
            <th>EXISTENCIA</th>


</tr>
    </thead>
    <tbody>
    
        <?php foreach($select->fetchAll() as $Producto) { ?>
            <tr>
                <td> <?php echo $Producto["codigo"] ?> </td>
                <td> <?php echo $Producto["nombre"] ?> </td>
                <td> <?php echo $Producto["precio"] ?> </td>
                <td> <?php echo $Producto["existencia"] ?> </td>
                <td> <form method="POST"> 
     <?php } ?>
    </tbody>
    </table>
</body>
</html>
               
                  
