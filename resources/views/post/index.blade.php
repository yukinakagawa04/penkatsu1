<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('投稿一覧') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-grey-200">
          <table class="text-center w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-gray-lightest font-bold uppercase text-lg text-gray-dark border-b border-grey-light">投稿一覧</th>
              </tr>
            </thead>
            <tbody>
            @php
                $perPage = 5;
                $currentPage = request()->get('page', 1);
                $offset = ($currentPage - 1) * $perPage;
                $postsPerPage = $posts->slice($offset, $perPage);
                $hasMorePages = $posts->count() > ($offset + $perPage);
            @endphp
              
            @foreach ($posts as $post)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light">
                  <h3 class="text-left font-bold text-lg text-gray-dark">{{$post->title}}</h3>
                  <p class="text-left text-gray-dark">{{$post->description}}</p>
                  <img src="{{ asset('storage/posts/images/' . $post->image) }}">
                  <div class="flex">
                    <!-- 更新ボタン -->
                    <!-- 削除ボタン -->
                  </div>
                </td>
              </tr>
            @endforeach

            <!-- ページネーションの表示 -->
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
            
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
