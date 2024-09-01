
<?php
include 'config.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['Titulo'];
    $author = $_POST['Autor'];
    $genre = $_POST['genero'];
    
    $stmt = $conn->prepare("INSERT INTO users (name, email, Genero) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $titulo, $author, $genre);
    
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
        <label for="Titulo">Tiulo:</label>
        <input type="text" id="Titulo" name="Titulo" required><br><br>

        <label for="Autor">Autor:</label>
        <input type="text" id="Autor" name="Autor" required><br><br>

        <label for="email">Genero:</label>
        <input type="text" id="genero" name="genero" required><br><br>
        <br>
        <input id="botaoai" type="submit" value="Salvar">
        <br>
        <form action=""></form>
    </form>
    <form action="buscar_livro.php" method="Post">
    <h2>Buscar livro:</h2>
    <input type="text" id="buscar" name="buscar"> <button action="submit">buscar</button>

    </form>
</body>
</html>


<?php
$sql = "SELECT id, name, email, Genero FROM users";
    $result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Registros</title>
</head>
<body>
    <h2>Lista de Registros</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Genero</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['Genero']) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>