<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Transaction extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';
}
