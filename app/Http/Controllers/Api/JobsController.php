<?php

namespace App\Http\Controllers\Api;

use App\Models\Jobs;
use Orion\Http\Controllers\Controller;

class JobsController extends Controller
{
    protected $model = Jobs::class;

    protected function authorizationRequired(): bool
    {
        return false;
    }

    public function alwaysIncludes(): array
    {
        return ['companies', 'persons'];
    }

    public function filterableBy(): array
    {
        return ['id', 'companies_id', 'start_date', 'end_date', 'persons_id'];
    }
}
