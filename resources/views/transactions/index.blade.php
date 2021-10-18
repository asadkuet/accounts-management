<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-1">
                {{ __('All Transactions') }}
            </h2>
            <a href="{{ route('createSendMoney') }}" class="ml-auto inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150" >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                {{ __('Send Money') }}
            </a>
            </h2>
            <a href="{{ route('createReceiveMoney') }}" class="ml-1 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150" >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                {{ __('Receive Money') }}
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
                            
                            {{-- <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Type</span>
                            </th>         --}}
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">From Account</span>
                            </th>        
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">To Account</span>
                            </th>        
                            </th>        
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Received Amount</span>
                            </th>        
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Sent Amount</span>
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
                        @php 
                            $total_sent = 0; 
                            $total_received = 0; 
                        @endphp
                        @foreach ($data as $item)
                            @php
                                if($item->txn_type == 1)
                                    $total_received += $item->amount; 
                                else if($item->txn_type == 2)
                                    $total_sent += $item->amount; 
                            @endphp    
                            <tr class="bg-white border-2 border-gray-200">
                                
                                <td class="px-2 py-2 border-2 border-gray-200">
                                    <span class="text-right font-semibold">{{ $loop->iteration }}</span>
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200">
                                    <span class="text-right font-semibold">{{ \Carbon\Carbon::parse($item->txn_date)->format('j M, Y') }}</span>
                                </td>
                                
                                {{-- <td class="px-2 py-2 border-2 border-gray-200" align="center">
                                    @if($item->txn_type == 2)
                                        <span>SEND</span>
                                    @elseif($item->txn_type == 1)
                                        <span>RECEIVE</span>
                                    @endif
                                </td> --}}
                                
                                <td class="px-2 py-2 border-2 border-gray-200" align="center">
                                    <a href="{{ route('transactions', ['account'=> $item->from_account]) }}" class="underline ">
                                        @if($item->txn_type == 2)
                                            <span><b>{{ $item->from_account_name }} <br/> ( {{ $item->to_user_name }} )</b></span>
                                        @else <span>{{ $item->from_account_name }} <br/> ( {{ $item->to_user_name }} )</span>
                                        @endif
                                    </a>
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200" align="center">
                                    <a href="{{ route('transactions', ['account'=> $item->to_account]) }}"  class="underline ">
                                        @if($item->txn_type == 1)
                                            <span><b>{{ $item->to_account_name }} <br/> ( {{ $item->to_user_name }} ) </b></span>
                                        @else <span>{{ $item->to_account_name }} <br/> ( {{ $item->to_user_name }} )</span>
                                        @endif  
                                    </a>                                  
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200" align="center">                                    
                                    @if($item->txn_type == 1)
                                        <span class="text-green-600">+{{ preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $item->amount) }}</span>
                                    @elseif($item->txn_type == 2)
                                        <span class="text-green-600"> - </span>
                                    @endif
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200" align="center">                                    
                                    @if($item->txn_type == 2)
                                        <span class="text-red-600">-{{ preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $item->amount) }}</span>
                                    @elseif($item->txn_type == 1)
                                        <span class="text-red-600"> - </span>
                                    @endif
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200" align="left">
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
                        
                        <tr class="bg-gray-100 border-2 border-gray-200">
                                
                            <td class="px-2 py-2 border-2 border-gray-200" colspan="4" align="right">
                                <span class="text-right font-bold">Total: </span>
                            </td>
                            
                            <td class="px-2 py-2 border-2 border-gray-200" align="center">               
                                <span class="text-green-600 font-bold">+{{ preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $total_received) }}</span>
                            </td>
                            
                            <td class="px-2 py-2 border-2 border-gray-200" align="center">                                    
                                <span class="text-red-600 font-bold">-{{ preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $total_sent) }}</span>
                            </td>
                            
                            <td class="px-2 py-2 border-2 border-gray-200" align="left" colspan="3">
                                @if($total_received - $total_sent > 0)
                                    <span class="text-green-600 font-bold">Balance: {{ preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $total_received - $total_sent) }}</span>
                                @else    
                                    <span class="text-red-600 font-bold">Balance: {{ preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $total_received - $total_sent) }}</span>
                                @endif
                            </td>              
                        </tr> 
                    </tbody>
                </table>         
            </div>
        </div>
    </div>
</x-app-layout>
