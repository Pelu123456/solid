<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoanRequest;
use App\Enums\UserRole;
use App\Services\Interface\LoanServiceInterface;

class LoanController extends Controllers
{
    protected $loanService;

    public function __construct(LoanServiceInterface $loanService)
    {
        $this->loanService = $loanService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            if (auth()->user()->role() === UserRole::User) {
                $loans = $this->loanService->getUserLoan(auth()->user()->id);
                return response()->json($loans, 200);
            } else {
                $loans = $this->loanService->getAllLoan();
                return response()->json($loans, 200);
            }   
        } catch (\Exception $e){
            return response()->json('Can not found loans', 500);
        }  
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(LoanRequest $request)
    {
        $loan = $this->loanService->CreateLoan($request);
        if ($loan) {
            return response()->json($loan, 201);
        }
        return response()->json(['message' => 'Failed to create loan.'], 500);
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $loan = $this->loanService->find($id);
        if($loan){
            return response()->json($loan,201);
        }
        return response()->json(['message' => 'Loan not found',500]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function approve(Request $request, string $id)
    {
    //    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
