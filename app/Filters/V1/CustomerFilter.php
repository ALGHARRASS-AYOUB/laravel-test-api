<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class CustomerFilter extends ApiFilter
{
    protected $safeParms=[
        'name'=>['eq'],
        'type'=>['eq'],
        'email'=>['eq'],
        'address'=>['eq'],
        'city'=>['eq'],
        'state'=>['eq'],
        'postalCode'=>['eq','ne','lt','gt','lte','gte'],
    ];
    protected $columnMap=[
        'postalCode'=>'postal_code',
    ];
    protected $operatorMap=[
        'eq'=>'=',
        'ne'=>'!=',
        'lt'=>'<',
        'gt'=>'>',
        'lte'=>'<=',
        'gte'=>'>=',
    ];
}
