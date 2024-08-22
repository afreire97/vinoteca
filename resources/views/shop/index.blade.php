<x-app-layout>


<x-slot name="header" >

<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

{{__('Tienda de Vinos')}}
</h2>







</x-slot>



@inject('cart', 'App\Services\Cart')

<div class="py-6">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm-rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cals-4 gap-4">

            @foreach ( $wines as $wine)
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 relative">

                <x-wine-image :wine="$wine"> 
                    
                </x-wine-image>

            </div>
            
            @endforeach

            </div>
        </div>
    </div>
</div>





</x-app-layout>