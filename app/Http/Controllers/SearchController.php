<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\User;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // SearchControllerのindexメソッド
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $prefecture = $request->input('prefecture');
        $aquariumname = $request->input('aquariumname');
        
        if (empty($keyword) && empty($prefecture) && empty($aquariumname)) {
            // エラーメッセージを表示する
            return redirect()->back()->with('error', 'キーワード、都道府県を入力してください。');
        }
        
        $posts = Post::query();
        
        if (!empty($keyword)) {
            $users  = User::where('name', 'like', "%{$keyword}%")->pluck('id')->all();
            $posts = $posts->where('title', 'like', "%{$keyword}%")
                ->orWhereIn('user_id', $users);
            $posts = $posts->where('aquariumname', 'like', "%{$keyword}%")
                ->orWhereIn('user_id', $users);
        }
        
        if (!empty($prefecture)) {
            $posts = $posts->where('prefecture', $prefecture);
        }
        
        $posts = $posts->paginate(5);
        
        return response()->view('post.index', compact('posts'));
    }


    
    public function create()
    {
        return response()->view('search.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
