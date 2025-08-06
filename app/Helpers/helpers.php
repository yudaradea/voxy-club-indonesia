<?php

use Carbon\Carbon;

if (!function_exists('formatWhatsapp')) {
    function formatWhatsapp($number)
    {
        return substr_replace(substr_replace($number, '-', 4, 0), '-', 9, 0);
    }
}

if (!function_exists('formatRupiah')) {
    function formatRupiah($number)
    {
        return number_format($number, 0, ',', '.');
    }
}

if (!function_exists('formatTanggal')) {
    function formatTanggal($date)
    {
        return Carbon::parse($date)->isoFormat('D MMMM YYYY');
    }
}

if (!function_exists('formatTanggalHari')) {
    function formatTanggalHari($date)
    {
        return Carbon::parse($date)->isoFormat('dddd, D MMMM YYYY');
    }
}

if (!function_exists('formatTanggalFull')) {
    function formatTanggalFull($date)
    {
        return Carbon::parse($date)->isoFormat('dddd, D MMMM YYYY • HH:mm');
    }
}
