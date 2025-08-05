<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed barang - Smartphone dari berbagai brand
        $barangs = [
            // Samsung
            ['kode_barang' => 'SAMS001', 'nama_barang' => 'Samsung Galaxy S23 Ultra', 'harga' => 19999000],
            ['kode_barang' => 'SAMS002', 'nama_barang' => 'Samsung Galaxy A54 5G', 'harga' => 5999000],
            ['kode_barang' => 'SAMS003', 'nama_barang' => 'Samsung Galaxy Z Flip5', 'harga' => 14999000],
            ['kode_barang' => 'SAMS004', 'nama_barang' => 'Samsung Galaxy M34 5G', 'harga' => 3999000],
            
            // Poco
            ['kode_barang' => 'POCO001', 'nama_barang' => 'Poco X5 Pro 5G', 'harga' => 4499000],
            ['kode_barang' => 'POCO002', 'nama_barang' => 'Poco M5s', 'harga' => 2499000],
            ['kode_barang' => 'POCO003', 'nama_barang' => 'Poco F5', 'harga' => 5999000],
            ['kode_barang' => 'POCO004', 'nama_barang' => 'Poco C65', 'harga' => 1799000],
            
            // Xiaomi
            ['kode_barang' => 'XM001', 'nama_barang' => 'Xiaomi 13T Pro', 'harga' => 9999000],
            ['kode_barang' => 'XM002', 'nama_barang' => 'Xiaomi Redmi Note 12 Pro', 'harga' => 4499000],
            ['kode_barang' => 'XM003', 'nama_barang' => 'Xiaomi Redmi 12C', 'harga' => 1499000],
            ['kode_barang' => 'XM004', 'nama_barang' => 'Xiaomi Pad 6', 'harga' => 6999000],
            
            // ZTE
            ['kode_barang' => 'ZTE001', 'nama_barang' => 'ZTE Nubia Red Magic 8 Pro', 'harga' => 12999000],
            ['kode_barang' => 'ZTE002', 'nama_barang' => 'ZTE Blade V40 Vita', 'harga' => 2299000],
            ['kode_barang' => 'ZTE003', 'nama_barang' => 'ZTE Axon 40 Ultra', 'harga' => 10999000],
            ['kode_barang' => 'ZTE004', 'nama_barang' => 'ZTE Blade A72', 'harga' => 1799000],
            
            // Varian lainnya
            ['kode_barang' => 'SAMS005', 'nama_barang' => 'Samsung Galaxy S23+', 'harga' => 14999000],
            ['kode_barang' => 'POCO005', 'nama_barang' => 'Poco F5 Pro', 'harga' => 7999000],
            ['kode_barang' => 'XM005', 'nama_barang' => 'Xiaomi 13 Lite', 'harga' => 6999000],
            ['kode_barang' => 'ZTE005', 'nama_barang' => 'ZTE Nubia Z50', 'harga' => 8999000],
        ];

        foreach ($barangs as $barang) {
            Barang::create($barang);
        }

        // Seed transaksi dan detail transaksi untuk 30 hari terakhir
        for ($i = 0; $i < 100; $i++) {
            $tanggal = Carbon::now()->subDays(rand(0, 30))->subHours(rand(0, 24))->subMinutes(rand(0, 60));
            
            $transaksi = Transaksi::create([
                'tanggal' => $tanggal,
                'total_barang' => 0, // akan diupdate nanti
                'total_harga' => 0, // akan diupdate nanti
            ]);

            $total_barang = 0;
            $total_harga = 0;
            $jumlah_barang_dalam_transaksi = rand(1, 3); // Biasanya orang beli 1-3 hp sekaligus

            for ($j = 0; $j < $jumlah_barang_dalam_transaksi; $j++) {
                $barang = Barang::inRandomOrder()->first();
                $jumlah = rand(1, 2); // Biasanya beli 1-2 unit per jenis hp
                $harga = $barang->harga;

                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'barang_id' => $barang->id,
                    'harga' => $harga,
                    'jumlah' => $jumlah,
                ]);

                $total_barang += $jumlah;
                $total_harga += ($harga * $jumlah);
            }

            // Update total transaksi
            $transaksi->update([
                'total_barang' => $total_barang,
                'total_harga' => $total_harga,
            ]);
        }
    }
}