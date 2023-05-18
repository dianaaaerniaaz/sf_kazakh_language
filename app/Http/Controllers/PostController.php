<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function postByCategory(Category $category){
        //$category->posts = Post::paginate(1);
        return view('posts.index', ['posts'=>$category->posts,'categories'=>Category::all()]);
    }
    public function like(Request $request, Post $post)
    {
        $validate = $request->validate([
            'like' => 'required'
        ]);
        $postLike = Auth::user()->postsLike()->where('post_id', $post->id)->first();
        if ($postLike) {
            Auth::user()->postsLike()->updateExistingPivot($post->id, $validate);
        } else {
            Auth::user()->postsLike()->attach($post->id, $validate);

        }
        return back();
    }

    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories'));
    }
    public function create(){
        $this->authorize('create', Post::class);
        return view('posts.create',['categories'=>Category::all()]);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|numeric|exists:categories,id',
            'img'=>'required|mimes:jpg,png,jpeg,svg,gif,mp4'
        ]);
        $fileName = time().$request->file('img')->getClientOriginalName();
        $image_path = $request->file('img')->storeAs('posts',$fileName,'public');
        $validated['img']='/storage/'.$image_path;
        //Post::create($validated + ['user_id'=>Auth::user()->id]);
        Auth::user()->posts()->create($validated);
        return redirect()->route('posts.index')->with('message', 'Post Added Successfully');
    }
    public function show(Post $post){
        //$cat = $post->category();
        //dd($cat->code);

        $postLikee = false;
        if (Auth::check()) {

            $postLike = Auth::user()->postsLike()->where('post_id', $post->id)->first();

            if ($postLike) {
                $postLikee = $postLike->pivot->like;
            }
        }

        $sumLike = 0;


        $LikeUsers = $post->usersLike()->get();

        foreach ($LikeUsers as $like) {
            if ($like->pivot->like) {
                $sumLike += 1;
            }
        }


        return view('posts.show', ['post' => $post,

            'like' => $postLikee,
            'count' => $sumLike]);


    }


    public function edit(Post $post)
    {
        $this->authorize('update',$post);
        return view('posts.edit', ['post' => $post,'categories'=>Category::all()]);
    }


    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|numeric|exists:categories,id',
        ]);
        Post::update($validated);
        return redirect()->route('posts.index');
    }


    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        $post->usersLike()->detach();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
