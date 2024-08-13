<x-app-layout>


<x-slot name='header'>


<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leadding-tight">


    {{ __('Editar categoría') }}



    @include('wine.category.form')

</h2>



</x-slot>





</x-app-layout>