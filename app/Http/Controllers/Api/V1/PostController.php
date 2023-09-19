<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PostResource;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(Post::latest()->paginate());
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            "message" => "Success"
        ], 204);
    }
}
