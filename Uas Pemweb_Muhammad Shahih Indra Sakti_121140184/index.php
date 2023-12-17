<?php
session_start();

include "classConnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lagu = $_POST["nama_lagu"];
    $penyanyi = $_POST["penyanyi"];
    $jumlah_terjual = $_POST["jumlah_terjual"];
    $tanggal_rilis = $_POST["tanggal_rilis"];
    $genre = $_POST["genre"];

    $_SESSION['form_data'] = compact('nama_lagu', 'penyanyi', 'jumlah_terjual', 'tanggal_rilis', 'genre');

    $inputLagu = new Lagu();
    $resultLagu = $inputLagu->inputLagu($nama_lagu, $penyanyi, $jumlah_terjual, $tanggal_rilis, $genre);

    if ($resultLagu === -1) {
        $message = "Lagu sudah terdaftar.";
    } elseif ($resultLagu === 1) {
        $message = "Data lagu berhasil ditambahkan.";
        header("Location: index.php");
        exit();
    } else {
        $message = "Gagal menambahkan data lagu.";
    }

    echo $message;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Lagu</title>
    <link rel="stylesheet" href="./assets/style.css">
    <script defer src="./assets/script.js"></script>
</head>

<body>

    <h1 class="title">Tabel Lagu-lagu di dunia</h1>
    <?php
 
    $selectLagu = new Lagu();
    $resultLagu = $selectLagu->getAllLagu();
    $no = 1;

    echo "<table>
        <tr>
            <th>No</th>
            <th>Nama Lagu</th>
            <th>Penyanyi</th>
            <th>Jumlah Terjual</th>
            <th>Tanggal Rilis</th>
            <th>Genre</th>
            <th>Action</th>
        </tr>";

    foreach ($resultLagu as $row) {
        echo "<tr>
            <td>" . $no++ . "</td>
            <td>" . $row["nama_lagu"] . "</td>
            <td>" . $row["penyanyi"] . "</td>
            <td>" . $row["jumlah_terjual"] . "</td>
            <td>" . $row["tanggal_rilis"] . "</td>
            <td>" . $row["genre"] . "</td>
            <td class='action-buttons'>
                <a class='edit-button' href='./crud/edit.php?id=" . $row["id_lagu"] . "'>Edit</a>
                <a class='delete-button' href='./crud/delete.php?id=" . $row["id_lagu"] . "'>Delete</a>
            </td>
          </tr>";
    }

    echo "</table>";
    ?>
<form id="form" action="index.php" method="POST">
            <h1>Tambah data</h1>
            <div class="input-control">
                <label for="nama_lagu">Nama Lagu</label>
                <input id="nama_lagu" name="nama_lagu" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="penyanyi">Penyanyi</label>
                <input id="penyanyi" name="penyanyi" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="jumlah_terjual">Jumlah Terjual</label>
                <input id="jumlah_terjual" name="jumlah_terjual" type="number">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="tanggal_rilis">Tanggal Rilis</label>
                <input id="tanggal_rilis" name="tanggal_rilis" type="date">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="genre">Genre</label>
                <select id="genre" name="genre">
                    <option value="pop">Pop</option>
                    <option value="rock">Rock</option>
                    <option value="jazz">Jazz</option>
                </select>
                <div class="error"></div>
            </div>
            <button type="submit">Tambah Lagu</button>
        </form>
    <div id="cookie-notice">
        <p>Kami menggunakan cookie untuk meningkatkan pengalaman Anda di situs web ini. Dengan melanjutkan, Anda setuju dengan kebijakan cookie kami.</p>
        <button onclick="acceptCookies()">Setuju</button>
    </div>

    <script>
        function acceptCookies() {
            setCookie("cookie-user", "true", 90);
            document.getElementById("cookie-notice").style.display = "none";
        }

        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        var cookieAccepted = getCookie("cookie-user");
        if (cookieAccepted === "true") {
            document.getElementById("cookie-notice").style.display = "none";
        }
    </script>
    <script>
        window.onload = function () {
            const formData = JSON.parse(localStorage.getItem('formData')) || {};
            document.getElementById('nama_lagu').value = formData.nama_lagu || '';
            document.getElementById('penyanyi').value = formData.penyanyi || '';
            document.getElementById('jumlah_terjual').value = formData.jumlah_terjual || '';
            document.getElementById('tanggal_rilis').value = formData.tanggal_rilis || '';
            document.getElementById('genre').value = formData.genre || '';
        };

        document.getElementById('form').addEventListener('submit', function () {
            const formData = {
                nama_lagu: document.getElementById('nama_lagu').value,
                penyanyi: document.getElementById('penyanyi').value,
                jumlah_terjual: document.getElementById('jumlah_terjual').value,
                tanggal_rilis: document.getElementById('tanggal_rilis').value,
                genre: document.getElementById('genre').value,
            };

            localStorage.setItem('formData', JSON.stringify(formData));
        });
    </script>
</body>

</html>
