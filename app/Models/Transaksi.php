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
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
  
    public function DetailTransaksi()
    {
        return $this->hasMany(Detail_Transaksi::class , 'transaksi_id');
    }
}
