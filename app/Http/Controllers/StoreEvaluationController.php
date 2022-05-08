<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Http\Resources\EvaluationResource;

class StoreEvaluationController extends Controller
{
    public function __construct(protected Evaluation $repository)
    {
    }

    /**
     * Display a listing of the resource.
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request)
    {
        $evaluations = $this->repository->create($request->all());

        return (new EvaluationResource($evaluations))
            ->response()->setStatusCode(201);
    }
}
