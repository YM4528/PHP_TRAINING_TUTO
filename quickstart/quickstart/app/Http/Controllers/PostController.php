<?php

namespace App\Http\Controllers;
use App\Contracts\Services\Post\PostServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Http\Request;



class PostController extends Controller
{
    private $postServiceInterface;

    public function __construct(PostServiceInterface $postServiceInterface)
    {
        $this->postServiceInterface = $postServiceInterface;
    }
    //public function showPostList()
    //{
    //  $postList = $this->postServiceInterface->getPostList();
    //  return view('posts.list', compact('postList'));
    //}
    public function showPostCreateView()
    {
      return view('posts.create');
    }
    public function submitPostCreateView(PostCreateRequest $request)
    {
      // validation for request values
      $validated = $request->validated();
      return redirect()
        ->route('post.create.confirm')
        ->withInput();
    }
    public function showPostCreateConfirmView()
    {
      if (old()) {
        return view('posts.create-confirm');
      }
      return redirect()->route('postlist');
    }
    public function submitPostCreateConfirmView(Request $request)
    {
      $post = $this->postServiceInterface->savePost($request);
      //return redirect()->route('postlist');
      return "hello";
      //$postList = $this->postServiceInterface->getPostList();
      //return view('posts.list', compact('postList'));
    }
  
}
