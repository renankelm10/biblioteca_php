<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca fonceca</title>

    <style>
    html, body {
    height: 100%;
}

body {
    background-color: bisque;
    max-width: 400px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 35px;
    padding: 0;
    margin: 0 auto !important;
    text-align: center;
}
button{
    background-color: black;
    color:white;
    border-radius: 10px;
    width: 200px;
    height: 30px;
    font-size: 20px;
    font-family: Georgia, 'Times New Roman', Times, serif;
}






    </style>
</head>
<body>
    <h1>Biblioteca Fonceca</h1>
    <form action="registrarcopia.php"> 
        <button action="submit">Registrar Livro</button>
    </form>
     <br>
    <form action="autor.php"> 
        <Button action="submit">Registrar Autores</Button>
    </form>
    <br>
    <form action="registrargenero.php">
        <button action="submit">Registrar Genero</button>
    </form>
     
</body>
</html>