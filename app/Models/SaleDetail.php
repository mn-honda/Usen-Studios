<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function sale() {
        return $this->belongsTo(Sale::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function size() {
        return $this->belongsTo(Size::class);
    }

}
