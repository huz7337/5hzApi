<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Models\Tag;
use App\Models\User;
use App\Services\TagService;

class TagsController extends Controller
{
    /**
     * @var TagService
     */
    protected TagService $_service;

    /**
     * Constructor.
     * @param TagService $service
     */
    function __construct(TagService $service)
    {
        $this->_service = $service;
    }

    /**
     * List tags blade
     *
     * @return mixed
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'DESC')->paginate(config('filters.per_page'));
        return view('dashboard.tags.index', compact('tags'));
    }

    /**
     * Create tag blade
     *
     * @return mixed
     */
    public function create()
    {
        return view('dashboard.tags.create');
    }

    /**
     * Edit tag blade
     *
     * @return mixed
     */
    public function edit(Tag $tag)
    {
        return view('dashboard.tags.edit', compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TagCreateRequest $request
     * @return mixed
     */
    public function store(TagCreateRequest $request)
    {
        $data = $request->validated();

        $this->_service->create($data);
        return redirect()->route('tags.index')
            ->with('success', 'Tag created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TagUpdateRequest $request
     * @param Tag $tag
     * @return mixed
     */
    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();

        $this->_service->update($tag, $data);
        return redirect()->route('tags.edit', $tag->id)
            ->with('success', 'Tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     * @return mixed
     */
    public function destroy(Tag $tag)
    {
        $this->authorize(User::PERMISSION_TAG_DELETE);

        $tag->delete();
        return redirect()->route('tags.index')
            ->with('success', 'Tag deleted successfully');
    }
}
