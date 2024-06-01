<?php

namespace App\Traits\Transactions;

use App\Models\Transaction;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait EsewaPaymentHelperTrait
{
    public function getEsewaConfigs($paymentGateway, $amount, $transactionId, $memberId)
    {
        if ($paymentGateway) {
            $signingKey = $paymentGateway->signing_key;
            $secretKey = $paymentGateway->secret_key;
            $signedStr = $this->getSignedToken($amount, $transactionId, $secretKey, $signingKey);
            $formSubmitUrl = $paymentGateway->base_url . "api/epay/main/v2/form";

            $params = [
                'amount' => $amount,
                'product_service_charge' => 0,
                'product_delivery_charge' => 0,
                'tax_amount' => 0,
                'total_amount' => $amount,
                'transaction_uuid' => $transactionId,
                'product_code' => $secretKey,
                'success_url' => "http://127.0.0.1:8000/member/$memberId/payment-successful",
                'failure_url' => "http://127.0.0.1:8000/member/$memberId/payment-failure",
                'signed_field_names' => "total_amount,transaction_uuid,product_code",
                'signature' => $signedStr,
            ];

            return [
                'params' => $params,
                'url' => $formSubmitUrl,
            ];
        }
    }

    public function processEsewaSuccessfullTransaction($encodedToken, $memberId)
    {
        $decodedRqst = json_decode(base64_decode($encodedToken), true);
        Log::info("ESEWA-PROCESS-SUCCESSFUL-TRANSACTION:", [
            'TRANSACTION_DECODED' => $decodedRqst,
            'TRANSACTION_DECODED_TRANSACTION_ID' => $decodedRqst['transaction_uuid'],
            'TRANSACTION_PAYMENT_GATEWAY_ID' => 1,
            'TRANSACTION_PAYMENT_GATEWAY_NAME' => 'ESEWA',
            'TRANSACTION_MEMBER_ID' => $memberId,
        ]);
        $transaction = Transaction::where([
            ['transaction_id', $decodedRqst['transaction_uuid']],
            ['payment_gateway_id', 1],
            ['member_id', $memberId],
            ['is_paid', false],
        ])->first();

        if ($transaction) {
            // DB::enableQueryLog();
            DB::transaction(function () use ($transaction, $decodedRqst) {
                $transaction->is_paid = true;
                $transaction->payment_gateway_refrence_id = $decodedRqst['transaction_code'];
                $transaction->save();
            });
            // Log::debug("QUERY-LOG => ", ["QUERY" => DB::getQueryLog()]);
            // return redirect()->route('admin.index');
        } else {
            throw new Exception("Oops! Error Occurred. Transaction doesnot exist or alredy completed successfully.", 400);
        }
    }

    private function getSignedToken($amount, $transactionId, $secretKey, $signingKey)
    {
        $signingStr = "total_amount=$amount,transaction_uuid=$transactionId,product_code=$secretKey";
        $signingStrHash = hash_hmac('sha256', $signingStr, $signingKey, true);
        $signedStr = base64_encode($signingStrHash);
        return $signedStr;
    }
}
