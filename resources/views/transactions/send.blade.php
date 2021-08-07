<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Send Money') }}
        </h2>
    </x-slot>

    <div class="py-6 px-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-10 py-5">
                        
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('storeSendMoney') }}">
                    @csrf
                    
                    <!-- date -->
                    <div class="mt-4">
                        <x-label for="txn_date" :value="__('Transaction Date *')" />
                        <x-input id="txn_date" placeholder="Transaction Date" class="block mt-1 w-full" type="text" name="txn_date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required />
                    </div>

                    <!-- From Account number -->
                    <div class="mt-4">
                        <x-label for="from_account" :value="__('From Account')" />
                        <x-select id="from_account" class="block mt-1 w-full" type="text" name="from_account" :value="old('from_account')" required >
                            <option value="">Select Account</option>
                            @foreach($accounts as $account)
                                <option value="{{$account->account_no}}">{{$account->name}}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <!-- Select Person -->
                    <div class="mt-4">
                        <x-label for="to_account" :value="__('To Person')" />
                        <x-select id="to_account" class="block mt-1 w-full" type="text" name="to_account" :value="old('to_account')" required >
                            <option value="">Select Person</option>
                            @foreach($persons as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <!-- Amount -->
                    <div class="mt-4">
                        <x-label for="amount" :value="__('Amount *')" />
                        <x-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')" required oninput="javascript: if (this.value.length > 11) this.value = this.value.slice(0, 11);" />
                    </div>

                    <!-- Description -->
                    <div class="mt-4">
                        <x-label for="description" :value="__('Description *')" />
                        <x-input id="description" placeholder="Transaction details" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                    </div>

                    <!-- purpose -->
                    <div class="mt-4">
                        <x-label for="purpose" :value="__('Sending Purpose ')" />
                        <x-select id="purpose" class="block mt-1 w-full" type="text" name="purpose" :value="old('purpose')" >
                            <option value="">Select Sending Purpose</option>
                            @foreach($purposes as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach

                        </x-select>
                    </div>

                    <!-- gateway -->
                    <div class="mt-4">
                        <x-label for="gateway" :value="__('Sending Gateway *')" />
                        <x-select id="gateway" class="block mt-1 w-full" type="text" name="gateway" :value="old('gateway')" required>
                            <option value="">Select Sending gateway</option>
                            <option value="buyotake"> BuyoTake </option>
                            <option value="cash"> Cash </option>
                            <option value="bkash"> Bkash </option>
                            <option value="nagad"> Nagad </option>
                            <option value="rocket"> Rocket </option>
                            <option value="bank"> Bank </option>
                            
                        </x-select>
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
