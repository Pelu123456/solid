<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'loan_id',
        'state_id',
        'repayment_date',
        'amount'
    ];
}
