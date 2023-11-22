<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $casts = [
        'ad_id' => 'string',
        'impressions' => 'string',
        'clicks' => 'string',
        'unique_clicks' => 'string',
        'leads' => 'string',
        'conversion' => 'string',
        'roi' => 'string',
    ];

    protected $fillable = [
        'id',
        'ad_id',
        'impressions',
        'clicks',
        'unique_clicks',
        'leads',
        'conversion',
        'roi',
    ];

}
