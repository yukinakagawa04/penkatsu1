<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('投稿一覧') }}
    </h2>
  </x-slot>
  <!--検索機能-->
  <div>
    @include('search.input')
  </div>

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
                  <a href="{{ route('post.show',$post->id) }}">
                    <p class="text-left text-gray-800 dark:text-gray-dark">{{$post->user->name}}</p>
                    <h3 class="text-left font-bold text-lg text-gray-dark">{{$post->title}}</h3>
                    <p class="text-left text-gray-dark">{{$post->description}}</p>
                    <img src="{{ asset('storage/posts/images/' . $post->image) }}" style="max-width: 400px; height: auto;">
                    <p >{{$post->prefecture}}</p>
                    <div class="flex">
                  </a>
                    <!-- 更新ボタン -->
                  <form action="{{ route('post.edit',$post->id) }}" method="GET" class="text-left">
                    @csrf
                    <br>
                    <x-primary-button class="ml-3">
                      <p>編集</p>
                      <svg class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="orange">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                    </x-primary-button>
                  </form>
                    <!-- 削除ボタン -->
                  <form action="{{ route('post.destroy',$post->id) }}" method="POST" class="text-left">
                    @method('delete')
                    @csrf
                    <br>
                    <x-primary-button class="ml-3">
                      <p>削除</p>
                      <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="blue">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                    </x-primary-button>
                  </form>
                  
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
