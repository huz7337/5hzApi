<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Comment;
use App\Http\Requests\CommentCreateRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use App\Services\CommentService;
use Illuminate\Support\Facades\Storage;

class CommentsController extends Controller
{
    /**
     * @var CommentService
     */
    protected CommentService $_service;

    /**
     * Constructor.
     * @param CommentService $service
     */
    function __construct(CommentService $service)
    {
        $this->_service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $comments = Comment::orderBy('id', 'DESC')->paginate(config('filters.per_page'));
        return view('dashboard.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        $posts = Post::pluck('title', 'id')->all();
        $pages = Page::pluck('title', 'id')->all();

        return view('dashboard.comments.create', compact('posts', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CommentCreateRequest $request
     * @return mixed
     */
    public function store(CommentCreateRequest $request)
    {
        $data = $request->validated();

        $comment = $this->_service->create($data);

        if(isset($data['attachments'])){
            $this->_service->createAttachmentsComment($comment, $data['attachments']);
        }

        return redirect()->route('comments.index', $comment->id)
            ->with('success', 'Comment created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comment  $comment
     * @return mixed
     */
    public function edit(Comment $comment)
    {
        return view('dashboard.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CommentUpdateRequest  $request
     * @param  Comment  $comment
     * @return mixed
     */
    public function update(CommentUpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();

        $this->_service->update($comment, $data);

        if (isset($data['attachments'])) {
            $this->_service->createAttachmentsComment($comment, $data['attachments']);
        }

        return redirect()->route('comments.edit', $comment->id)
            ->with('success', 'Comment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comment  $comment
     * @return mixed
     */
    public function destroy(Comment $comment)
    {
        $this->authorize(User::PERMISSION_CATEGORY_DELETE);

        foreach ($comment->attachments as $attachment){
            Storage::delete("public/{$attachment['path']}");
        }

        $comment->attachments()->delete();
        $comment->delete();

        return redirect()->route('comments.index')
            ->with('success', 'Comment deleted successfully');
    }
}
