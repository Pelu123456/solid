<?php

namespace App\Repositories;

use App\Models\ScheduledRepayment;
use App\Models\Loan;

interface LoanRepositoryInterface{
    public function getAllLoan();
    public function getUserLoan($user_id);
    public function findLoan($id);
    public function CreateLoan($data = []);
    public function Destroy($id);
    public function Approve($id);
}
