<?php

use FTP\Connection as FTPConnection;

session_start();

class Connection{
  public $host = "localhost";
  public $user = "root";
  public $password = "";
  public $db_name = "db_kost";
  public $conn;

  public function __construct(){
    $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
  }
}

class Login extends Connection{
  public $id;
  public function login($username, $password){
    $result = mysqli_query($this->conn, "SELECT * FROM admin WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){
      if($password == $row["password"]){
        $this->id = $row["id"];
        return 1;
        // Login successful
      }
      else{
        return 10;
        // Wrong password
      }
    }
    else{
      return 100;
      // User not registered
    }
  }
  
  public function idUser(){
    return $this->id;
  }
}

class View extends Connection{
    function getRating() {
        $query = "SELECT * FROM rating";
        $result = mysqli_query($this->conn, $query);

        $no = 0;
        while ($d = mysqli_fetch_array($result)) {
            $no++;
            echo "<tr>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . $d['nama'] . "</td>";
            echo "<td>" . $d['rating'] . "</td>";
            echo "<td>" . $d['ulasan'] . "</td>";
            echo "<td><a href='hapus_aksi_rekomendasi.php?id=" . $d['id'] . "' class='btn-sm btn-danger'><span class='fas fa-trash'></a></td>";
            echo "</tr>";
        }
    }

    function getKost(){
        $query = "SELECT * FROM wisata";
        $result = mysqli_query($this->conn,$query);

        $no = 0;

        while ($d = mysqli_fetch_array($result)) {
            $no++;
            echo "<tr>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . $d['nama_wisata'] . "</td>";
            echo "<td>" . $d['alamat'] . "</td>";
            echo "<td>" . $d['harga_tiket'] . "</td>";
            echo "<td>" . $d['latitude'] . "</td>";
            echo "<td>" . $d['longitude'] . "</td>";
            echo "<td><a href='edit_data.php?id=" . $d['id_wisata'] . "' class='btn-sm btn-primary'><span class='fas fa-edit'></a></td>";
            echo "<td><a href='hapus_aksi.php?id=" . $d['id_wisata'] . "' class='btn-sm btn-danger'><span class='fas fa-trash'></a></td>";
            echo "</tr>";
        }
    }

}

class Select extends Connection{
  public function selectUserById($id){
    $result = mysqli_query($this->conn, "SELECT * FROM admin WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}
