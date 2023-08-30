<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListServicesRequest;
use App\Http\Requests\ServiceCreateRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Http\Transformers\ServiceTransformer;
use App\Models\Service;
use App\Models\User;
use App\Queries\ServicesQuery;
use App\Services\ServiceService;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    /**
     * @var ServiceTransformer
     */
    protected ServiceTransformer $_transformer;

    /**
     * @var ServiceService
     */
    protected ServiceService $_service;

    /**
     * Constructor.
     * @param ServiceService $service
     */
    public function __construct(ServiceTransformer $transformer, ServiceService $service)
    {
        $this->_service = $service;
        $this->_transformer = $transformer;
    }

    /**
     * List services blade
     *
     * @return mixed
     */
    public function index()
    {
        $this->authorize(User::PERMISSION_SERVICE_LIST);

        $services = Service::orderBy('id', 'DESC')->paginate(config('filters.per_page'));
        return view('dashboard.services.index', compact('services'));
    }

    /**
     * List services, paginated
     * With search, filter and sorting
     * @param ListServicesRequest $request
     * @return mixed
     */
    public function list(ListServicesRequest $request)
    {
        $params = $request->validated();
        $items = ServicesQuery::make($params)
            ->query()->paginate(
                $params['per_page'] ?? config('filters.per_page')
            );

        return response()->json($this->_transformer->transform($items));
    }

    /**
     * Show service
     * @return mixed
     */
    public function show(string $slug)
    {
        $service = Service::findBySlug($slug);
        return response()->json($this->_transformer->transform($service->load('attachment')));
    }

    /**
     * Create service blade
     *
     * @return mixed
     */
    public function create()
    {
        $this->authorize(User::PERMISSION_SERVICE_CREATE);

        return view('dashboard.services.create');
    }

    /**
     * Edit service blade
     *
     * @return mixed
     */
    public function edit(Service $service)
    {
        $this->authorize(User::PERMISSION_SERVICE_UPDATE);

        $service = $this->_transformer->transform($service);
        return view('dashboard.services.edit', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceCreateRequest $request
     * @return mixed
     */
    public function store(ServiceCreateRequest $request)
    {
        $data = $request->validated();

        $service = $this->_service->create($data);

        if (isset($data['attachment'])) {
            $this->_service->createAttachment($service, $data['attachment']);
        }

        return redirect()->route('services.edit', $service->id)
            ->with('success', 'The service was created successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServiceUpdateRequest $request
     * @param Service $service
     * @return mixed
     */
    public function update(ServiceUpdateRequest $request, Service $service)
    {
        $data = $request->validated();

        $this->_service->update($service, $data);

        if (isset($data['attachment'])) {
            if ($service->attachment) {
                Storage::disk('public')->delete($service->attachment->path);
                $service->attachment()->delete();
            }

            $this->_service->createAttachment($service, $data['attachment']);
        }

        return redirect()->route('services.edit', $service->id)
            ->with('success', 'The service has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return mixed
     */
    public function destroy(Service $service)
    {
        $this->authorize(User::PERMISSION_SERVICE_DELETE);

        if ($service->attachment) {
            Storage::disk('public')->delete($service->attachment->path);
            $service->attachment()->delete();
        }

        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully');
    }
}
