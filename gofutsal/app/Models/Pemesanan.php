<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Pemesanan extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class,'user_id');    
    }

    public function lapangan(): BelongsTo 
    {
        return $this->belongsTo(Lapangan::class,'lapangan_id');    
    }

    public function pembayaran(): BelongsTo 
    {
        return $this->belongsTo(Pembayaran::class,'pembayaran_id');    
    }

    public function peralatan(): BelongsTo 
    {
        return $this->belongsTo(Peralatan::class,'peralatan_id');    
    }

}
