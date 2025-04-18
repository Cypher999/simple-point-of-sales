<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Barang as BarangM;
class Penjualan extends Model
{
    use HasFactory;
    protected $table='penjualan';
    protected $primaryKey='id';
    public $incrementing=true;
    public $timestamps=false;
    protected $keyType='integer';
    protected $fillable=[
      'barang_id',
      'jumlah',
      'created_at'
    ];
    public function barang(){
        return $this->belongsTo(BarangM::class,'barang_id','id');
    }
}
