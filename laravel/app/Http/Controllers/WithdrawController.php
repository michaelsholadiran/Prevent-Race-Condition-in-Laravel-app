<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class WithdrawController extends Controller
{



    public function index($amount = -5)
    {
        $balance = Transaction::where('user_id', 2)->sum('amount');

        if ($amount < 0) {
            if (!$balance || $balance < 0 || abs($amount) > $balance) {
                return "insufficient funds";
            }
        }

        DB::transaction(
            function () use ($amount) {
                $transation =   Transaction::create([
                    'amount' => $amount,
                    'user_id' => 2,
                ]);

                // InvoiceJob::dispatch($transation);
            }
        );
    }
}
