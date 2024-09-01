<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $author = $_POST['Autorcad'];
    $bio = $_POST['bio'];

    $stmt = $conn->prepare("INSERT INTO authors (name, bio) VALUES (?, ?)");
    $stmt->bind_param("ss", $author, $bio);

    if ($stmt->execute()) {
        header('Location: autor.php');
        
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
</head>
<body>
    
    <a href="index.php">voltar</a>
    <h2>Autores</h2>
    <form action="" method="post">
        
        
        <label for="Autorcad">Cadastrar Autor:</label>
        <input type="text" id="Autorcad" name="Autorcad" required><br><br>

        <label for="Autor">Biografia:</label>
        <input type="text" id="bio" name="bio" required><br><br>


        <input type="submit" value="Salvar" style="margin: 30px;">
        
        
    </form>
</body>
</html>

<?php

$sql = "SELECT name, bio FROM authors";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Registrados</title>
</head>
<body>
    <h2>Lista de Registros</h2>
    <table border="1">
        <tr>
            <th>Autor</th>
            <th>Bio</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['bio']) ?></td>
                
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>