<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class InvoiceFilter extends ApiFilter
{

    protected $safeParms=[
        'customerId'=>['eq'],
        'amount'=>['eq','ne','lt','gt','lte','gte'],
        'status'=>['eq','ne'],
        'billedDate'=>['eq','ne','lt','gt','lte','gte'],
        'paidDate'=>['eq','ne','lt','gt','lte','gte'],
    ];
    protected $columnMap=[
        'customerId'=>'customer_id',
        'billedDate'=>'billed_date',
        'paidDate'=>'paid_date',
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
