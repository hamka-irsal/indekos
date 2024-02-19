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
}
