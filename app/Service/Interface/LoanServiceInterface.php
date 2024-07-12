<?php

namespace App\Services;

use App\Models\Loan;

interface LoanServiceInterface
{
    public function getAllLoan();
    public function findLoan($id);
    public function CreateLoan(LoanRequest $request);
    public function Destory($id);
}
