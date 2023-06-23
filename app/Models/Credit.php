<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    protected $casts = [
        'card_number' => 'encrypted',
        'security_code' => 'encrypted',
        'name' => 'encrypted',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
