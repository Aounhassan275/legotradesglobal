<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name','price','direct_income','indirect_income','weekly_roi','withdraw_limit'
    ];
}
