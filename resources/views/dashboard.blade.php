<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   Balance: {{$balance}}
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                   Total Received: {{$total_received}}
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                   Total Sent: {{$total_sent}}
                </div>
            </div>
        </div> --}}

        <div class="flex">
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <!--Metric Card-->
                <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-600">Balance</h5>
                            <h3 class="font-bold text-3xl">৳ {{$balance}} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <!--Metric Card-->
                <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-600">Sent</h5>
                            <h3 class="font-bold text-3xl">৳ {{$total_sent}} <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <!--Metric Card-->
                <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-600">Received</h5>
                            <h3 class="font-bold text-3xl">৳ {{$total_received}} <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>            
        </div>

    </div>
</x-app-layout>
