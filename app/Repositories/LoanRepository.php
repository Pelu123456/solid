<?php

namespace App\Repositories;

use App\Models\Loan;

class LoanRepository implements LoanReposityInterface
{
    protected $model;

    public function __construct(Loan $model)
    {
        $this->model = $model;
    }

    public function getAllLoan(){
        return $this->model->all();
    }

    public function findLoan($id){
        return $this->model->findOrFail($id);
    }

    public function CreateLoan($data = []){
        return $this->model->create($data);
    }

    public function Destory($id){
        return $this->model->delete($id);
    }
   

}
