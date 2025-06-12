<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'user', 'tags'])
            ->latest()
            ->paginate(10);

        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::active()->orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view('admin.blog.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|max:500',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published,archived',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:500',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->content = $request->content;
        $post->excerpt = $request->excerpt;
        $post->category_id = $request->category_id;
        $post->user_id = auth()->id();
        $post->status = $request->status;
        $post->is_featured = $request->boolean('is_featured');
        $post->meta_data = [
            'title' => $request->meta_title,
            'description' => $request->meta_description,
        ];

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blog', 'public');
            $post->featured_image = $imagePath;
        }

        if ($request->status === 'published') {
            $post->published_at = now();
        }

        $post->save();

        // Attach tags
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.blog.index')
            ->with('success', 'Bài viết đã được tạo thành công!');
    }

    public function show(Post $post)
    {
        $post->load(['category', 'user', 'tags', 'comments.user']);

        return view('admin.blog.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::active()->orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        $selectedTags = $post->tags->pluck('id')->toArray();

        return view('admin.blog.edit', compact('post', 'categories', 'tags', 'selectedTags'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|max:500',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published,archived',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:500',
        ]);

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->content = $request->content;
        $post->excerpt = $request->excerpt;
        $post->category_id = $request->category_id;
        $post->status = $request->status;
        $post->is_featured = $request->boolean('is_featured');
        $post->meta_data = [
            'title' => $request->meta_title,
            'description' => $request->meta_description,
        ];

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }

            $imagePath = $request->file('featured_image')->store('blog', 'public');
            $post->featured_image = $imagePath;
        }

        // Set published date if status changes to published
        if ($request->status === 'published' && $post->published_at === null) {
            $post->published_at = now();
        }

        $post->save();

        // Sync tags
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('admin.blog.index')
            ->with('success', 'Bài viết đã được cập nhật thành công!');
    }

    public function destroy(Post $post)
    {
        // Delete featured image
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        // Delete the post (this will also delete related comments due to cascade)
        $post->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Bài viết đã được xóa thành công!');
    }

    public function toggleStatus(Post $post)
    {
        $post->status = $post->status === 'published' ? 'draft' : 'published';

        if ($post->status === 'published' && $post->published_at === null) {
            $post->published_at = now();
        }

        $post->save();

        return response()->json([
            'success' => true,
            'status' => $post->status,
            'message' => 'Trạng thái bài viết đã được cập nhật!'
        ]);
    }
}
