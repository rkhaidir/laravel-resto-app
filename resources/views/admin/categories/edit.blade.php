<x-admin-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex  m-2 p-2">
        <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 text-white bg-gray-500 hover:bg-gray-700 rounded-lg">Back</a>
      </div>
      
      <div class="m-2 p-4 bg-slate-100 rounded">
        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-2">
          <h2 class="text-4xl font-bold dark:text-white">Edit Category</h2>
          <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="sm:col-span-6 mb-2">
              <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
              <div class="mt-1">
                <input type="text" id="name" name="name" value="{{ $category->name }}" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" autofocus />
              </div>
              @error('name')
                <div class="text-small text-red-400">{{ $message }}</div>
              @enderror
            </div>
            <div class="sm:col-span-6 mb-2">
              <label for="image" class="block text-sm font-medium text-gray-700"> Image </label>
              <img class="w-32 h-32" src="{{ Storage::url($category->image) }}" />
              <div class="mt-1">
                <input type="file" id="image" name="image" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
              </div>
              @error('image')
                <div class="text-small text-red-400">{{ $message }}</div>
              @enderror
            </div>
            <div class="sm:col-span-6 mb-2">
              <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
              <div class="mt-1">
                <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm">{{ $category->description }}</textarea>
              </div>
              @error('description')
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
