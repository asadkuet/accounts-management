<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-1">
                {{ __('All Transactions') }}
            </h2>
            <a class="ml-auto inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('createAccount') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                {{ __('Send History') }}
            </a>
                
        </div>
    </x-slot>

    <div class="py-6 px-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg px-3 py-5"> 
                <table class="w-full table-auto">
                    <thead class="justify-between">
                        <tr class="bg-green-600 border-2 border-green-600">
                            {{-- <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Transaction Number</span>
                            </th> --}}
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">S.L</span>
                            </th>

                            </th> 
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Txn Date</span>
                            </th>
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Type</span>
                            </th>        
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">From Account</span>
                            </th>        
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">To Account</span>
                            </th>        
                            </th>        
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Amount</span>
                            </th>        
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Description</span>
                            </th>        
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Gateway</span>
                            </th>        
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Entry Time</span>
                            </th>        
                        </tr>
                    </thead>
                    <tbody class="bg-gray-200">
                        @foreach ($data as $item)
                            <tr class="bg-white border-2 border-gray-200">
                                
                                <td class="px-2 py-2 border-2 border-gray-200">
                                    <span class="text-right font-semibold">{{ $loop->iteration }}</span>
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200">
                                    <span class="text-right font-semibold">{{ \Carbon\Carbon::parse($item->txn_date)->format('j F, Y') }}</span>
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200" align="center">
                                    @if($item->txn_type == 2)
                                        <span>SEND</span>
                                    @elseif($item->txn_type == 1)
                                        <span>RECEIVE</span>
                                    @endif
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200" align="center">
                                    <span>{{ $item->from_account_name }}</span>
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200" align="center">
                                    <span>{{ $item->to_account_name }}</span> <br/>
                                    <span>( {{ $item->user_name }} )</span>
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200" align="center">                                    
                                    @if($item->txn_type == 2)
                                        <span class="text-red-600">-{{ $item->amount }}</span>
                                    @elseif($item->txn_type == 1)
                                        <span class="text-green-600">+{{ $item->amount }}</span>
                                    @endif
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200" align="center">
                                    <span>{{ $item->description }}</span>
                                </td>

                                <td class="px-2 py-2 border-2 border-gray-200" align="center">
                                    <span> {{ $item->gateway }} </span>
                                </td>                    

                                <td class="px-2 py-2 border-2 border-gray-200" align="center">
                                    <span> {{ $item->created_at }} </span>
                                </td>                    
                            </tr>   
                        @endforeach                          
                    </tbody>
                </table>         
            </div>
        </div>
    </div>
</x-app-layout>
