<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-1">
                @if($owner_type == 1)
                    {{ __('Create My Account') }}
                @elseif($owner_type == 2)
                    {{ __('Create Other\'s Account') }}
                @endif
            </h2>
            <a href="{{ route('accounts') }}" class="ml-auto inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150" >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                  </svg>
                {{ __('All Accounts') }}
            </a>
                
        </div>
    </x-slot>

    <div class="py-6 px-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-10 py-5">
                        
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('storeAccount') }}">
                    @csrf
                    <x-input id="owner_type" type="hidden" name="owner_type" value="{{$owner_type}}" />

                    @if($owner_type == 2)
                        <!-- Account Owner -->
                        <div class="mt-4">
                            <x-label for="person_id" :value="__('Account Owner *')" />
                            <x-select id="person_id" class="block mt-1 w-full" type="text" name="person_id" :value="old('person_id')" required autofocus>
                                <option value="">Select Account Owner</option>
                                @foreach($persons as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach

                            </x-select>
                        </div>
                        @endif
                        
                    <!-- Name -->
                    <div class="mt-4">
                        <x-label for="name" :value="__('Account Name *')" />
                        <x-input id="name" placeholder="Account Name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus/>
                    </div>
                    
                    <!-- Account number -->
                    <div class="mt-4">
                        <x-label for="account_no" :value="__('Account No')" />
                        <x-input id="account_no" placeholder="Account No (optional)" class="block mt-1 w-full" type="text" name="account_no" :value="old('account_no')" />
                    </div>
                    
                        <!-- Username -->
                    <div class="mt-4">
                        <x-label for="user_name" :value="__('Username')" />
                        <x-input id="user_name" :placeholder="__('Username (optional)')" class="block mt-1 w-full uppercase" type="text" name="user_name" :value="old('user_name')" autofocus />
                    </div>
                  
                    {{-- <!-- Mobile -->
                    <div class="mt-4">
                        <x-label for="mobile" :value="__('Mobile Number *')" />
                        <x-input id="mobile" placeholder="01xxxxxxxxx" class="block mt-1 w-full" type="number" name="mobile" :value="old('mobile')" />
                    </div> --}}

                    @if($owner_type == 1)
                        <!-- Initial balance -->
                        <div class="mt-4">
                            <x-label for="balance" :value="__('Initial balance *')" />
                            <x-input id="balance" placeholder="0.00" class="block mt-1 w-full" type="number" name="balance" :value="old('balance')" />
                        </div>
                    @endif

                    {{-- <!-- type -->
                    <div class="mt-4">
                        <x-label for="type" :value="__('Account type ')" />
                        <x-select id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" >
                            <option value="">Select Type</option>
                            <option value="1">Current-Asset</option>
                            <option value="2">Liability</option>
                            <option value="3">Equity</option>
                            <option value="4">Income</option>
                            <option value="5">Expense</option>
                        </x-select>
                    </div> --}}

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Submit') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
