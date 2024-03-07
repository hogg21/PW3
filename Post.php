<?php
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class BlogPost extends Model {
    public function createPost(Request $request)
{
    $post = Post::create([
        'title' => $request->input('title'),
        'content' => $request->input('content')
    ]);
    
    return response()->json($post);
}

// Редагування поста
public function updatePost(Request $request, $id)
{
    $post = Post::findOrFail($id);
    
    $post->update([
        'title' => $request->input('title'),
        'content' => $request->input('content')
    ]);

    return response()->json($post);
}

// Видалення поста
public function deletePost($id)
{
    $post = Post::findOrFail($id);
    $post->delete();

    return response()->json('Post deleted successfully');
}
}
?>