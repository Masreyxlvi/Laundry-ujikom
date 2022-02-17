<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    // public function scopeFilter($query, array $filters)
    // {
    //     $query->when($filters['search'] ?? false, function($query, $seacrh) {
    //         return $query->where('tgl', 'like', '%' . $seacrh . '%');
    //     });
    // }
    // public function detail()
    // {
    //     return $this->hasMany(Detail_Transaksi::class);
    // }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
    public function DetailTransaksi()
    {
        return $this->hasMany(Detail_Transaksi::class);
    }
    
    public static function get_code()
    {
        $no_urut = self::selectRaw("IFNULL(MAX(SUBSTRING(`kode_invoice`,8,5)),0) + 1 AS no_urut")->orderBy('no_urut')->first()->no_urut;
        $kode_invoice = "GL" . date("Ym") . sprintf("%'.02d", $no_urut);
        return $kode_invoice;
    }

    public function getSubTotal()
    {
        $total = $this->DetailTransaksi->reduce( function($carry, $item) {
            return $carry + $item->paket->harga; 
        });
    }
}
