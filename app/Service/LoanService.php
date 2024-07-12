<?php

namespace App\Services;

use App\Repositories\LoanRepositoryInterface;
use App\Http\Requests\LoanRequest;
use App\Enum\LoanState;

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

    public function getUserLoan($user_id)
    {
        return $this->repository->getUserLoan($user_id);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function CreateLoan(LoanRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['state'] = LoanState::PENDING;
        return $this->repository->create($data);
    }

    public function Approve($id)
    {
        try{
            DB::beginTransaction();

            $loan = $this->repository->Approve($id);

            DB::commit();
            return $loan;
        }catch(\Exception $e){
            
            DB::rollback();

            throw new \Exception("Failed to approve loan: " . $e->getMessage());
        }
         
    }


}
