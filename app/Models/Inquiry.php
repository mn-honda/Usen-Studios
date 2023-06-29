<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    public function sale_detail() {
        return $this->belongsTo(SaleDetail::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];
}
