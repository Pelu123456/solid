<?php

namespace App\Repositories;

use App\Models\ScheduledRepayment;
use App\Models\Loan;

interface LoanRepositoryInterface{
    public function getAllLoan();
    public function findLoan($id);
    public function CreateLoan($data = []);
    public function Destory($id);
}
