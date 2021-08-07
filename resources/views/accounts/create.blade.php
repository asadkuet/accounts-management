<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-1">
                {{ __('Create Account') }}
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

                    <!-- Account number -->
                    <div>
                        <x-label for="account_no" :value="__('Account Number')" />
                        <x-input id="account_no" class="block mt-1 w-full" type="number" name="account_no" :value="old('account_no')" autofocus />
                    </div>

                    <!-- Name -->
                    <div class="mt-4">
                        <x-label for="name" :value="__('Account Name *')" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                    </div>

                    <!-- type -->
                    <div class="mt-4">
                        <x-label for="type" :value="__('Account type *')" />
                        <x-select id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required >
                            <option value="">Select Type</option>
                            <option value="1">Asset</option>
                            <option value="2">Liability</option>
                            <option value="3">Equity</option>
                            <option value="4">Income</option>
                            <option value="5">Expense</option>
                        </x-select>
                    </div>
 
                    <!-- Initial balance -->
                    <div class="mt-4">
                        <x-label for="balance" :value="__('Initial balance *')" />
                        <x-input id="balance" class="block mt-1 w-full" type="number" name="balance" :value="old('balance')" />
                    </div>

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
