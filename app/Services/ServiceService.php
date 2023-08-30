<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class ServiceService
{
    /**
     * Add a new service
     * @param array $data
     * @return Service
     */
    public function create(array $data): Service
    {
        $service = Service::create($data);

        $service->meta()->create([
            'title' => [App::getLocale() => $data['meta']['title']],
            'description' => [App::getLocale() => $data['meta']['description']],
            'keywords' => [App::getLocale() => $data['meta']['keywords']],
            'slug' => $data['slug'] ?? Str::slug($data['meta']['title']),
        ]);

        return $service;
    }

    /**
     * Update service
     * @param Service $service
     * @param array $data
     * @return Service
     */
    public function update(Service $service, array $data): Service
    {
        $service['active'] = $data['active'] ?? false;

        $service->update($data);

        $meta = $service->meta()->firstOrNew([]);
        $meta->slug = $data['meta']['slug'] ?? Str::slug($data['meta']['title']);
        $meta->setTranslation('title', App::getLocale(), $data['meta']['title'])
            ->setTranslation('description', App::getLocale(), $data['meta']['description'])
            ->setTranslation('keywords', App::getLocale(), $data['meta']['keywords'])
            ->save();

        return $service;
    }

    /**
     * Add a new service attachment
     * @param object $attachment
     */
    public function createAttachment(Service $service, object $attachment)
    {
        $path = $attachment->store('images/services', 'public');

        $service->attachment()->create([
            'path' => $path,
        ]);
    }

}

