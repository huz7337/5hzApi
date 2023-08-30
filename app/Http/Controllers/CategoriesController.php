<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Transformers\CategoryTransformer;
use App\Http\Transformers\ProjectTransformer;
use App\Models\Category;
use App\Models\User;
use App\Services\CategoryService;

class CategoriesController extends Controller
{
    /**
     * @var ProjectTransformer
     */
    protected CategoryTransformer $_transformer;

    /**
     * @var CategoryService
     */
    protected CategoryService $_service;

    /**
     * Constructor.
     * @param CategoryService $service
     */
    public function __construct(CategoryTransformer $transformer, CategoryService $service)
    {
        $this->_transformer = $transformer;
        $this->_service = $service;
    }

    /**
     * List categories blade
     *
     * @return mixed
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(config('filters.per_page'));
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * List categories blade
     *
     * @return mixed
     */
    public function list()
    {
        $items = Category::has('posts')->orderBy('id', 'DESC')->paginate(config('filters.per_page'));
        return response()->json($this->_transformer->transform($items));
    }

    /**
     * Create category blade
     *
     * @return mixed
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Edit tag blade
     *
     * @return mixed
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryCreateRequest $request
     * @return mixed
     */
    public function store(CategoryCreateRequest $request)
    {
        $data = $request->validated();

        $this->_service->create($data);
        return redirect()->route('categories.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryUpdateRequest $request
     * @param Category $category
     * @return mixed
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        $this->_service->update($category, $data);
        return redirect()->route('categories.edit', $category->id)
            ->with('success', 'Category updated successfully new second');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return mixed
     */
    public function destroy(Category $category)
    {
        $this->authorize(User::PERMISSION_CATEGORY_DELETE);

        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
