<?php

class Connection {
    public $host = "localhost";
    public $password = "/Password123";
    public $user = "id21670659_shahih";
    public $db_name = "id21670659_lagu";
    public $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
}

class Lagu extends Connection {
    public function inputLagu($nama_lagu, $penyanyi, $jumlah_terjual, $tanggal_rilis, $genre) {
        $duplicate = mysqli_query($this->conn, "SELECT * FROM Lagu WHERE nama_lagu = '$nama_lagu' AND penyanyi = '$penyanyi'");

        if (mysqli_num_rows($duplicate) > 0) {
            return -1; 
        } else {
            $insertResult = $this->insertLagu($nama_lagu, $penyanyi, $jumlah_terjual, $tanggal_rilis, $genre);

            if ($insertResult) {
                return 1; 
            } else {
                return 0; 
            }
        }
    }

    public function editLagu($id_lagu, $nama_lagu, $penyanyi, $jumlah_terjual, $tanggal_rilis, $genre) {
        $updateQuery = "UPDATE Lagu SET nama_lagu='$nama_lagu', penyanyi='$penyanyi', jumlah_terjual=$jumlah_terjual, tanggal_rilis='$tanggal_rilis', genre='$genre' WHERE id_lagu=$id_lagu";
        $updateResult = mysqli_query($this->conn, $updateQuery);

        return $updateResult ? 1 : 0;
    }

    public function deleteLagu($id_lagu) {
        $deleteQuery = "DELETE FROM Lagu WHERE id_lagu=$id_lagu";
        $deleteResult = mysqli_query($this->conn, $deleteQuery);

        return $deleteResult ? 1 : 0; 
    }

    public function selectLaguById($id_lagu) {
        $result = mysqli_query($this->conn, "SELECT * FROM Lagu WHERE id_lagu = $id_lagu");
        return mysqli_fetch_assoc($result);
    }

    public function getAllLagu() {
        $result = mysqli_query($this->conn, "SELECT * FROM Lagu");
        $laguData = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $laguData[] = $row;
        }

        return $laguData;
    }

    public function insertLagu($nama_lagu, $penyanyi, $jumlah_terjual, $tanggal_rilis, $genre) {
        $insertQuery = "INSERT INTO Lagu (nama_lagu, penyanyi, jumlah_terjual, tanggal_rilis, genre) VALUES ('$nama_lagu', '$penyanyi', $jumlah_terjual, '$tanggal_rilis', '$genre')";
        $insertResult = mysqli_query($this->conn, $insertQuery);

        return $insertResult;
    }

}

?>
