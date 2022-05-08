<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Services\CompanyService;
use App\Http\Resources\EvaluationResource;
use App\Http\Requests\StoreEvaluationRequest;

class StoreEvaluationController extends Controller
{
    public function __construct(
        protected Evaluation $repository,
        protected CompanyService $service
    ) {
    }

    /**
     * Display a listing of the resource.
     * 
     * @param StoreEvaluationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function handle(StoreEvaluationRequest $request)
    {
        $data = $request->all();

        $company = $this->service->getCompany($data['company']);

        if (!$company) {
            return response()->json(['message' => 'invalid company'], 400);
        }

        $evaluations = $this->repository->create($data);

        return (new EvaluationResource($evaluations))->response()->setStatusCode(201);
    }
}
