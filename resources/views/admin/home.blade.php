<x-admin-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>
  
  <div class="py-12">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Welcome {{ auth()->user()->name }}</h2>
  </div>
</x-admin-layout>