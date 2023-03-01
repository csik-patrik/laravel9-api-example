<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class FoodCategoryFilter extends ApiFilter {
    protected $allowedParms = [
        'name' => ['eq']
    ];

    protected $operatorMap = [
        'eq' => '='
    ];
}
