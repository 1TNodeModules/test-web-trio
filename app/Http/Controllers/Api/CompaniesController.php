<?php

namespace App\Http\Controllers\Api;

use App\Models\Companies;
use Orion\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    protected $model = Companies::class;

    public function includes(): array
    {
        return ['name'];
    }

    protected function authorizationRequired(): bool
    {
        return false;
    }
}
