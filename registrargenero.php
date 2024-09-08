
<?php
include 'config.php';

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $genre = $_POST['genero'];

    $stmt = $conn->prepare("INSERT INTO genre (Genero) VALUES (?)");
    $stmt->bind_param("s",$genre);

    if ($stmt->execute()) {
        header('Location: registrargenero.php');
        
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Inserir Dados</title>

    <style>

    #botaoai{
            margin-left: 50px;
            color: green;
    }

    body{
background-color: bisque;

}
 


#body {
    
    height: 2px;
    max-width: 500px;
    font-family: gotham, arial, helvetica, sans-serif;
    font-size: 24px;
    padding: 0;
    margin: 20px !important;
    text-align: center;
} 

#body2 {
    
    max-width: 400px;
    font-family: gotham, arial, helvetica, sans-serif;
    font-size: 16px;
    padding: 0;
    margin-left: auto !important;
    margin-right: 200px;
    text-align: center;
}



    </style>
</head>
<body>
 <a href="index.php">voltar</a>  
  <div id="body">
        
            <h2>Inserir Genero</h2>
            <form action="" method="post">
                <label for="email">Genero:</label>
                <input type="text" id="genero" name="genero" required><br><br>
                <br>
                <input id="botaoai" type="submit" value="Salvar">
                <br>
                <form action=""></form>
            </form>


    </div>
   
    
</body>
</html>

<?php
$sql = "SELECT * FROM genre";
$result = $conn->query($sql);
$conn->close();
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Registros</title>
</head>
<body>
    <div id="body2">
 <h2>Lista de Generos</h2>
    <table border="1">
        <tr>
            <th>Genero</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>  
                <td><?= htmlspecialchars($row['Genero']) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    </div>
   
</body>
</html>