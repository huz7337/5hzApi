<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentService
{

    /**
     * Add a new comment
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $data['user_id'] = Auth::id();

        if (Auth::user()->hasRole(User::ROLE_ADMIN)){
            $data['is_approved'] = true;
        }

        if (isset($data['post_id'])) {
            $post = Post::find($data['post_id']);
            return $post->comments()->create($data);
        }

        if (isset($data['page_id'])) {
            $page = Page::find($data['page_id']);
            return $page->comments()->create($data);
        }

        return $data;
    }

    /**
     * Update comment
     * @param Comment $comment
     * @param array $data
     * @return Comment
     */
    public function update(Comment $comment, array $data): Comment
    {
        $comment['is_approved'] = $data['is_approved'] ?? false;

        $comment->update(['comment' => $data['comment']]);

        return $comment;
    }

    /**
     * Add a new comment attachments
     * @param array $data
     */
    public function createAttachmentsComment(Comment $comment, array $data)
    {
        foreach ($data as $attachment)
        {
            $path = $attachment->store('images', 'public');

            $comment->attachments()->create([
                'path' => $path,
            ]);
        }
    }

}
