<?php

namespace App\Http\Controllers\Transactions;

use App\Models\Transaction;
use InvalidArgumentException;
use App\Models\PaymentGateways;
use App\Http\Controllers\Controller;
use App\Traits\Transactions\EsewaPaymentHelperTrait;
use App\Traits\Transactions\KhaltiPaymentHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    use EsewaPaymentHelperTrait;
    use KhaltiPaymentHelperTrait;

    public function getPaymentGatewaysConfigs(Request $request, int $paymentGatewayId, int $memberId)
    {
        $amount = $request->amount;
        $transactionId = $this->getTransactionId();
        $paymentGateway = PaymentGateways::find($paymentGatewayId);
        $config = [];
        if ($paymentGatewayId == 1) {
            $config = $this->getEsewaConfigs($paymentGateway, $amount, $transactionId, $memberId);
        } elseif ($paymentGatewayId == 2) {
            $config = $this->getKhaltiConfigs($paymentGateway, $amount, $transactionId, $memberId);
        } else {
            // $signingtKey = $paymentGateway->signing_key;
            // $secretKey = $paymentGateway->secret_key;
            // $signingStr = "total_amount=$amount,transaction_uuid=$transactionId,product_code=$secretKey";
            // $signingStrHash = hash_hmac('sha256', $signingStr, $signingtKey, true);
            // $signedStr = base64_encode($signingStrHash);
            // $config = [
            //     'secret_key' => $paymentGateway->secret_key,
            //     'signing_key' => $paymentGateway->secret_key,
            //     'transaction_id' => $transactionId,
            //     'url' => $paymentGateway->base_url,
            //     'signature' => $signedStr,
            // ];
        }
        $this->storeMemberTransactions([
            'transaction_id' => $transactionId,
            'transaction_amount' => $amount,
            'payment_gateway_refrence_id' => null,
            'is_paid' => false,
            'payment_gateway_id' => $paymentGatewayId,
            'membership_id' => $memberId,
        ]);
        return response()->json(['data' => $config]);
    }

    private function storeMemberTransactions(array $requests)
    {
        try {
            $transactionsRqst = [
                'transaction_id' => $requests['transaction_id'],
                'transaction_amount' => $requests['transaction_amount'],
                'payment_gateway_refrence_id' => $requests['payment_gateway_refrence_id'],
                'is_paid' => $requests['is_paid'],
                'payment_gateway_id' => $requests['payment_gateway_id'],
                'member_id' => $requests['membership_id'],
            ];
            Log::debug("STORE-MEMBER-TRANSACTIONS:", $transactionsRqst);
            Transaction::create($transactionsRqst);
        } catch (\Throwable $th) {
            Log::error("TransactionController@storeMemberTransactions => ", [
                'error' => $th->getMessage(),
                'error_trace' => $th->getTraceAsString(),
            ]);
        }
    }

    public function transactionSuccess(Request $request, int $memberId)
    {
        /**
         * FIXME: MANAGE THIS FROM REPO/SERVICE
        */
        try {
            $paymentGatewayId = $this->getPaymentGatewayIdFromResponse($request->all());
            if ($paymentGatewayId == 1) {
                $fromAdmin = $this->processEsewaSuccessfullTransaction($request->data, $memberId);
            } elseif ($paymentGatewayId == 2){
                $fromAdmin = $this->processKhaltiSuccessfullTransaction($request->all(), $memberId);
            } else {
                /**
                 * TODO Manage this for other payment gateways
                 * 
                */
                // DD($request->all(), $memberId);
                // $signingtKey = $paymentGateway->signing_key;
                // $secretKey = $paymentGateway->secret_key;
                // $signingStr = "total_amount=$amount,transaction_uuid=$transactionId,product_code=$secretKey";
                // $signingStrHash = hash_hmac('sha256', $signingStr, $signingtKey, true);
                // $signedStr = base64_encode($signingStrHash);
                // $config = [
                //     'secret_key' => $paymentGateway->secret_key,
                //     'signing_key' => $paymentGateway->secret_key,
                //     'transaction_id' => $transactionId,
                //     'url' => $paymentGateway->base_url,
                //     'signature' => $signedStr,
                // ];
            }
            return $fromAdmin ? redirect()->route('admin.member.index')->with('success', 'Payment Done successfully') : redirect()->route('home.index')->with('success', 'Payment Done successfully');
        } catch (\Throwable $th) {
            Log::error("TRANSACTION-SUCCEESS:$memberId", [
                'request' => $request->all(),
                'error' => $th->getMessage(),
            ]);
            return redirect()->route('home.index')->with('error', $th->getMessage());
        }
        // dd("Member id $memberId has been successfully paid");
        // dd($request->all(), "Member id $memberId has been successfully paid");
    }

    public function transactionFailure(Request $request, int $memberId)
    {
        dd($request->all(),  "Member id $memberId has been successfully paid");
    }

    
    private function getTransactionId(int $length = 22)
    {
        if ($length < 1) {
            throw new InvalidArgumentException("Token length must be a positive integer.");
        }
        // Calculate the number of bytes needed to generate the desired token length
        $bytesNeeded = (int)ceil($length * 3 / 4);
        // Generate random bytes
        $randomBytes = random_bytes($bytesNeeded);
        // Convert bytes to hexadecimal representation
        $hexToken = bin2hex($randomBytes);

        $string = substr($hexToken, 0, $length);
        $existingToken = Transaction::where('transaction_id', $string)->where('is_paid', false)->first();
        if ($existingToken) {
            return $this->getTransactionId();
        }
        // Truncate to the desired length
        return $string;
    }


    private function getPaymentGatewayIdFromResponse($successResponse)
    {
        if (array_key_exists('data', $successResponse)) {
            return 1;
        } elseif (array_key_exists('pidx', $successResponse)) {
            return 2;
        } else {
            return 3;
        }
    }
}
