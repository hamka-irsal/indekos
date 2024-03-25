<?php

class Rating
{
    public function getRating($id)
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $name = "db_kost";

        $koneksi = mysqli_connect($host, $user, $pass, $name);
        if (mysqli_connect_errno()) {
            echo "Koneksi database mysqli gagal!!! : " . mysqli_connect_error();
        }

        $query = "SELECT rating FROM recomendations WHERE kost_id='$id'";
        $rating = mysqli_query($koneksi, $query);

        $totalRating = mysqli_num_rows($rating);

        $rating5 = 0;
        $rating4 = 0;
        $rating3 = 0;
        $rating2 = 0;
        $rating1 = 0;

        $jumlahRating = 0;

        while ($d = mysqli_fetch_assoc($rating)) {
            switch ($d['rating']) {
                case 5:
                    $rating5 += 1;
                    $jumlahRating += $d['rating'];
                    break;
                case 4:
                    $rating4 += 1;
                    $jumlahRating += $d['rating'];
                    break;
                case 3:
                    $rating3 += 1;
                    $jumlahRating += $d['rating'];
                    break;
                case 2:
                    $rating2 += 1;
                    $jumlahRating += $d['rating'];
                    break;
                default:
                    $rating1 += 1;
                    $jumlahRating += $d['rating'];
            }
        }

        if ($jumlahRating && $totalRating) {
            $avarageRating =  round($jumlahRating / $totalRating, 1);
            $avarageFloor = floor($jumlahRating / $totalRating);
        } else {
            $avarageRating =  0;
            $avarageFloor = 0;
        }

        return [
            'avarage' => $avarageRating,
            'floor' => $avarageFloor,
            'total' => $totalRating,
        ];
    }
}
