
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


    </style>
</head>
<body>
    <a href="index.php">voltar</a>
    <h2>Inserir</h2>
    <form action="" method="post">
        <label for="email">Genero:</label>
        <input type="text" id="genero" name="genero" required><br><br>
        <br>
        <input id="botaoai" type="submit" value="Salvar">
        <br>
        <form action=""></form>
    </form>
    
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
</body>
</html>