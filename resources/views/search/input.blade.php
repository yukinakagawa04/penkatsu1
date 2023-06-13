<div class="py-12">
  <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 bg-white border-b border-gray-200">
        @include('common.errors')
        
        <form class="mb-6" action="{{ route('search.result') }}" method="GET">
          @csrf
        
        <div class="mb-6">
          <div class="flex justify-between">
            <div class="relative">
              <div id="keyword-search-button" class="font-bold py-2 px-4 rounded cursor-pointer bg-gray-200 hover:bg-blue-200">
                キーワード検索
              </div>
            </div>
          
            <div class="relative">
              <div id="prefecture-search-button" class="font-bold py-2 px-4 rounded cursor-pointer bg-gray-200 hover:bg-blue-200">
                都道府県で検索する
              </div>
            </div>
          </div>
          
          <div id="prefecture-search" class="hidden mt-4">
            <x-input-label for="prefecture" />
            <select id="prefecture" name="prefecture" class="block mt-1 w-full">
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
          </div>
          
          <div id="keyword-search" class="hidden mt-4">
            <x-input-label for="keyword" />
            <x-text-input id="keyword" placeholder="例：ペンギン、◯◯水族館、個体名" class="block mt-1 w-full" type="text" name="keyword" :value="old('keyword')" autofocus />
          </div>
        </div>
        
        <div class="flex items-center justify-end">
          <button type="submit" class="bg-teal-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            {{ __('検索する') }}
          </button>
        </div>
        
        <div class="flex items-center justify-end mt-4">
          <a href="{{ route('post.index') }}" class="text-gray-400 text-sm">検索クリア</a>
        </div>
        
        </form>
        
        @if(count($posts) == 0)
          <p>該当するコンテンツが見つかりませんでした。</p>
        @endif
        
        <script>
          const keywordSearchButton = document.getElementById('keyword-search-button');
          const prefectureSearchButton = document.getElementById('prefecture-search-button');
          const keywordSearch = document.getElementById('keyword-search');
          const prefectureSearch = document.getElementById('prefecture-search');
          
          // 初期表示ではキーワード検索欄を表示する
          keywordSearchButton.classList.remove('bg-gray-200');
          keywordSearchButton.classList.add('bg-teal-400');
          keywordSearch.classList.remove('hidden');
        
          keywordSearchButton.addEventListener('click', function() {
            keywordSearchButton.classList.remove('bg-gray-200');
            keywordSearchButton.classList.add('bg-teal-400');
            prefectureSearchButton.classList.remove('bg-teal-400');
            prefectureSearchButton.classList.add('bg-gray-200');
          
            keywordSearch.classList.remove('hidden');
            prefectureSearch.classList.add('hidden');
          });
          
          prefectureSearchButton.addEventListener('click', function() {
            prefectureSearchButton.classList.remove('bg-gray-200');
            prefectureSearchButton.classList.add('bg-teal-400');
            keywordSearchButton.classList.remove('bg-teal-400');
            keywordSearchButton.classList.add('bg-gray-200');
          
            prefectureSearch.classList.remove('hidden');
            keywordSearch.classList.add('hidden');
          });
        </script>


        
      </div>
    </div>
  </div>
</div>
