<?php

namespace App\Livewire;

use Livewire\Component;
use App\Jobs\InvoiceJob;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class WithoutLock extends Component
{
    public $balance, $withdrawn,  $credited;
    public function store($amount)
    {
          
        $balance = Transaction::where('user_id', 2)->sum('amount');

        if ($amount < 0) {
            if (!$balance || $balance < 0 || abs($amount) > $balance) {
                abort(401);
            }
        }

        sleep(5);

        DB::transaction(
            function () use ($amount) {

                $transation =   Transaction::create([
                    'amount' => $amount,
                    'user_id' => 2,
                ]);
          
            });
    
    }


    public function delete($amount)
    {

        Transaction::where('user_id', 2)->delete();
    }


    public function render()
    {
        
        $this->balance = Transaction::where('user_id', 2)->sum('amount');
        $this->withdrawn = Transaction::where('user_id', 2)->where('amount', '<', 0)->sum('amount');
        $this->credited = Transaction::where('user_id', 2)->where('amount', '>', 0)->sum('amount');
        return view(
            'livewire.without-lock',
            ['transactions' => Transaction::where('user_id', 2)->latest()->get()]
        )->title('Without Lock');
    }
}
