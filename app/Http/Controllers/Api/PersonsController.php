<?php

namespace App\Http\Controllers\Api;

use App\Models\Persons;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class PersonsController extends Controller
{
    protected $model = Persons::class;


    protected function beforeSave(Request $request, Model $entity)
    {
        $age = round(now()->diffInYears(Carbon::parse($request->birth_date)));
        if ($age < -150) {
            abort(422, 'L\'âge ne peut pas dépasser 150 ans.');
        }
    }

    public function alwaysIncludes(): array
    {
        return ['jobs', 'jobs.companies'];
    }

    public function searchableBy(): array
    {
        return ['lastname'];
    }

    public function filterableBy(): array
    {
        return ['lastname', 'firstname', 'jobs.title', 'jobs.companies_id', 'jobs.end_date', 'jobs.start_date', 'jobs.persons_id'];
    }

    public function sortableBy(): array
    {
        return ['lastname', 'firstname'];
    }

    public function limit(): int
    {
        return 50;
    }

    protected function authorizationRequired(): bool
    {
        return false;
    }
}
