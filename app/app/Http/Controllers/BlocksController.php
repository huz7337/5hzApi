<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlockCreateRequest;
use App\Http\Requests\BlockUpdateRequest;
use App\Http\Transformers\BlockTransformer;
use App\Models\Block;
use App\Models\User;
use App\Services\BlockService;

class BlocksController extends Controller
{
    /**
     * @var BlockTransformer
     */
    protected BlockTransformer $_transformer;

    /**
     * @var BlockService
     */
    protected BlockService $_service;

    /**
     * Constructor.
     * @param BlockService $service
     */
    public function __construct(BlockTransformer $transformer, BlockService $service)
    {
        $this->_transformer = $transformer;
        $this->_service = $service;
    }

    /**
     * List blocks blade
     *
     * @return mixed
     */
    public function index()
    {
        $blocks = Block::orderBy('id', 'DESC')->paginate(config('filters.per_page'));
        return view('dashboard.blocks.index', compact('blocks'));
    }

    /**
     * List blocks blade
     *
     * @return mixed
     */
    public function list()
    {
        $items = Block::orderBy('id', 'DESC')->paginate(config('filters.per_page'));
        return response()->json($this->_transformer->transform($items));
    }

    /**
     * Create block blade
     *
     * @return mixed
     */
    public function create()
    {
        return view('dashboard.blocks.create');
    }

    /**
     * Edit block blade
     *
     * @return mixed
     */
    public function edit(Block $block)
    {
        $block = $this->_transformer->transform($block);

        return view('dashboard.blocks.edit', compact('block'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlockCreateRequest $request
     * @return mixed
     */
    public function store(BlockCreateRequest $request)
    {
        $data = $request->validated();

        $this->_service->create($data);
        return redirect()->route('blocks.index')
            ->with('success', 'Block created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlockUpdateRequest $request
     * @param Block $block
     * @return mixed
     */
    public function update(BlockUpdateRequest $request, Block $block)
    {
        $data = $request->validated();

        $this->_service->update($block, $data);
        return redirect()->route('blocks.edit', $block->id)
            ->with('success', 'Block updated successfully new second');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Block $block
     * @return mixed
     */
    public function destroy(Block $block)
    {
        $this->authorize(User::PERMISSION_BLOCK_DELETE);

        $block->delete();
        return redirect()->route('blocks.index')
            ->with('success', 'Block deleted successfully');
    }
}
