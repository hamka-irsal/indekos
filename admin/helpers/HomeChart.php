<?php

class HomeChart
{
    public static function PENGGUNA()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $db_name = "db_kost";

        $data = [
            'date' => [],
            'data' => [],
        ];

        for ($i = 9; $i >= 0; $i--) {
            $dates = date('Y-m-d', strtotime("-" . $i . " day"));

            $koneksi = mysqli_connect($host, $user, $password, $db_name);

            $query = "SELECT * FROM users where created_at LIKE '%" . $dates . "%'";
            $datas = mysqli_num_rows(mysqli_query($koneksi, $query));

            $data['date'][] = date('d M Y', strtotime($dates));
            $data['data'][] = $datas ? $datas : 0;
        }

        return $data;
    }

    public static function RECOMENDATION()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $db_name = "db_kost";

        $data = [
            'date' => [],
            'data' => [],
        ];

        for ($i = 9; $i >= 0; $i--) {
            $dates = date('Y-m-d', strtotime("-" . $i . " day"));

            $koneksi = mysqli_connect($host, $user, $password, $db_name);

            $query = "SELECT * FROM recomendations where  created_at LIKE '%" . $dates . "%'";
            $datas = mysqli_num_rows(mysqli_query($koneksi, $query));

            $data['date'][] = date('d M Y', strtotime($dates));
            $data['data'][] = $datas ? $datas : 0;
        }

        return $data;
    }

    public static function KOST()
    {
        $data = [
            'date' => [],
            'data' => [],
        ];

        for ($i = 9; $i >= 0; $i--) {
            $dates = date('Y-m-d', strtotime("-" . $i . " day"));

            $koneksi = new Connection();

            $query = "SELECT * FROM kost where created_at LIKE '%" . $dates . "%'";
            $datas = mysqli_num_rows(mysqli_query($koneksi->conn, $query));

            $data['date'][] = date('d M Y', strtotime($dates));
            $data['data'][] = $datas ? $datas : 0;
        }

        return $data;
    }
}
