<?php
include 'db.php';

if (isset($_GET['id_carte'])) {
    $id = intval($_GET['id_carte']);
    $sql = "SELECT * FROM carti WHERE id_carte=$id";
    $result = $conn->query($sql);
    $carte = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id = intval($_POST['id_carte']);
    $titlu = $_POST['titlu'];
    $autor = $_POST['autor'];
    $an = $_POST['an_publicare'];
    $gen = $_POST['gen'];

    $sql = "UPDATE carti SET titlu='$titlu', autor='$autor', an_publicare='$an', gen='$gen' WHERE id_carte=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?msg=Cartea+actualizata+cu+succes");
        exit();
    } else {
        echo "Eroare la actualizare: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <title>Editează Carte</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #444;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background: #0077cc;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #005fa3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #0077cc;
            text-decoration: none;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Editează Carte</h2>
        <form method="post">
            <input type="hidden" name="id_carte" value="<?php echo $carte['id_carte']; ?>">
            <label>Titlu:</label>
            <input type="text" name="titlu" value="<?php echo $carte['titlu']; ?>" required>
            <label>Autor:</label>
            <input type="text" name="autor" value="<?php echo $carte['autor']; ?>" required>
            <label>An Publicare:</label>
            <input type="number" name="an_publicare" value="<?php echo $carte['an_publicare']; ?>">
            <label>Gen:</label>
            <input type="text" name="gen" value="<?php echo $carte['gen']; ?>">
            <button type="submit" name="update">Salvează modificările</button>
        </form>
        <a href="index.php">Înapoi la lista de cărți</a>
    </div>
</body>

</html>