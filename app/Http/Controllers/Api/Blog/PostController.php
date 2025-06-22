<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;

class PostController extends Controller
{
    public function index()
    {
        return BlogPost::with(['user', 'category'])->get();
    }

    public function show($id)
{
    // Завантажуємо пост разом з автором і категорією
    $post = BlogPost::with(['user', 'category'])->find($id);

    if (!$post) {
        return response()->json(['message' => 'Пост не знайдено'], 404);
    }

    return response()->json($post);
}

}

