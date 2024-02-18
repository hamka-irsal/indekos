<?php

class Helpers
{
    static function money_format_idr($money, $withRp = true, $desimal = false)
    {
        $money = (float) $money;

        return $withRp
            ? 'Rp. ' . number_format($money, $desimal ? 2 : 0, ',', '.') . ''
            : number_format(
                $money,
                $desimal ? 2 : 0,
                ',',
                '.'
            );
    }

    static function upload($image)
    {
        if (isset($image) && $image["error"] == 0) {

            $allowed = [
                "jpg" => "image/jpg",
                "jpeg" => "image/jpeg",
                "gif" => "image/gif",
                "png" => "image/png"
            ];

            $filename = $image["name"];
            $filetype = $image["type"];
            $filesize = $image["size"];

            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

            $maxsize = 10 * 1024 * 1024;
            if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

            return [
                'name' => $filename,
                'type' => $filetype,
                'size' => $filesize,
                'allowed' => $allowed,
                'ext' => $ext,
            ];
        } else {
            return null;
        }
    }
}
