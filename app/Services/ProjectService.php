<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class ProjectService
{
    /**
     * Add a new project
     * @param array $data
     * @return Project
     */
    public function create(array $data): Project
    {
        $project = Project::create($data);

        $project->meta()->create([
            'title' => [App::getLocale() => $data['meta']['title']],
            'description' => [App::getLocale() => $data['meta']['description']],
            'keywords' => [App::getLocale() => $data['meta']['keywords']],
            'slug' => $data['slug'] ?? Str::slug($data['meta']['title']),
        ]);

        return $project;
    }

    /**
     * Update project
     * @param Project $project
     * @param array $data
     * @return Project
     */
    public function update(Project $project, array $data): Project
    {
        $project['active'] = $data['active'] ?? false;

        $project->update($data);

        $meta = $project->meta()->firstOrNew([]);
        $meta->slug = $data['meta']['slug'] ?? Str::slug($data['meta']['title']);
        $meta->setTranslation('title', App::getLocale(), $data['meta']['title'])
            ->setTranslation('description', App::getLocale(), $data['meta']['description'])
            ->setTranslation('keywords', App::getLocale(), $data['meta']['keywords'])
            ->save();

        return $project;
    }

    /**
     * Add a new project attachment
     * @param object $attachment
     */
    public function createAttachment(Project $project, object $attachment)
    {
        $path = $attachment->store('images/projects', 'public');

        $project->attachment()->create([
            'path' => $path,
        ]);
    }

}

