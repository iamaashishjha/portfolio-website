<?php

namespace App\Http\Controllers\Admin\PaymentSetups;

use App\Models\PaymentGateways;
use Illuminate\Support\Facades\Log;
use App\Traits\Base\BaseAdminController;
use App\Http\Requests\Admin\Payment\PaymentGatewayRequest;

class PaymentGatewayController extends BaseAdminController
{
    protected $model, $repo, $context;
    public $data;

    public function __construct(PaymentGateways $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        try {
            $this->checkPermission('list');
            $this->data['data'] = $this->repo->index();
            return view('ar.payment_setups.payment_gateways.index', $this->data);
        } catch (\Exception $ex) {
            Log::error($this->context . "@index => ", ["error_message" => $ex->getMessage()]);
            return redirect()->back()->with('error', "Oops! Something went wrong.");
        }
    }

    public function create()
    {
        try {
            $this->checkPermission('create');
            return view('ar.payment_setups.payment_gateways.form');
        } catch (\Exception $ex) {
            Log::error($this->context . "@create => ", ["error_message" => $ex->getMessage()]);
            return redirect()->back()->with('error', "Oops! Something went wrong.");
        }
    }

    public function store(PaymentGatewayRequest $request)
    {
        try {
            $this->checkPermission('create');
            $this->repo->storeOrUpdate($request->validated());
            return redirect()->back()->with('success', "Payment Gateway Successfully Added.");
        } catch (\Exception $ex) {
            Log::error($this->context . "@store => ", ["error_message" => $ex->getMessage()]);
            return redirect()->back()->with('error', "Oops! Something went wrong.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $this->checkPermission('update');
            $this->data['data'] = $this->repo->find($id);
            return view('payment_setups.payment_gateways.form', $this->data);
        } catch (\Exception $ex) {
            Log::error($this->context . "@edit => ", ["error_message" => $ex->getMessage()]);
            return redirect()->back()->with('error', "Oops! Something went wrong.");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentGatewayRequest $request, $id)
    {
        try {
            $this->checkPermission('update');
            $this->repo->storeOrUpdate($request->validated(), $id);
            return redirect()->back()->with('success', "Payment Gateway Successfully Updated.");
        } catch (\Exception $ex) {
            Log::error($this->context . "@update => ", ["error_message" => $ex->getMessage()]);
            return redirect()->back()->with('error', "Oops! Something went wrong.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->checkPermission('delete');
            $this->repo->delete($id);
            return redirect()->back()->with('success', "Payment Gateway Successfully Deleted.");
        } catch (\Exception $ex) {
            Log::error($this->context . "@update => ", ["error_message" => $ex->getMessage()]);
            return redirect()->back()->with('error', "Oops! Something went wrong.");
        }
    }
}
