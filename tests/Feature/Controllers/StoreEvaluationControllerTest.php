<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Evaluation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreEvaluationControllerTest extends TestCase
{
    use RefreshDatabase;

    protected Evaluation $entity;

    public function __construct()
    {
        parent::__construct();
        $this->entity = new Evaluation();
    }

    /** @test */
    public function should_create_a_evaluation()
    {
        $evaluation = $this->entity->factory()->make()->toArray();
        $response = $this->json('POST', '/evaluations', $evaluation);

        $response->assertStatus(201);
        $this->assertDatabaseHas('evaluations', $evaluation);
    }
}
