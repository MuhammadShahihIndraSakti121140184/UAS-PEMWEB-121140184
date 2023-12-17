<?php
include "../classConnection.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $inputLagu = new Lagu(); 

    $resultDelete = $inputLagu->deleteLagu($id);

    if ($resultDelete === 1) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Gagal menghapus data lagu.";
    }
} else {
    echo "Invalid request.";
}
?>
