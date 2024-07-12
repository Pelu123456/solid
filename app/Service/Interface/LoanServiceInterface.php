<?php

namespace App\Services;

use App\Models\Loan;

interface LoanServiceInterface
{
    public function getAllLoan();
    public function findLoan($id);
    public function getUserLoan($user_id);
    public function CreateLoan(LoanRequest $request);
    public function Approve($id);
    public function Destroy($id);
}
