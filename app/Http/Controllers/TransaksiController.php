<?php

namespace App\Http\Controllers;
use App\Models\AddIn;
use App\Models\Addout;
use App\Models\Pemasok;
use App\Models\Barang;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;


class TransaksiController extends Controller
{
    // Default Transaksi
    public function index(){
        
        return view('transaksi.index');
    }


    // Tabel Barang Masuk
    public function masuk_index(){
        $addin = AddIn::with('barang')->latest()->get();
        return view('transaksi.masuk', compact('addin'));
    }

    // Form Modal Barang Masuk
    public function create_masuk(){
        $addin = Barang::with('pemasok')->get();
        return view('transaksi.in.create', compact('addin'));
    }

    // Add Function Store Barang Masuk
    public function store_masuk(Request $request){
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required|numeric|min:1',
        ]);
    
        // Simpan data barang masuk
        $barcode = 'TRM-' . uniqid(); // Sesuaikan dengan format yang diinginkan
        $addin = AddIn::create([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'qr_code' => $barcode,
        ]);
    
        // Generate QR Code
        QrCode::size(300)->format('png')->generate($barcode, public_path('qrcodes/' . $barcode . '.png'));
    
        // Update jumlah di tabel barang
        $barang = Barang::find($request->barang_id);
        $barang->jumlah += $request->jumlah;
        $barang->save();
    
        return redirect()->route('transaksi.masuk.index')->with('success', 'Transaksi Masuk Berhasil Ditambahkan, Stok Bertambah!');
    }
    
    // Delete Barang Masuk
    public function destroy_masuk($id){
        $addin = AddIn::findOrFail($id);
        $barang = $addin->barang;
        $addin->delete();
         // Update stok barang
    if ($barang) {
        $barang->jumlah -= $addin->jumlah;
        $barang->save();
    }
    return redirect()->route('transaksi.masuk.index')->with('success', 'Transaksi Dihapus, Stok berkurang!');

    }
     // Delete Barang Masuk
     public function destroy_keluar($id){
        $addout = AddOut::findOrFail($id);
        $barang = $addout->barang;
        $addout->delete();
         // Update stok barang
    if ($barang) {
        $barang->jumlah += $addout->jumlah;
        $barang->save();
    }
    return redirect()->route('transaksi.keluar.index')->with('success', 'Transaksi Dihapus, Stok bertambah!');

    }

        // Tabel Barang Keluar    
        public function keluar_index(){
            $addout = AddOut::with('barang')->latest()->get();
            return view('transaksi.keluar', compact('addout'));
        }
        
        // Form Modal Barang Keluar
        public function create_keluar(){
        $addout = Barang::with('pemasok')->get();
        return view('transaksi.out.create', compact('addout'));
    }

    public function store_keluar(Request $request){
        $request->validate =[
            'barang_id' => 'required',
            'jumlah' => 'required|numeric|min:1',
        ];
        // Simpan data barang masuk
        $barcode = 'TRM-' . uniqid(); // Sesuaikan dengan format yang diinginkan

        $addin = AddOut::create([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'qr_code' => $barcode,
            'deskripsi' => $request->deskripsi, 
        ]);

         // Generate QR Code
         QrCode::size(300)->format('png')->generate($barcode, public_path('qrcodes/' . $barcode . '.png'));

         // Update jumlah di tabel barang
        $barang = Barang::find($request->barang_id);
        $barang->jumlah -= $request->jumlah;
        $barang->save();

        return redirect()->route('transaksi.keluar.index')->with('success', 'Transaksi Keluar Berhasil Ditambahkan, Stok Berkurang!');
    }

        // Generate PDF
    public function generatePDFin($id){
        
        $data = AddIn::with('barang')->find($id);
        // dd($data->barang->nama_barang);
        $deskripsi = 'Transaksi Masuk';
        if (!$data) {
            return abort(404, 'Data not found');
        }
        $pdf = PDF::loadView('pdf.template', compact('data','deskripsi'));
        return $pdf->stream('transaksi_masuk'.$id.'.pdf');
    }
    public function generatePDFout($id){
         // dd($data->barang->nama_barang);
         $data = AddOut::with('barang')->find($id);
         $deskripsi = 'Transaksi Keluar';
         if (!$data) {
            return abort(404, 'Data not found');
        }
        $pdf = PDF::loadView('pdf.template', compact('data','deskripsi'));
        return $pdf->stream('transaksi_keluar'.$id.'.pdf');
    }
    

    // Scan QR Out
    public function scanQROut(Request $request){
        // Mendapatkan nilai dari input barcode
    $barcode = $request->input('barcodeInput');
    
    // Mencari data berdasarkan kolom qr_code
    $data = AddOut::where('qr_code', $barcode)->first();

    if ($data) {
        // // Data ditemukan, lakukan sesuatu dengan data tersebut
        // return redirect()->route('transaksi.out.index',['data' => $data]);
        return view('transaksi.out.index', compact('data'));
        
    } else {
        // Data tidak ditemukan
        return redirect()->route('transaksi.keluar.index')->with('danger', 'Data tidak ada dalam pencarian!');
    }
    }

    public function showOut($id){
        $data = AddOut::find($id);
        return view('transaksi.out.index', ['data' => $data]);
    }

    // Print All PDF
    public function printAll(Request $request){
        $jenis = $request->route()->getName();
        if ($jenis == 'print.in.all') {
            $detail = 'Transaksi Masuk';
            $data = AddIn::all();
            $count = $data->count(); // Gantilah dengan model dan data sesuai kebutuhan transaksi in
            $filename = now()->format('Ymd').'-in'. '.pdf';
        } elseif ($jenis == 'print.out.all') {
            $detail = 'Transaksi Keluar';
            $data = AddOut::all();
            $count = $data->count(); // Gantilah dengan model dan data sesuai kebutuhan transaksi in // Gantilah dengan model dan data sesuai kebutuhan transaksi out
            $filename = now()->format('Ymd').'-out'. '.pdf';
        } else {
            // Handle kasus lain jika diperlukan
            dd('error');
        }

        $pdf = PDF::loadView('pdf.template_all', compact('data','detail','count'));
        return $pdf->download($filename);
    }

}
