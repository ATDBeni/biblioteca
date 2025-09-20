<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <title>Biblioteca Online</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
            background: #333;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f2f2f2;
        }

        form {
            display: inline;
        }

        button {
            background: red;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background: darkred;
        }
    </style>
</head>

<body>
    <header>
        <h1>📚 Biblioteca Online</h1>
    </header>
    <nav>
        <a href="index.php">Cărți</a>
        <a href="adauga_carte.php">Adaugă Carte</a>
    </nav>
    <div class="container">
        <h2>Lista cărților</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Titlu</th>
                <th>Autor</th>
                <th>An Publicare</th>
                <th>Gen</th>
                <th>Acțiuni</th>
            </tr>
            <?php
            $sql = "SELECT * FROM carti";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["id_carte"] . "</td>
                        <td>" . $row["titlu"] . "</td>
                        <td>" . $row["autor"] . "</td>
                        <td>" . $row["an_publicare"] . "</td>
                        <td>" . $row["gen"] . "</td>
                      
                        <td>
    <form method='post' action='sterge_carte.php' style='display:inline;' onsubmit=\"return confirm('Ești sigur că vrei să ștergi această carte?');\">
        <input type='hidden' name='id_carte' value='" . $row["id_carte"] . "'>
        <button type='submit'>Șterge</button>
    </form>
    <form method='get' action='editeaza_carte.php' style='display:inline;'>
        <input type='hidden' name='id_carte' value='" . $row["id_carte"] . "'>
        <button type='submit' style='background:blue;'>Editează</button>
    </form>
</td>
                      </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nu există cărți în bibliotecă.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>