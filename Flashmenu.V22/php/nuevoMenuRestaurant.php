<?php

/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['Menu_nombre']) && isset($_POST['Menu_precio'])) {
    
   // $id = $_POST['idMenu'];
    $nom = $_POST['Menu_nombre'];
    $descrip = $_POST['Menu_descripcion'];
    $precio = $_POST['Menu_precio'];
    

    // include db connect class
    require_once __DIR__ . '/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql inserting a new row
    $result = mysql_query("INSERT INTO menu(Menu_nombre, Menu_descripcion, Menu_precio, Restaurant_idRestaurant) VALUES('$nom' ,'$descrip', '$precio', 1)");

    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Menu creado exitosamente.";

        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! Ocurrio un erros.";
        
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>