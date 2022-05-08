<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Http\Resources\EvaluationResource;

class GetCompanyEvaluationsController extends Controller
{
    public function __construct(protected Evaluation $repository)
    {
    }

    /**
     * Display a listing of the resource.
     * 
     * @param string $company
     * @return \Illuminate\Http\Response
     */
    public function handle(string $company)
    {
        $evaluations = $this->repository->where('company', $company)->get();

        return EvaluationResource::collection($evaluations);
    }
}
