<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Http\Resources\EvaluationResource;
use App\Http\Requests\StoreEvaluationRequest;

class StoreEvaluationController extends Controller
{
    public function __construct(protected Evaluation $repository)
    {
    }

    /**
     * Display a listing of the resource.
     * 
     * @param StoreEvaluationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function handle(StoreEvaluationRequest $request)
    {
        $evaluations = $this->repository->create($request->all());

        return (new EvaluationResource($evaluations))
            ->response()->setStatusCode(201);
    }
}
