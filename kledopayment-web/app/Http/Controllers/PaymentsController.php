<?php

namespace App\Http\Controllers;

use App\Events\PaymentDeleteEvent;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Helper\CallApiHelper;


class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($page = null)
    {   
        if ($page) 
        {
            $payments = CallApiHelper::getApi('/payments?page='.$page);
        } else
        {
            $payments = CallApiHelper::getApi('/payments');
        }
        
        
        return view('payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = CallApiHelper::postApi('/payments', $request->all());
        if ($request['payment']['created_at'])
        {
            return redirect()->route('payment.index')
                        ->with('success','Payment created successfully.');
        } else {
            return redirect()->route('payment.index')
                        ->with('error','Payment cannot be created.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        // return response(['payment' => new PaymentResource($payment), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $arr_id = $request->input('checkbox_del');
        foreach($arr_id as $id) {
            $req = CallApiHelper::deleteApi("/payments/".$id);
        }
        return redirect()->route('payment.index')
                        ->with('success','Payment in the queue for deleting');
    }
}
