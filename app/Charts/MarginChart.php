<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Margin;
use App\Models\SalesOrder;
use App\Models\DeliveryOrder;
use App\Models\Customer;
use App\Charts\MarginChart;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Exception;
use PDOException;
use Carbon\Carbon;

class MarginChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $deliveryOrderData = DB::table('deliveryorder')
        ->select(
            'deliveryorder.id_so',
            'deliveryorder.id_do',
            'deliveryorder.tanggal_pembelian as tanggal_pembelian',
            'deliveryorder.hargaPerKg as harga_pembelian',
            'deliveryorder.total_kg as total_kg',
            'deliveryorder.etoll as etoll',
            'deliveryorder.uang_jalan as uang_jalan', // Seharusnya uang_jalan
            'deliveryorder.uang_tangkap as uang_tangkap',
            'deliveryorder.solar as solar',
            'deliveryorder.keterangan as keterangan',
            'customer.id_customer',
            'customer.nama as nama_customer',
            'customer.nomor_telepon as nomor_telepon',
            'customer.alamat as alamat',
            'suplier.nama_suplier as nama_suplier',
            'salesorder.tanggal as tanggal_penjualan',
            'salesorder.hargaPerKg as harga_penjualan',
            'salesorder.jumlahKg as jumlah_pembelian',
            'verifikasi.id_verifikasi',
            'verifikasi.gp_rp as gp_rp',
            'verifikasi.gp as gp',
            'verifikasi.tonase_akhir as tonase_akhir',
            'verifikasi.normal as normal',
            // ... (other columns you need)
        )
        ->leftJoin('salesorder', 'deliveryorder.id_so', '=', 'salesorder.id_so')
        ->leftJoin('verifikasi', 'deliveryorder.id_do', '=', 'verifikasi.id_do')
        ->leftJoin('suplier', 'deliveryorder.id_suplier', '=', 'suplier.id_suplier')
        ->leftJoin('customer', 'salesorder.id_customer', '=', 'customer.id_customer')
        ->whereNotNull('verifikasi.id_do')
        ->get();
        $increment = 1; // Inisialisasi increment
        $marginData = []; 
        $totalMargin = 0; 
        foreach ($deliveryOrderData as $do) {
            $transaksi_id = "TRANS-" . str_pad($increment, 5, '0', STR_PAD_LEFT);
            $harga_total_beli = $do->total_kg * $do->harga_pembelian;
            $gp_total = $do->gp * $do->gp_rp;
            $margin_kg = $do->harga_penjualan - $do->harga_pembelian;
            $normal = $do->harga_penjualan * $do->tonase_akhir;
            $penjualan_akhir = $gp_total + $normal;
            $margin_harian = $penjualan_akhir - $harga_total_beli;
            $total_operational = $do->uang_jalan + $do->uang_tangkap + $do->solar + $do->etoll;
            $laba = $margin_harian - $total_operational;
        
            $marginData[] = [
                'Transaksi ID' => $transaksi_id,
                'ID Penjualan' => $do->id_so,
                'Nama Customer' => $do->nama_customer,
                'ID Pembelian' => $do->id_do,
                'Nama Suplier' => $do->nama_suplier,
                'Tanggal Penjualan' => $do->tanggal_penjualan,
                'Tanggal Pembelian' => $do->tanggal_pembelian,
                'Harga Penjualan' => $do->harga_penjualan,
                'Harga Pembelian' => $do->harga_pembelian,
                'Margin Harian' => $margin_harian,
                'Keterangan' => $do->keterangan,
                'Harga Beli' => $harga_total_beli,
                'GP(Rp)' => $gp_total,
                'Harga Jual' => $do->harga_penjualan,
                'Margin/Kg' => $margin_kg,
                'Harga Total Pembelian' => $harga_total_beli,
                'Gp Total' => $gp_total,
                'Normal' => $normal,
                'Penjualan Akhir' => $penjualan_akhir,
                'Margin Harian' => $margin_harian,
                'Uang Jalan' => $do->uang_jalan,
                'Uang Tangkap' => $do->uang_tangkap,
                'Solar' => $do->solar,
                'E-Toll' => $do->etoll,
                'Total Operasional' => $total_operational,
                'Laba' => $laba,
            ];
            $totalMargin += $margin_harian; 
            $increment++;
        }
        $currentWeek = Carbon::now()->startOfWeek();
        $endDate = Carbon::now()->startOfWeek()->addDays(6);

        $filteredMarginData = array_filter($marginData, function ($mar) use ($currentWeek, $endDate) {
            $tanggalPembelian = Carbon::parse($mar['Tanggal Pembelian']);
            return $tanggalPembelian->between($currentWeek, $endDate);
        });

        $chartData = collect($filteredMarginData)
        ->take(7)
        ->sortByDesc('Tanggal Pembelian') // Menyusun data berdasarkan tanggal pembelian
        ->values() // Mengembalikan ulang indeks array
        ->reverse();

        $marginHarian = $chartData->pluck('Margin Harian')->toArray();
        $tanggalPembelian = $chartData->pluck('Tanggal Pembelian')->toArray();

        $chart = $this->chart->lineChart()
            ->setColors(['#5e72e4'])
            ->setTitle('Margin Harian 7 Hari Terakhir.', ['#5e72e4'])
            ->addData('Margin Harian', $marginHarian)
            ->setHeight(380)
            ->setFontColor('#ced4da')
            ->setXAxis($tanggalPembelian);

        return $chart;
    }
}
