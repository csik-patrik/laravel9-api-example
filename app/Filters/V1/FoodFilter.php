<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class FoodFilter extends ApiFilter {

    protected $allowedParms = [
        'name' => ['eq'],
        'price' => ['eq', 'gt', 'lt', 'gte'],
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'gte' => '>=',
    ];

}
