<?php

namespace App\Services;

use App\Services\Traits\ConsumeExternalService;
use stdClass;

class CompanyService
{
    use ConsumeExternalService;

    public function __construct()
    {
        $this->key = config('services.company.key');
        $this->url = config('services.company.url');
    }

    /**
     * @param string $id
     * 
     * @return stdClass|null
     */
    public function getCompany(string $id): ?stdClass
    {
        $response = $this->request('GET', "/companies/{$id}");

        if ($response->status() !== 200) {
            return null;
        }

        return $response->object()->data;
    }
}
