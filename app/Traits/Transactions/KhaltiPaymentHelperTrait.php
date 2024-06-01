<?php

namespace App\Traits\Transactions;

use Exception;
use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

trait KhaltiPaymentHelperTrait
{
    public function getKhaltiConfigs($paymentGateway, $amount, $transactionId, $memberId)
    {
        if ($paymentGateway) {
            $member = Member::find($memberId);
            $secretKey = $paymentGateway->secret_key;
            $formSubmitUrl = $paymentGateway->base_url . "api/v2/epayment/initiate/";

            $memberInfo = [
                'name' => $member->name,
                'email' => $member->email ?? "admin@admin.com",
                'phone' => isset($member->mobile_number) ? $member->mobile_number : $member->phone_number,
            ];

            $authorizationHeader = ['Authorization' => "Key $secretKey"];

            $params = [
                'amount' => $amount * 100,
                'purchase_order_id' => $transactionId,
                'purchase_order_name' => "Member Form Payment",
                'website_url' => "http://127.0.0.1:8000",
                'return_url' => "http://127.0.0.1:8000/member/$memberId/payment-successful",
                'customer_info' => $memberInfo
            ];

            Log::debug("KHALTI-EPAYMENT-CONFIGS:", [
                'AUTHORIZATION-HEADER-DATA' => $authorizationHeader,
                'BODY-DATA' => $params,
                'FORM-SUBMIT-URL' => $formSubmitUrl,
            ]);
            $response = Http::withHeaders($authorizationHeader)->post($formSubmitUrl, $params);
            $response = $response->json();
            Log::debug("KHALTI-EPAYMENT-RESPONSE:", [
                'KHALTI-RESPONSE' => $response
            ]);
            if (isset($response['pidx'])) {
                return [
                    'success' => true,
                    'url' => $response['payment_url'],
                    'payment-method' => 'Khalti'
                ];
            } else {
                return [
                    'success' => false,
                    'message' => $response['detail']
                ];
            }
        }
    }

    public function processKhaltiSuccessfullTransaction(array $requestsArr, int $memberId)
    {
        Log::info("KHALTI-PROCESS-SUCCESSFUL-TRANSACTION:", [
            'TRANSACTION_DATA' => $requestsArr,
            'TRANSACTION_TRANSACTION_ID' => $requestsArr['purchase_order_id'],
            'TRANSACTION_PAYMENT_GATEWAY_ID' => 2,
            'TRANSACTION_PAYMENT_GATEWAY_NAME' => 'KHALTI',
            'TRANSACTION_MEMBER_ID' => $memberId,
        ]);
        $transaction = Transaction::where([
            ['transaction_id', $requestsArr['purchase_order_id']],
            ['payment_gateway_id', 2],
            ['member_id', $memberId],
            ['is_paid', false],
        ])->first();
        
        $transactionCreatedEntity = (bool) $transaction->createdByEntity ?? false;

        if ($transaction) {
            // DB::enableQueryLog();
            DB::transaction(function () use ($transaction, $requestsArr) {
                $transaction->is_paid = true;
                $transaction->payment_gateway_refrence_id = $requestsArr['pidx'];
                $transaction->save();
            });
            // Log::debug("QUERY-LOG => ", ["QUERY" => DB::getQueryLog()]);
            return $transactionCreatedEntity;
        } else {
            throw new Exception("Oops! Error Occurred. Transaction doesnot exist or alredy completed successfully.", 400);
        }
    }
}
