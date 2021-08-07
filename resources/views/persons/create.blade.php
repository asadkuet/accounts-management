<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-1">
                {{ __('Create Person') }}
            </h2>
            <a href="{{ route('persons') }}" class="ml-auto inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150" >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                  </svg>
                {{ __('All Persons') }}
            </a>
                
        </div>
    </x-slot>

    <div class="py-6 px-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-10 py-5">
                        
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('storePerson') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-label for="name" :value="__('Full Name *')" />
                        <x-input id="name" :placeholder="__('Full Name')" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                    </div>
 
                    <!-- mobile -->
                    <div class="mt-4">
                        <x-label for="mobile" :value="__('Mobile Number *')" />
                        <x-input id="mobile" :placeholder="__('01XXXXXXXXX')" class="block mt-1 w-full" type="number" name="mobile" :value="old('mobile')" oninput="javascript: if (this.value.length > 11) this.value = this.value.slice(0, 11);"/>
                    </div>
                    
                    <!-- Username -->
                    <div class="mt-4">
                        <x-label for="user_name" :value="__('Username')" />
                        <x-input id="user_name" :placeholder="__('Username (optional)')" class="block mt-1 w-full uppercase" type="text" name="user_name" :value="old('user_name')" autofocus />
                    </div>

                    <!-- company -->
                    <div class="mt-4">
                        <x-label for="company" :value="__('Company Name')" />
                        <x-input id="company" :placeholder="__('Company Name (optional)')" class="block mt-1 w-full" type="text" name="company" :value="old('company')" />
                    </div>
 
                    <!-- address -->
                    <div class="mt-4">
                        <x-label for="address" :value="__('Address')" />
                        <x-input id="address" :placeholder="__('Address (optional)')" class="block mt-1 w-full" type="text" name="address" :value="old('address')" />
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
