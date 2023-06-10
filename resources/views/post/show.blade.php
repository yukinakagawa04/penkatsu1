<!-- resources/views/post/show.blade.php -->
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Show Post Detail') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="mb-6">
            <div class="flex flex-col mb-4">
              <h3 class="text-left font-bold text-lg text-gray-dark">{{ $post->title }}</h3>
            </div>
         
            <div class="flex flex-col mb-4">
              <img src="{{ asset('storage/posts/images/' . $post->image) }}">
            </div>

            <div class="flex flex-col mb-4">
              <p class="text-left text-gray-dark">{{ $post->description }}</p>
            </div> 
            
            <div class="flex items-center justify-end mt-4">
              <a href="{{ url()->previous() }}">
                <x-secondary-button class="ml-3">
                  {{ __('Back') }}
                </x-primary-button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
