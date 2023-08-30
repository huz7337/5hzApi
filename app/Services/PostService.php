<?php

namespace App\Services;


use App\Models\Post;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class PostService
{
    /**
     * Add a new post
     * @param array $data
     * @return Post
     */
    public function create(array $data): Post
    {
        $post = Post::create($data);

        $post->meta()->create([
            'title' => [App::getLocale() => $data['meta']['title']],
            'description' => [App::getLocale() => $data['meta']['description']],
            'keywords' => [App::getLocale() => $data['meta']['keywords']],
            'slug' => $data['slug'] ?? Str::slug($data['meta']['title']),
        ]);

        $post->tags()->sync($data['tag_ids'] ?? []);

        return $post;
    }

    /**
     * Update post
     * @param Post $post
     * @param array $data
     * @return Post
     */
    public function update(Post $post, array $data): Post
    {
        $post['active'] = $data['active'] ?? false;
        $data['is_comments'] = $data['is_comments'] ?? false;

        $post->update($data);

        // Отримати поточний запис метаданих або створити новий
        $meta = $post->meta()->firstOrNew([]);
        $meta->slug = $data['meta']['slug'] ?? Str::slug($data['meta']['title']);
        $meta->setTranslation('title', App::getLocale(), $data['meta']['title'])
            ->setTranslation('description', App::getLocale(), $data['meta']['description'])
            ->setTranslation('keywords', App::getLocale(), $data['meta']['keywords'])
            ->save();

        $post->tags()->sync($data['tag_ids'] ?? []);

        return $post;
    }

    /**
     * Add a new post attachment
     * @param object $attachment
     */
    public function createAttachment(Post $post, object $attachment)
    {
        $path = $attachment->store('images/posts', 'public');

        $post->attachment()->create([
            'path' => $path,
        ]);
    }

}

