<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-1">
                {{ __('Persons') }}
            </h2>
            <a class="ml-auto inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('createPerson') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                {{ __('Create Person') }}
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
                                <span class="text-gray-100 font-semibold">Username</span>
                            </th> --}}

                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">S.L</span>
                            </th>

                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Name</span>
                            </th>
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Mobile</span>
                            </th>        
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Company</span>
                            </th>        
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Address</span>
                            </th>        
                            
                            <th class="px-2 py-2">
                                <span class="text-gray-100 font-semibold">Created On</span>
                            </th>        
                        </tr>
                    </thead>
                    <tbody class="bg-gray-200">
                        @foreach ($data as $item)
                            <tr class="bg-white border-2 border-gray-200">                                
                                {{-- <td class="px-2 py-2 border-2 border-gray-200">
                                    <span class="text-right font-semibold">{{ $item->user_name }}</span>
                                </td> --}}
                                
                                <td class="px-2 py-2 border-2 border-gray-200">
                                    <span class="text-right font-semibold">{{ $loop->iteration }}</span>
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200">
                                    <span class="text-right font-semibold">{{ $item->name }}</span>
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200" align="center">
                                    <span>{{ $item->mobile }}</span>
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200" align="center">
                                    <span>{{ $item->company }}</span>
                                </td>
                                
                                <td class="px-2 py-2 border-2 border-gray-200" align="center">
                                    <span>{{ $item->address }}</span>
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
