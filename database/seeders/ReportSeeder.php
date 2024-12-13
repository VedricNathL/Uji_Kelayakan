<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    public function run()
    {
        Report::create([
            'user_id' => 1,
            'description' => 'Pencurian motor di wilayah pasar.',
            'type' => 'Kejahatan',
            'province' => 'Jawa Barat',
            'regency' => 'Bandung',
            'subdistrict' => 'Coblong',
            'village' => 'Dago',
            'voting' => 15,
            'viewers' => 120,
            'image' => 'reports/image1.jpg',
            'statement' => 'Kejadian terjadi pada malam hari.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan data laporan lainnya sesuai kebutuhan
    }
}
