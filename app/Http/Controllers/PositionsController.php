<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionCreateRequest;
use App\Http\Requests\PositionUpdateRequest;
use App\Models\Position;
use App\Models\User;
use App\Services\PositionService;

class PositionsController extends Controller
{
    /**
     * @var PositionService
     */
    protected PositionService $_service;

    /**
     * Constructor.
     * @param PositionService $service
     */
    public function __construct(PositionService $service)
    {
        $this->_service = $service;
    }

    /**
     * List positions blade
     *
     * @return mixed
     */
    public function index()
    {
        $positions = Position::orderBy('id', 'DESC')->paginate(config('filters.per_page'));
        return view('dashboard.positions.index', compact('positions'));
    }

    /**
     * Create position blade
     *
     * @return mixed
     */
    public function create()
    {
        return view('dashboard.positions.create');
    }

    /**
     * Edit tag blade
     *
     * @return mixed
     */
    public function edit(Position $position)
    {
        return view('dashboard.positions.edit', compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PositionCreateRequest $request
     * @return mixed
     */
    public function store(PositionCreateRequest $request)
    {
        $data = $request->validated();

        $this->_service->create($data);
        return redirect()->route('positions.index')
            ->with('success', 'Position created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PositionUpdateRequest $request
     * @param Position $position
     * @return mixed
     */
    public function update(PositionUpdateRequest $request, Position $position)
    {
        $data = $request->validated();

        $this->_service->update($position, $data);
        return redirect()->route('positions.edit', $position->id)
            ->with('success', 'Position updated successfully new second');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Position $position
     * @return mixed
     */
    public function destroy(Position $position)
    {
        $this->authorize(User::PERMISSION_POSITION_DELETE);

        $position->delete();
        return redirect()->route('positions.index')
            ->with('success', 'Position deleted successfully');
    }
}
