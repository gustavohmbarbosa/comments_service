<?php

namespace Tests\Feature;

use App\Models\Evaluation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetCompanyEvaluationsControllerTest extends TestCase
{
    use RefreshDatabase;

    protected Evaluation $entity;

    public function __construct()
    {
        parent::__construct();
        $this->entity = new Evaluation();
    }

    /** @test */
    public function should_return_all_company_evaluations()
    {
        $evaluation = $this->entity->factory()->create();
        $company = $evaluation->company;

        $response = $this->json('GET', "/{$company}/evaluations");

        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }
}
