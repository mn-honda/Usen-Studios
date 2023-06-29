<?php

namespace App\Models;

use Carbon\Traits\ToStringFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Carbon\Carbon;

class Sale extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function delivery() {
        return $this->hasOne(Delivery::class);
    }

    public function sale_details() {
        return $this->hasMany(SaleDetail::class);
    }
    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];

    public static function sale_month_list($year) {
        $origin_data = Sale::whereYear('created_at', $year)->orderBy('created_at')->get()->groupBy(function ($row) {
            return $row->created_at->format('m');
        })->map(function ($month) {
            return $month->sum('amount');
        });
        $sale_list = [];
        for ( $i = 1; $i <= 12; $i++ ) {
            $origin_index = $i;
            if ( $i < 10 ) {
                $origin_index = "0{$i}";
            }
            if ( isset($origin_data[$origin_index]) ) {
                $sale_list[$i] = $origin_data[$origin_index];
            } else {
                $sale_list[$i] = 0;
            }
        }
        return $sale_list;
    }


}
