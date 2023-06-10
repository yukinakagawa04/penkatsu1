<!-- resources/views/tweet/edit.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Tweet') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
          @include('common.errors')
          <form class="mb-6" action="{{ route('post.update',$post->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="flex flex-col mb-4">
              <x-input-label for="title" :value="__('タイトル')" />
              <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $post->title)" required autofocus />
              <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            
            <div class="flex flex-col mb-4">
              <x-input-label for="description" :value="__('投稿文')" />
              <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', $post->description)" required autofocus />
              <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            
            
            <!--園館の名前-->
            <div class="flex flex-col mb-4">
              <x-input-label for="aquariumname" :value="__('園館名')" />
              <x-text-input id="aquariumname" class="block mt-1 w-full" type="text" name="aquariumname" :value="old('aquariumname', $post->aquariumname)"/>
              <x-input-error :messages="$errors->get('aquariumname')" class="mt-2" />
            </div>
            
            
            <div class="flex items-center justify-end mt-4">
              <a href="{{ url()->previous() }}">
                <x-secondary-button class="ml-3">
                  {{ __('戻る') }}
                </x-primary-button>
              </a>
              <x-primary-button class="ml-3">
                {{ __('投稿する') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

