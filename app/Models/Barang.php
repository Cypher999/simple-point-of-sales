<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Pembelian as PembelianM;
use App\Models\Penjualan as PenjualanM;
class Barang extends Model
{
    use HasFactory;
    protected $table='barang';
    protected $primaryKey='id';
    public $incrementing=true;
    public $timestamps=false;
    protected $keyType='integer';
    protected $fillable=[
      'nama',
      'harga',
      'stok'
    ];
    public function pembelian(){
        return $this->hasMany(PembelianM::class,'pembelian_id','id');
    }
    public function penjualan(){
        return $this->hasMany(PenjualanM::class,'penjualan_id','id');
    }
}
