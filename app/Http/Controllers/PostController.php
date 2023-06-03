<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

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
        //送る内容を再度定義する
        $post = new Post();
            // title
            $post -> title = request() -> title;
            // image
            if(request('image')){
                $original = request() -> file("image") -> getClientoriginalName();
                $name = date("Ymd_His")."_".$original; 
                request() -> file("image") -> move("storage/posts/images", $name);
            $post -> image =  $name;
            }  
            // description
            $post -> description = request() -> description;
            // prefecture
            $post -> prefecture = request() -> prefecture;
            // aquariumname
            $post -> aquariumname = request() -> aquariumname;
            
            $post -> save();
        
        // バリデーション
        $validator = Validator::make($request->all(), [
            'title' => 'required | max:191',
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
          
        // 戻り値は挿入されたレコードの情報
        $result = Post::create($request->all());
        // ルーティング「tweet.index」にリクエスト送信（一覧ページに移動）
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
