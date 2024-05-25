<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Models\PaymentGateways;
use App\Repositories\AdminEloquentResourceRepository;
use App\Traits\Base\BaseAdminController;
use Illuminate\Support\Facades\Log;

class PaymentGatewayController extends BaseAdminController
{
    protected $model;
    protected $repo;
    protected $context;
    public $data;

    public function __construct(PaymentGateways $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->repo = new AdminEloquentResourceRepository($model);
        $this->context = class_basename($model);
    }

    public function index(){
        try {
            $this->data['data'] = $this->repo->index();
            return view('ar.payment_setups.payment_gateways.index', $this->data);
        } catch (\Exception $ex){
            Log::error($this->context."@index => ", [
                "error_message" => $ex->getMessage(),
                "error_trace" => $ex->getTraceAsString()
            ]);
            return redirect()->back()->with('error', "Oops! Something went wrong.");
        }
    }

    public function create(){
        try {

            return  view('ar.payment_setups.payment_gateways.form');
        } catch (\Exception $ex) {
            Log::error($this->context."@index => ", [
                "error_message" => $ex->getMessage(),
                "error_trace" => $ex->getTraceAsString()
            ]);
            return redirect()->back()->with('error', "Oops! Something went wrong.");
        }
    }
}
