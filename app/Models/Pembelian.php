<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Barang as BarangM;
class Pembelian extends Model
{
    use HasFactory;
    protected $table='pembelian';
    protected $primaryKey='id';
    public $incrementing=true;
    public $timestamps=false;
    protected $keyType='integer';
    protected $fillable=[
      'barang_id',
      'jumlah',
      'harga',
      'suplier',
      'created_at'
    ];
    public function barang(){
        return $this->belongsTo(BarangM::class,'barang_id','id');
    }
}
