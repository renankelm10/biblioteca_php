
<?php
include 'config.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['Titulo'];
    $author = $_POST['autor_id'];
    $genre = $_POST['genero_id'];
    $date = $_POST['data1'];
    
    
    $stmt = $conn->prepare("INSERT INTO users (name, email, Genero, data) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $titulo, $author, $genre, $date);

    if ($stmt->execute()) {
        header('Location: registrarcopia.php');
        
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
    <br><br>
    <div id="body">
        
    <h2>Inserir livro:</h2>
    <form action="" method="post">
        <label for="Titulo">Titulo:</label>
        <input type="text" id="Titulo" name="Titulo" required placeholder="Escreva o Titulo do livro"><br><br>
        <label>Autor:</label>
        <select id="autor_id" name="autor_id" required>
            
            <?php
            include_once '../config.php';
            $result = $conn->query("SELECT name FROM authors");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['name']}'>{$row['name']}</option>";
            }
            ?>
        </select><br><br>

        <label for="email">Gênero:</label>
        <select id="genero_id" name="genero_id" required>
            <?php
            include_once '../config.php';
            $result = $conn->query("SELECT * FROM genre");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['Genero']}'>{$row['Genero']}</option>";
            }
            ?>
        </select><br><br>
        <label for="data1">Data de lançamento:</label>
        <input type="text" name="data1" placeholder="       --/--/----">
        <br><br>
        
        <input id="botaoai" type="submit" value="Salvar">
        <br>
        <form action=""></form>
        </form>
            
        </body>
        </html>
        

    <?php
        if ("forms2") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $buscar = $_POST['buscar'];

            $buscar = $conn->real_escape_string($buscar);

    
            $sql = "SELECT * FROM users WHERE email LIKE '%$titulo%'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h2>Resultados da busca:</h2>";
                while ($row = $result->fetch_assoc()) {
                 echo "Título: " . $row['name'] . "<br>";
                 echo "Autor: " . $row['email'] . "<br>";
                  echo "Genero " . $row['Genero'] . "<br><br>";
                 }
                     } else {
                         echo "<p>Nenhum livro encontrado com o título fornecido.</p>";
                        }

                 } }
            ?> 
<html>
    <head>
       
    </head>
    <body>
        <div id="a2">
        <form action="buscar_livro.php" method="POST">
        <h2>Buscar livro:</h2>
        <input type="text" id="buscar" name="buscar" placeholder="Titulo do livro"> 
        <button action="submit" value="forms2">buscar</button>
        </form><br>
        </div>
        <div id="a3">
        <form action="buscar_Genero.php" method="POST">
        <select id="buscar" name="buscar" required>
            <?php
            include_once '../config.php';
            $result = $conn->query("SELECT * FROM genre");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['Genero']}'>{$row['Genero']}</option>";
            }
            ?>
        </select>
        <button action="submit" value="forms2">Buscar</button>
        </form>
        </div>
</body>
</html>
    </div>
    

<div id="body2">
<?php
$sql = "SELECT name, email, Genero , data FROM users";
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
            <th>Titulo</th>
            <th>Autor</th>
            <th>Gênero</th>
            <th>Data de lançamento</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>   
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['Genero']) ?></td>
                <td><?= htmlspecialchars($row['data']) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

</div>
