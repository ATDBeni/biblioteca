<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <title>Adaugă Carte</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 27%;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        form input {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: border-color 0.3s;
            font-size: 14px;
        }

        form input:focus {
            border-color: #007BFF;
            outline: none;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #0056b3;
        }

        .button-back {
            margin-top: 20px;
            background-color: #4caf50;
            width: 100px;
            height: 27px;
            border: none;

        }

        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <h2>Adaugă Carte Nouă</h2>
    <form method="post">
        <label>Titlu:</label>
        <input type="text" name="titlu" required>
        <label>Autor:</label>
        <input type="text" name="autor" required>
        <label>An Publicare:</label>
        <input type="number" name="an_publicare" min="1500" max="2025">
        <label>Gen:</label>
        <input type="text" name="gen">
        <button type="submit" name="adauga">Adaugă</button>
    </form>

    <?php
    if (isset($_POST['adauga'])) {
        $titlu = $_POST['titlu'];
        $autor = $_POST['autor'];
        $an = $_POST['an_publicare'];
        $gen = $_POST['gen'];

        $sql = "INSERT INTO carti (titlu, autor, an_publicare, gen) VALUES ('$titlu','$autor','$an','$gen')";
        if ($conn->query($sql)) {
            echo "<p style='color:green;'>Carte adăugată cu succes!</p>";
        } else {
            echo "<p style='color:red;'>Eroare: " . $conn->error . "</p>";
        }
    }
    ?>
    <button class="button-back">
        <a href="index.php">Înapoi la cărți</a></button>
</body>

</html>