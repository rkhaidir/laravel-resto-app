<x-guest-layout>
  <div class="container w-full px-5 py-6 mx-auto">
      <div class="grid lg:grid-cols-4 gap-y-6">
        @foreach ($categories as $category)
        <a href="{{ route('categories.show', $category->id) }}">
          <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg hover:bg-slate-100">
            <img class="w-full h-50" src="{{ Storage::url($category->image) }}"
              alt="Image" />
            <div class="px-6 py-4">
                <h4 class="mb-3 text-xl text-center font-semibold tracking-tight text-green-600 uppercase">{{ $category->name }}</h4>
              </div>
            </div> 
          </a>
        @endforeach
        

      </div>
    </div>
</x-guest-layout>