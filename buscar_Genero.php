<?php
include("config.php");
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $buscar = $_POST['buscar'];

            $buscar = $conn->real_escape_string($buscar);



                $sql = "SELECT * FROM users WHERE Genero LIKE '%$buscar%'";
                $result = $conn->query($sql); 
            
                if ($result->num_rows > 0) {

                 } else {
                         echo "<p>Nenhum livro encontrado com o título fornecido.</p>";
                        }}
                    
                
?>


<html>
    <body>
        <a href="registrarcopia.php">voltar</a>
    <h2>Resultados da busca:</h2>
            <table border="1">
        <tr>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Genero</th>
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

    </form>
</body>
</html>
            
      