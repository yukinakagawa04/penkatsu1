<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\User;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    public function store(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:191',
            'description' => 'required',
            'image' => 'nullable',
            'prefecture' => 'required',
            'aquariumname' => 'required',
        ]);
        
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
                ->route('post.create')
                ->withInput()
                ->withErrors($validator);
        }
        
        // 編集フォームから送信されてきたデータとユーザIDをマージ
        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        
        // 送信内容を再度定義する
        $post = new Post();
        // title
        $post->title = $data['title'];
        // image
        if ($request->hasFile('image')) {
            $original = $request->file('image')->getClientOriginalName();
            $name = date("Ymd_His") . "_" . $original;
            $request->file('image')->move("storage/posts/images", $name);
            $post->image = $name;
        }
        // description
        $post->description = $data['description'];
        // prefecture
        $post->prefecture = $data['prefecture'];
        // aquariumname
        $post->aquariumname = $data['aquariumname'];
        // user_id
        $post->user_id = $data['user_id'];
    
        $post->save();
        
        // ルーティング「post.index」にリダイレクト（一覧ページに移動）
        return redirect()->route('post.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
         return response()->view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //バリデーション
      $validator = Validator::make($request->all(), [
        'title' => 'required | max:191',
        'description' => 'required',
        'aquariumname' => 'required',
      ]);
      //バリデーション:エラー
      if ($validator->fails()) {
        return redirect()
          ->route('post.edit', $id)
          ->withInput()
          ->withErrors($validator);
      }
    
      
      
        // データ更新処理
        Post::find($id)->update($request->all());
        
        // 更新後のデータを取得
        $post = Post::find($id);
        
        return redirect()->route('post.index', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id); // 対象の投稿を取得
        $post->delete(); // 論理削除を行う
        return redirect()->route('post.index');
    }
    
    public function mydata()
    {
        // Userモデルに定義したリレーションを使用してデータを取得する．
        $posts = User::query()
        ->find(Auth::user()->id)
        ->userPosts()
        ->orderBy('created_at', 'desc')
        ->paginate(5);
         
        return view('post.index', compact('posts'));
        
        
    }
    
}
