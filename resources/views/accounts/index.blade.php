<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accounts') }}
        </h2>
    </x-slot>

    <div class="py-6 px-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg px-3 py-5"> 
                <table class="w-full table-auto">
                    <thead class="justify-between">
                        <tr class="bg-green-600 border-2 border-green-600">
                            {{-- <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Account Number</span>
                            </th> --}}
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Name</span>
                            </th>
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Balance</span>
                            </th>        
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Account Since</span>
                            </th>        
                        </tr>
                    </thead>
                    <tbody class="bg-gray-200">
                        @foreach ($data as $item)
                            <tr class="bg-white border-2 border-gray-200">
                                {{-- <td>
                                    <span class="text-center ml-2 font-semibold">{{ $item->account_no }}</span>
                                </td> --}}
                                
                                <td class="px-2 py-2 border-2 border-gray-200">
                                    <span class="text-right font-semibold">{{ $item->name }}</span>
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200" align="right">
                                    <span>{{ $item->balance }}</span>
                                </td>

                                <td class="px-2 py-2 border-2 border-gray-200" align="center">
                                    <span> {{ \Carbon\Carbon::parse($item->created_at)->format('j F, Y') }} </span>
                                </td>                    
                            </tr>   
                        @endforeach                          
                    </tbody>
                </table>         
            </div>
        </div>
    </div>
</x-app-layout>
