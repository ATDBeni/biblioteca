<?php
include 'db.php';

if (isset($_POST['id_carte'])) {
    $id = intval($_POST['id_carte']);

    $sql = "DELETE FROM carti WHERE id_carte = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?msg=Cartea+stearsa+cu+succes");
        exit();
    } else {
        echo "Eroare la ștergere: " . $conn->error;
    }
} else {
    echo "ID carte lipsă!";
}
?>
