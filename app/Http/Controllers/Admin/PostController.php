<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PostController extends Controller
{


    private function validator($model) {
        return [
            // 'user_id'   => 'required|exists:App\User,id',
            'title'     => 'required|max:100',
            'slug'      => [
                'required',
                Rule::unique('posts')->ignore($model),
                'max:100'
            ],
            'content'   => 'required'
        ];
    }

    public function myindex(Request $request)
    {
        $categories = Category::all();
        $users = User::all();
        $posts = Post::where('user_id', Auth::user()->id)->paginate(8);
        return view('admin.posts.index', [
            'request' => $request,
            'posts' => $posts,
            'users' => $users,
            'categories' => $categories
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::where('id', '>', 0);

        if($request->search) {
            $posts->where('title', 'LIKE', "%$request->search%");
        }
        if ($request->category) {
            $posts->where('category_id', $request->category);
        }
        if ($request->user) {
            $posts->where('user_id', $request->user);
        }

        $categories = Category::all();
        $users = User::all();

        $posts = $posts->paginate(20);
        return view('admin.posts.index', [
            'request' => $request,
            'posts' => $posts,
            'users' => $users,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validator(null));
        $submitted = $request->all() + [
            'user_id' => Auth::user()->id
        ];
        $newPost = Post::create($submitted);
        return redirect()->route('admin.posts.show', $newPost->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categoryPosts = Post::where('category_id', $post->category->id)->get();
        $userPosts = Post::where('user_id', $post->user->id)->get();
        return view('admin.posts.show', ['title' => $post->title,
                                        'post'     => $post,
                                        'categoryPosts' => $categoryPosts,
                                        'userPosts' => $userPosts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validator($post));
        $submitted = $request->all();
        $post->update($submitted);
        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
