<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('投稿を作成する') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 ">
          @include('common.errors')
          <form class="mb-6" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!--投稿のタイトル-->
            <div class="flex flex-col mb-4">
              <x-input-label for="title" :value="__('タイトル')" />
              <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
              <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <!--投稿の文章-->
            <div class="flex flex-col mb-4">
              <x-input-label for="description" :value="__('投稿文')" />
              <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
              <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <!--投稿のする画像・動画-->
            <div class="flex flex-col mb-4">
              <x-input-label for="image" :value="__('画像')" />
              <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"/>
              <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>
            <!--園館の都道府県-->
            <div class="flex flex-col mb-4">
              <x-input-label for="prefecture" :value="__('園館の場所')" />
              <select id="prefecture" name="prefecture" class="block mt-1 w-full" required>
                <option value="">選択してください</option>
                <option value="北海道">北海道</option>
                <option value="青森県">青森県</option>
                <option value="岩手県">岩手県</option>
                <option value="宮城県">宮城県</option>
                <option value="秋田県">秋田県</option>
                <option value="山形県">山形県</option>
                <option value="福島県">福島県</option>
                <option value="茨城県">茨城県</option>
                <option value="栃木県">栃木県</option>
                <option value="群馬県">群馬県</option>
                <option value="埼玉県">埼玉県</option>
                <option value="千葉県">千葉県</option>
                <option value="東京都">東京都</option>
                <option value="神奈川県">神奈川県</option>
                <option value="新潟県">新潟県</option>
                <option value="富山県">富山県</option>
                <option value="石川県">石川県</option>
                <option value="福井県">福井県</option>
                <option value="山梨県">山梨県</option>
                <option value="長野県">長野県</option>
                <option value="岐阜県">岐阜県</option>
                <option value="静岡県">静岡県</option>
                <option value="愛知県">愛知県</option>
                <option value="三重県">三重県</option>
                <option value="滋賀県">滋賀県</option>
                <option value="京都府">京都府</option>
                <option value="大阪府">大阪府</option>
                <option value="兵庫県">兵庫県</option>
                <option value="奈良県">奈良県</option>
                <option value="和歌山県">和歌山県</option>
                <option value="鳥取県">鳥取県</option>
                <option value="島根県">島根県</option>
                <option value="岡山県">岡山県</option>
                <option value="広島県">広島県</option>
                <option value="山口県">山口県</option>
                <option value="徳島県">徳島県</option>
                <option value="香川県">香川県</option>
                <option value="愛媛県">愛媛県</option>
                <option value="高知県">高知県</option>
                <option value="福岡県">福岡県</option>
                <option value="佐賀県">佐賀県</option>
                <option value="長崎県">長崎県</option>
                <option value="熊本県">熊本県</option>
                <option value="大分県">大分県</option>
                <option value="宮崎県">宮崎県</option>
                <option value="鹿児島県">鹿児島県</option>
                <option value="沖縄県">沖縄県</option>
              </select>
              <x-input-error :messages="$errors->get('prefecture')" class="mt-2" />
            </div>
            @if ($errors->has('prefecture'))
              <div>{{ $errors->first('prefecture') }}</div>
            @endif
            
            <!--園館の名前-->
            <div class="flex flex-col mb-4">
              <x-input-label for="aquariumname" :value="__('園館名')" />
              <x-text-input id="aquariumname" class="block mt-1 w-full" type="text" name="aquariumname" :value="old('aquariumname')"/>
              <x-input-error :messages="$errors->get('aquariumname')" class="mt-2" />
            </div>
            
            <div class="flex items-center justify-end mt-4">
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