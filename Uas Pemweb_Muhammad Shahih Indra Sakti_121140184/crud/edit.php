<?php
include "../classConnection.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $selectLagu = new Lagu(); 

    $laguData = $selectLagu->selectLaguById($id);

    if (!$laguData) {
        echo "Lagu not found.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["_method"]) && strtoupper($_POST["_method"]) === "PUT") {
        $id = $_POST["id"];
        $nama_lagu = $_POST["nama_lagu"];
        $penyanyi = $_POST["penyanyi"];
        $jumlah_terjual = $_POST["jumlah_terjual"];
        $tanggal_rilis = $_POST["tanggal_rilis"];
        $genre = $_POST["genre"];

        $inputLagu = new Lagu(); 
        $resultEdit = $inputLagu->editLagu($id, $nama_lagu, $penyanyi, $jumlah_terjual, $tanggal_rilis, $genre);

        if ($resultEdit === 1) {
            header("Location: ../index.php");
            exit();
        } else {
            $messageEdit = "Gagal mengedit data lagu.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lagu Data</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
    <script defer src="../assets/script.js"></script>
</head>

<body>
    <div class="container">
        <form id="form" action="edit.php" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?php echo $laguData['id_lagu']; ?>">
            <h1>Edit Lagu Data</h1>
            <div class="input-control">
                <label for="nama_lagu">Nama Lagu</label>
                <input id="nama_lagu" name="nama_lagu" type="text" value="<?php echo $laguData['nama_lagu']; ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="penyanyi">Penyanyi</label>
                <input id="penyanyi" name="penyanyi" type="text" value="<?php echo $laguData['penyanyi']; ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="jumlah_terjual">Jumlah Terjual</label>
                <input id="jumlah_terjual" name="jumlah_terjual" type="number" value="<?php echo $laguData['jumlah_terjual']; ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="tanggal_rilis">Tanggal Rilis</label>
                <input id="tanggal_rilis" name="tanggal_rilis" type="date" value="<?php echo $laguData['tanggal_rilis']; ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="genre">Genre</label>
                <select id="genre" name="genre">
                    <option value="pop" <?php echo ($laguData['genre'] == 'pop') ? 'selected' : ''; ?>>
                        Pop</option>
                    <option value="rock" <?php echo ($laguData['genre'] == 'rock') ? 'selected' : ''; ?>>Rock
                    </option>
                    <option value="jazz" <?php echo ($laguData['genre'] == 'jazz') ? 'selected' : ''; ?>>Jazz
                    </option>
                </select>
                <div class="error"></div>
            </div>
            <button type="submit">Update Lagu</button>
        </form>
    </div>
</body>

</html>
