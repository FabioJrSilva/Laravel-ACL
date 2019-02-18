<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Posts $post)
    {
        $posts = $post->all();
        // $posts = $post->where('user_id', auth()->user()->id)->get();

        return view('home', compact('posts'));
    }

    public function update($id)
    {
        $post = Posts::find($id);

        // migrado para PostPolicy
        // $this->authorize('update-post', $post); 
        if (Gate::denies('update-post', $post)) {
            abort(403, 'Você não tem autorização para editar esse post !');
        }

        return view('update-post', compact('post'));
    }
}
