<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::where('status', 1)->get();
        return view('home', ['posts'=>$posts]);
    }

    public function getPost(Request $request)
    {
        $id = $request->get('postId');
        $post = Posts::where('id' , $id)->get();
        return $post;
    }

    public function createPost(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'title'       => 'required',
            'description' => 'required',
            'status'      => 'required',
            // 'img'         => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'errors' => $validator->errors()
            ];
        }
        $postData      = $request->all();
       // $img      = $this->fileUpload($request);

       // $postData['img']     = $img;
        $postData['user_id'] = Auth::id();
        $postData['img']     = 'img1.png';
        $posts               = Posts::create($postData);

        return [
            'status'   => true,
            'item'     => $posts
        ];
    }

    public function updatePost(Request $request)
    {
        $postData      = $request->all();
        $validator = \Validator::make($postData, [
            'title'       => 'required|min:2|max:255',
            'description' => 'required|min:10|max:255',
            // 'status'      => 'required',
            // 'img'         => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return [
                'errors' => $validator->errors()
            ];
        }
        // if(isset($postData['img'])){
        //     $img             = $this->fileUpload($request);
        //     $postData['img'] = $img;
        // }

        $id = $postData['id'];
        // unset($postData['_token']);
        unset($postData['id']);
        $post = Posts::where('id', $id)->update($postData);

        return [
            'status' => true
        ];
    }

    public function deletePost(Request $request)
    {
        $id  = $request->post('postId');
        return Posts::where('id' , $id)->delete();
    }

    // private function fileUpload(Request $request)
    // {
    //     $validator = \Validator::make($request->all(), [
    //         'img' => 'required|image|mimes:jpeg,png,jpg,gif'
    //     ]);

    //     if ($validator->fails()) {
    //         return [
    //             'errors' => $validator->errors()
    //         ];
    //     }

    //     $images = $request->file('img');

    //     $imageName = uniqid(time()) . '.' . $images->getClientOriginalExtension();

    //     $destinationPath = public_path('images/');

    //     $images->move($destinationPath, $imageName);

    //     return $imageName;
    // }
}
