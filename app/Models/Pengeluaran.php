<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Pengeluaran extends Model
{
    use HasFactory;
    protected $table='pengeluaran';
    protected $primaryKey='id';
    public $incrementing=true;
    public $timestamps=false;
    protected $keyType='integer';
    protected $fillable=[
      'keterangan',
      'jumlah',
      'harga',
      'satuan',
      'created_at'
    ];
}
