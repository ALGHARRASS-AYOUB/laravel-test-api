<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\CustomerFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\V1\CustomerCollection;
use App\Http\Resources\V1\CustomerResource;
use App\Models\Customer;
use http\Header\Parser;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;
use Psy\Util\Json;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter=new CustomerFilter();
        $queryItems=$filter->transform($request);

        $includeInvoices=$request->query('includeInvoices');


        if(count($queryItems)==0){
            $customers= ($includeInvoices)?Customer::with('invoices')->paginate():Customer::paginate();
            return  new CustomerCollection($customers);
        }
        else{
            $customers= ($includeInvoices)?Customer::with('invoices')->where($queryItems)->paginate():Customer::where($queryItems)->paginate();
        return  new CustomerCollection($customers->appends($request->query()));
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customer=Customer::with('invoices')->findOrFail($customer->id);
        return  new CustomerResource($customer);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
