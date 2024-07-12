<?php

namespace App\Services;

use App\Repositories\LoanRepositoryInterface;
use App\Http\Requests\LoanRequest;

class LoanService implements LoanServiceInterface
{
    protected $repository;

    public function __construct(LoanRepositoryInterface $repository)
    {
        return $this->repository = $repository;
    }

    public function getAllLoan()
    {
        return $this->repository->getAllLoan();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function CreateLoan(LoanRequest $request)
    {
        $data = $request->validated();
        $loan = $this->repository->create($data);
    }


}
