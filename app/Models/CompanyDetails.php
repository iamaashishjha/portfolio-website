<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetails extends Model
{
    use HasFactory;

    protected $table = 'company_details';

    protected $fillable = [
        'about_us', 'our_history',
        'our_vision', 'our_mission',
        'created_by', 'deleted_by', 'updated_by'
    ];

    
}
