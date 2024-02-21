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
        if (isset($image) && $image["error"] ==  0) {
    
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
    
            if (!array_key_exists($ext, $allowed)) {
                // Ganti die() dengan cara lain untuk menangani kesalahan
                return [
                    'error' => 'Please select a valid file format.'
                ];
            }
    
            $maxsize =  10 *  1024 *  1024;
            if ($filesize > $maxsize) {
                // Ganti die() dengan cara lain untuk menangani kesalahan
                return [
                    'error' => 'File size is larger than the allowed limit.'
                ];
            }
    
            // Pastikan jenis file yang diunggah ada dalam array yang diizinkan
            if (!in_array($filetype, $allowed)) {
                return [
                    'error' => 'The uploaded file type is not allowed.'
                ];
            }
    
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
