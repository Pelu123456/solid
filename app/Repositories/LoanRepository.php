<?php

namespace App\Repositories;

use App\Models\Loan;


class LoanRepository implements LoanRepositoryInterface
{
    protected $model;

    public function __construct(Loan $model)
    {
        $this->model = $model;
    }

    public function getAllLoan(){
        return $this->model->all();
    }

    public function getUserLoan($user_id)
    {
        return $this->model->where('user_id', $user_id)->get();
    }

    public function findLoan($id){
        return $this->model->findOrFail($id);
    }

    public function CreateLoan($data = []){
        try {
            return $this->model->create($data);
        } catch (\Exception $e) {
            throw new \Exception("Failed to create loan: " . $e->getMessage());
        }
    }

    public function Destroy($id){
        $record = $this->model->findOrFail($id);
        return $record->delete();
    }

    public function Approve($id)
    {
        try {
            $loan = $this->model->findOrFail($id);
        
            $loan->status = LoanStatus::APPROVED;
            $loan->save();
    
            return $loan;
        } catch (\Exception $e) {
           
            throw new \Exception("Failed to approve loan: " . $e->getMessage());
        }
    }
   

}
