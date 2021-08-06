<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Account') }}
        </h2>
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
