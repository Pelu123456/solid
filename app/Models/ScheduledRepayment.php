<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledRepayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'loan_id',
        'state_id',
        'repaymetn_date',
        'amount'
    ];
}
