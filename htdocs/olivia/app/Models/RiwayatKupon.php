<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatKupon extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'kupon_id',
        'status_id',
        'kode'
    ]; 
    
    use HasFactory;

    public function kupon(){
        return $this->belongsTo(Kupon::class,'kupon_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status(){
        return $this->belongsTo(StatusVoucher::class);
    }
}
