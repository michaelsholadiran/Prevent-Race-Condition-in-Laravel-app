<div class="mx-auto max-w-2xl py-6 ">
    <div class=" mb-8 flex justify-center">
        <div class="p-4">

            <!-- <img src="https://cdn-icons-png.flaticon.com/512/236/236832.png" class="w-32 rounded-full"
                            alt="Avatar"> -->
            <p class="text-center"> <span class="font-bold text-lg">Mark's Account</span></p>
            <table class="table-auto">
                <!-- <tr>
                                    <td>Credited</td>
                                    <td>Balance</td>
                                    <td>Withdrawn</td>
                                </tr> -->
                <tr>
                    <td class="p-3">
                        <p class="text-center">Credited</span></p>
                        <p class="text-center"><span class="font-bold text-lg">
                                {{$credited>0?"+":($credited==0?"":"-")}} ${{number_format(abs($credited),2)}}</span>
                        </p>
                    </td>
                    <td class="p-3">
                        <p class="text-center">Balance</span></p>
                        <p class="text-center"><span class="font-bold text-lg"> {{$balance>0?"+":($balance==0?"":"-")}}
                                ${{number_format(abs($balance),2)}}</span></p>
                    </td>
                    <td class="p-3">
                        <p class="text-center">Withdrawn</span></p>
                        <p class="text-center"><span class="font-bold text-lg">
                                {{$withdrawn>0?"+":($withdrawn==0?"":"-")}} ${{number_format(abs($withdrawn),2)}}</span>
                        </p>
                    </td>
                </tr>
            </table>





        </div>
    </div>
    <div class="text-center">

        <div class="mt-10 flex items-center justify-center gap-x-6">
            <button wire:click="store(20)"
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                Deposit $20
            </button>
            <button wire:click="store(-20)"
                class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 border-b-4 border-yellow-700 hover:border-yellow-500 rounded">
                Withdraw $20
            </button>
             <!-- <button wire:click="store2(-20)"
                class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 border-b-4 border-yellow-700 hover:border-yellow-500 rounded">
                Second Withdraw $20
            </button> -->

            <button wire:click="delete(2)"
                class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                Clear all
            </button>
        </div>



        <ol class="w-full rounded-lg mt-11 mb-3 text-blue-800 " >
            @forelse ( $transactions as $t)
            <li class="mb-1">
                <a href="#"
                    class="w-fill flex p-3 pl-3 rounded-lg justify-center font-bold {{$t->amount>0?' bg-green-100 hover:bg-green-200  text-lime-600':'bg-red-100 hover:bg-red-200 text-rose-900'}}">

                    <span class="ml-2 truncate "
                        title="Test with a very really long name (resize the browser to see it truncate)">
                        {{$t->amount>0?"+":"-"}} ${{number_format(abs($t->amount),2)}}</span>
                </a>
            </li>
            @empty
            <p>No Transactions</p>
            @endforelse
            {{-- <li class="mb-1">
      <a href="#" class="w-fill flex p-3 bg-red-100 hover:bg-red-200 rounded-lg justify-center text-rose-950">
       
        <span class="ml-2 truncate">- $300</span>
      </a>
    </li> --}}

        </ol>


    </div>
</div>
