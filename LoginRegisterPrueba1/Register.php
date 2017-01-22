<?php
    $con = mysqli_connect("mysql.hostinger.mx", "u231820256_tania", "123456", "u231820256_data");
    
    $name = $_POST["name"];
    $age = $_POST["age"];
    $username = $_POST["username"];
    $password = $_POST["password"];
	
	/*$nuevo_usuario=mysql_query("select nombre from $tabla where nombre='$nombre'"); 
	if(mysql_num_rows($nuevo_usuario)>0) 
	{ 
	echo " 
	<p class='avisos'>El nombre de usuario ya esta registrado</p> 
	<p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Volver atrás</a></p> 
	"; 
	} 
// ------------ Si no esta registrado el usuario continua el script 
	else 
	{ */
    $statement = mysqli_prepare($con, "INSERT INTO user (name, age, username, password) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "siss", $name, $age, $username, $password);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>