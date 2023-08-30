<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListPostsRequest;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Transformers\PostTransformer;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Queries\PostsQuery;
use App\Services\PostService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * @var PostTransformer
     */
    protected PostTransformer $_transformer;

    /**
     * @var PostService
     */
    protected PostService $_service;

    /**
     * Constructor.
     * @param PostService $service
     */
    public function __construct(PostTransformer $transformer, PostService $service)
    {
        $this->_service = $service;
        $this->_transformer = $transformer;
    }

    /**
     * List Posts blade
     *
     * @return mixed
     */
    public function index()
    {
        $this->authorize(User::PERMISSION_POST_LIST);

        $posts = Post::orderBy('id', 'ASC')->paginate(config('filters.per_page'));
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * List posts, paginated
     * With search, filter and sorting
     * @param ListPostsRequest $request
     * @return mixed
     */
    public function list(ListPostsRequest $request)
    {
        $params = $request->validated();

        $items = PostsQuery::make($params)
            ->query()->paginate(
                $params['per_page'] ?? config('filters.per_page')
            );

        return response()->json($this->_transformer->transform($items));
    }

    /**
     * Show post
     * @return mixed
     */
    public function show(string $slug)
    {
        $post = Post::findBySlug($slug);
        $cacheKey = 'post_view_' . $post->id;

        if (!Cache::has($cacheKey)) {
            if (!$post->views) {
                $post->views()->create(['views_count' => 0]);
            }
            $post->views()->increment('views_count');
            Cache::put($cacheKey, true, now()->addHours(24));
        }

        return response()->json($this->_transformer->transform($post));
    }

    /**
     * Create Post blade
     *
     * @return mixed
     */
    public function create()
    {
        $this->authorize(User::PERMISSION_POST_CREATE);

        $tags = Tag::pluck('name', 'id')->all();
        $categories = Category::pluck('name', 'id')->all();

        return view('dashboard.posts.create', compact('tags', 'categories'));
    }

    /**
     * Edit post blade
     *
     * @return mixed
     */
    public function edit(Post $post)
    {
        $this->authorize(User::PERMISSION_POST_UPDATE);

        $tags = Tag::pluck('name', 'id')->all();
        $categories = Category::pluck('name', 'id')->all();
        $postTags = $post->tags->pluck('id')->all();
        $post = $this->_transformer->transform($post);

        return view('dashboard.posts.edit', compact('post', 'tags', 'postTags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCreateRequest $request
     * @return mixed
     */
    public function store(PostCreateRequest $request)
    {
        $data = $request->validated();

        $post = $this->_service->create($data);

        if (isset($data['attachment'])) {
            $this->_service->createAttachment($post, $data['attachment']);
        }

        return redirect()->route('posts.edit', $post->id)
            ->with('success', 'The post was created successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostUpdateRequest $request
     * @param Post $post
     * @return mixed
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        $this->_service->update($post, $data);

        if (isset($data['attachment'])) {
            if ($post->attachment) {
                $post->attachment()->delete();
                Storage::disk('public')->delete($post->attachment->path);
            }

            $this->_service->createAttachment($post, $data['attachment']);
        }

        return redirect()->route('posts.edit', $post->id)
            ->with('success', 'The post has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return mixed
     */
    public function destroy(Post $post)
    {
        $this->authorize(User::PERMISSION_POST_DELETE);

        if ($post->attachment) {
            Storage::disk('public')->delete($post->attachment->path);
            $post->attachment()->delete();
        }

        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
