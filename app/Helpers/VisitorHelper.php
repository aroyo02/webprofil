<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class VisitorHelper
{
    protected static $filePath = 'storage/app/visitors.json';

    public static function logVisitor()
    {
        $data = [
            'daily' => [],
            'monthly' => []
        ];

        // Cek apakah file sudah ada
        if (File::exists(base_path(self::$filePath))) {
            $data = json_decode(File::get(base_path(self::$filePath)), true);
        }

        $today = now()->format('Y-m-d');
        $month = now()->format('Y-m');

        // Tambah 1 untuk hari ini
        if (!isset($data['daily'][$today])) {
            $data['daily'][$today] = 1;
        } else {
            $data['daily'][$today]++;
        }

        // Tambah 1 untuk bulan ini
        if (!isset($data['monthly'][$month])) {
            $data['monthly'][$month] = 1;
        } else {
            $data['monthly'][$month]++;
        }

        // Simpan ke file
        File::put(base_path(self::$filePath), json_encode($data));
    }

    public static function getTodayVisitors()
    {
        if (!File::exists(base_path(self::$filePath))) {
            return 0;
        }

        $data = json_decode(File::get(base_path(self::$filePath)), true);
        $today = now()->format('Y-m-d');

        return $data['daily'][$today] ?? 0;
    }

    public static function getMonthlyVisitors()
    {
        if (!File::exists(base_path(self::$filePath))) {
            return 0;
        }

        $data = json_decode(File::get(base_path(self::$filePath)), true);
        $month = now()->format('Y-m');

        return $data['monthly'][$month] ?? 0;
    }
}
