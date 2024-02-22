<?php

session_start();

if ($_SERVER['SCRIPT_NAME'] == "/indekos/login.php" || $_SERVER['SCRIPT_NAME'] == "/indekos/register.php" || $_SERVER['SCRIPT_NAME'] == "/indekos/user_login.php" || $_SERVER['SCRIPT_NAME'] == "/indekos/logout_user.php") {
  require_once './admin/helpers/Ryoogen.php';
  require_once './admin/helpers/HomeChart.php';
} else {
  require_once './helpers/Ryoogen.php';
  require_once './helpers/HomeChart.php';
}


class Connection
{
  public $host = "localhost";
  public $user = "root";
  public $password = "";
  public $db_name = "db_kost";
  public $conn;

  public function __construct()
  {
    $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
  }
}

class Login extends Connection
{
  public $id;
  public $roles;
  public $email;
  public $name;
  public function login($email, $password)
  {
    $result = mysqli_query($this->conn, "SELECT * FROM users WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
      if (password_verify($password, $row['password'])) {
        $this->id = $row["id"];
        $this->roles = $row['roles'];
        $this->email = $row['email'];
        $this->name = $row['nama'];
        return 1;
      } else {
        return 10;
      }
    } else {
      return 100;
    }
  }

  public function idUser()
  {
    return $this->id;
  }

  public function roles()
  {
    return $this->roles;
  }

  public function email()
  {
    return $this->email;
  }

  public function name()
  {
    return $this->name;
  }
}

class TotalData
{
  public static function Ulasan($id = null)
  {
    $koneksi = new Connection();
    $result = [];
    $totalUlasan = 0;

    if ($id) {
      $query = "SELECT ulasan FROM recomendations WHERE kost_id=$id";
      $result = mysqli_query($koneksi->conn, $query);
    } else {
      $query = "SELECT ulasan FROM recomendations";
      $result = mysqli_query($koneksi->conn, $query);
    }

    while ($d = mysqli_fetch_array($result)) {
      $totalUlasan += (int) $d['ulasan'];
    }

    return $totalUlasan;
  }

  public static function Rating($id = null)
  {
    $koneksi = new Connection();
    $result = [];
    $totalRating = 0;

    if ($id) {
      $query = "SELECT rating FROM recomendations WHERE kost_id=$id";
      $result = mysqli_query($koneksi->conn, $query);
    } else {
      $query = "SELECT rating FROM recomendations";
      $result = mysqli_query($koneksi->conn, $query);
    }

    while ($d = mysqli_fetch_array($result)) {
      $totalRating += (int) $d['rating'];
    }

    return $totalRating;
  }
}

class Auth
{
  static function user()
  {
    $id = $_SESSION['id'];
    $koneksi = new Connection();
    $result = mysqli_query($koneksi->conn, "SELECT * FROM users WHERE id= '$id'");
    $row = mysqli_fetch_assoc($result);

    if (isset($row)) {
      return $row;
    } else {
      return null;
    }
  }
}

class View extends Connection
{
  static function Rating()
  {
    $koneksi = new Connection();
    $query = "SELECT * FROM recomendations ORDER BY id DESC";
    $result = mysqli_query($koneksi->conn, $query);

    $no = 0;
    while ($d = mysqli_fetch_array($result)) {
      $no++;
      echo "<tr>";
      echo "<td class='text-center'>" . $no . "</td>";
      echo "<td>" . $d['nama'] . "</td>";
      echo "<td>" . $d['rating'] . "</td>";
      echo "<td>" . $d['ulasan'] . "</td>";
      echo "<td class='text-center'><a href='hapus_aksi_rekomendasi.php?id=" . $d['id'] . "' class='btn-sm btn-danger'><span class='fas fa-trash'></a></td>";
      echo "</tr>";
    }
  }

  static function Dashboard()
  {
    $koneksi = new Connection();
    $recomendation = "SELECT * FROM recomendations";
    $user = "SELECT * FROM users";
    $kost = "SELECT * FROM kost";

    $totalRecomendation = mysqli_num_rows(mysqli_query($koneksi->conn, $recomendation));
    $totalUser = mysqli_num_rows(mysqli_query($koneksi->conn, $user));
    $totalKost = mysqli_num_rows(mysqli_query($koneksi->conn, $kost));

    return [
      'recomendation' => $totalRecomendation,
      'user' => $totalUser,
      'kost' => $totalKost,
      'chart' => [
        'recomendation' => HomeChart::RECOMENDATION(),
        'user' => HomeChart::PENGGUNA(),
        'kost' => HomeChart::KOST(),
      ]
    ];
  }

  static function Kost()
  {
    $koneksi = new Connection();
    $query = "SELECT * FROM kost ORDER BY id DESC";
    $result = mysqli_query($koneksi->conn, $query);

    $no = 0;

    while ($d = mysqli_fetch_array($result)) {
      $gambar = $d['image'];
      $no++;
      echo "<tr>";
      echo "<td class='text-center'>" . $no . "</td>";
      echo "<td class='text-center d-flex justify-content-center'>" . "<div class='rounded' style='width: 50px; height: 50px; overflow: hidden'><img style='widht: 50px; height: 50px; object-fit: cover' src='upload/$gambar' alt='$gambar'></div>" . "</td>";
      echo "<td>" . $d['nama_kost'] . "</td>";
      echo "<td>" . $d['deskripsi'] . "</td>";
      echo "<td>" . $d['alamat'] . "</td>";
      echo "<td>" . Helpers::money_format_idr($d['harga']) ?? '-' . "</td>";
      echo "<td class='text-center'>" . TotalData::Rating($d['id']) ?? '-' . "</td>";
      echo "<td class='text-center'>" . TotalData::Ulasan($d['id']) ?? '-' . "</td>";
      echo "<td class='col-2 text-center' style='width:100px'><a href='edit_data.php?id=" . $d['id'] . "' class='btn-sm btn-primary'><span class='fas fa-edit'></a>
            <a href='hapus_aksi.php?id=" . $d['id'] . "' class='btn-sm btn-danger'><span class='fas fa-trash'></a>
            </td>";
      echo "</tr>";
    }
  }

  static function Pengguna()
  {
    $koneksi = new Connection();
    $query = "SELECT * FROM users ORDER BY id DESC";
    $result = mysqli_query($koneksi->conn, $query);

    $no = 0;

    while ($d = mysqli_fetch_array($result)) {
      $no++;
      $avatar = $d['avatar'];
      echo "<tr>";
      echo "<td class='text-center'>" . $no . "</td>";
      echo "<td class='text-center d-flex justify-content-center'>" . "<div class='rounded-circle' style='width: 50px; height: 50px; overflow: hidden'><img style='widht: 50px; height: 50px; object-fit: cover' src='upload/$avatar' alt='$avatar'></div>" . "</td>";
      echo "<td>" . $d['nama'] ?? '-' . "</td>";
      echo "<td>" . $d['username'] ?? '-' . "</td>";
      echo "<td>" . $d['email'] ?? '-' . "</td>";
      echo "<td class='col-2 text-center' style='width:100px'><a href='edit_data_pengguna.php?id=" . $d['id'] . "' class='btn-sm btn-primary'><span class='fas fa-edit'></a>
            <a href='hapus_aksi_pengguna.php?id=" . $d['id'] . "' class='btn-sm btn-danger'><span class='fas fa-trash'></a>
            </td>";
      echo "</tr>";
    }
  }

  function getMap()
  {
    $query = "SELECT * FROM wisata";
    $result = mysqli_query($this->conn, $query);

    $no = 0;

    while ($d = mysqli_fetch_array($result)) {

      $data = $d['latitude'] . $d['longitude'];
    }
  }
}

class Select extends Connection
{
  public function selectUserById($id)
  {
    $result = mysqli_query($this->conn, "SELECT * FROM users WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}
