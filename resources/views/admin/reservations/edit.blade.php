<x-admin-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex  m-2 p-2">
        <a href="{{ route('admin.reservations.index') }}" class="px-4 py-2 text-white bg-gray-500 hover:bg-gray-700 rounded-lg">Back</a>
      </div>
      
      <div class="m-2 p-4 bg-slate-100 rounded">
        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-2">
          <h2 class="text-4xl font-bold dark:text-white">Create Reservation</h2>
          <form method="POST" action="{{ route('admin.reservations.update', $reservation->id) }}">
            @csrf
            @method('PUT')
            <div class="sm:col-span-6 mb-2">
              <label for="first_name" class="block text-sm font-medium text-gray-700"> First Name </label>
              <div class="mt-1">
                <input type="text" id="first_name" name="first_name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{ $reservation->first_name }}" />
              </div>
              @error('first_name')
                <div class="text-small text-red-400">{{ $message }}</div>
              @enderror
            </div>
            <div class="sm:col-span-6 mb-2">
              <label for="last_name" class="block text-sm font-medium text-gray-700"> Last Name </label>
              <div class="mt-1">
                <input type="text" id="last_name" name="last_name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{ $reservation->last_name }}" />
              </div>
              @error('last_name')
                <div class="text-small text-red-400">{{ $message }}</div>
              @enderror
            </div>
            <div class="sm:col-span-6 mb-2">
              <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
              <div class="mt-1">
                <input type="email" id="email" name="email" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{ $reservation->email }}"  />
              </div>
              @error('email')
                <div class="text-small text-red-400">{{ $message }}</div>
              @enderror
            </div>
            <div class="sm:col-span-6 mb-2">
              <label for="tel_number" class="block text-sm font-medium text-gray-700"> Phone number </label>
              <div class="mt-1">
                <input type="text" id="tel_number" name="tel_number" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{ $reservation->tel_number }}"  />
              </div>
              @error('tel_number')
                <div class="text-small text-red-400">{{ $message }}</div>
              @enderror
            </div>
            <div class="sm:col-span-6 mb-2">
              <label for="res_date" class="block text-sm font-medium text-gray-700"> Reservation Date </label>
              <div class="mt-1">
                <input type="datetime-local" id="res_date" name="res_date" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{ $reservation->res_date }}" />
              </div>
              @error('res_date')
                <div class="text-small text-red-400">{{ $message }}</div>
              @enderror
            </div>
            <div class="sm:col-span-6 mb-2">
              <label for="guest_number" class="block text-sm font-medium text-gray-700"> Guest number </label>
              <div class="mt-1">
                <input type="text" id="guest_number" name="guest_number" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{ $reservation->guest_number }}" />
              </div>
              @error('guest_number')
                <div class="text-small text-red-400">{{ $message }}</div>
              @enderror
            </div>
            <div class="sm:col-span-6 mb-2">
              <label for="table_id" class="block text-sm font-medium text-gray-700">Table</label>
              <div class="mt-1">
               <select id="table_id" name="table_id" class="rounded-md bg-white border border-gray-400 block w-full mt-1">
                  @foreach ($tables as $table)
                    <option value="{{ $table->id }}" @selected($table->id == $reservation->table_id)>{{ $table->name }} ({{ $table->guest_number }} Guest)</option>
                  @endforeach
               </select>
              </div>
              @error('table_id')
                <div class="text-small text-red-400">{{ $message }}</div>
              @enderror
            </div>
            <div class="mt-6 py-4">
              <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update</button>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
</x-admin-layout>