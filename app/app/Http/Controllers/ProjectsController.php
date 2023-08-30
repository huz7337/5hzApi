<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListProjectsRequest;
use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Http\Transformers\ProjectTransformer;
use App\Models\Project;
use App\Models\User;
use App\Queries\ProjectsQuery;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    /**
     * @var ProjectTransformer
     */
    protected ProjectTransformer $_transformer;

    /**
     * @var ProjectService
     */
    protected ProjectService $_service;

    /**
     * Constructor.
     * @param ProjectService $service
     */
    public function __construct(ProjectTransformer $transformer, ProjectService $service)
    {
        $this->_service = $service;
        $this->_transformer = $transformer;
    }

    /**
     * List brojects blade
     *
     * @return mixed
     */
    public function index()
    {
        $this->authorize(User::PERMISSION_PROJECT_LIST);

        $projects = Project::orderBy('id', 'DESC')->paginate(config('filters.per_page'));
        return view('dashboard.projects.index', compact('projects'));
    }

    /**
     * List projects, paginated
     * With search, filter and sorting
     * @param ListProjectsRequest $request
     * @return mixed
     */
    public function list(ListProjectsRequest $request)
    {
        $params = $request->validated();
        $items = ProjectsQuery::make($params)
            ->query()->paginate(
                $params['per_page'] ?? config('filters.per_page')
            );

        return response()->json($this->_transformer->transform($items));
    }

    /**
     * Show project
     * @return mixed
     */
    public function show(string $slug)
    {
        $project = Project::findBySlug($slug);
        return response()->json($this->_transformer->transform($project->load('attachment')));
    }

    /**
     * Create project blade
     *
     * @return mixed
     */
    public function create()
    {
        $this->authorize(User::PERMISSION_PROJECT_CREATE);

        return view('dashboard.projects.create');
    }

    /**
     * Edit project blade
     *
     * @return mixed
     */
    public function edit(Project $project)
    {
        $this->authorize(User::PERMISSION_PROJECT_UPDATE);

        $project = $this->_transformer->transform($project);
        return view('dashboard.projects.edit', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectCreateRequest $request
     * @return mixed
     */
    public function store(ProjectCreateRequest $request)
    {
        $data = $request->validated();

        $project = $this->_service->create($data);

        if (isset($data['attachment'])) {
            $this->_service->createAttachment($project, $data['attachment']);
        }

        return redirect()->route('projects.edit', $project->id)
            ->with('success', 'The project was created successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectUpdateRequest $request
     * @param Project $project
     * @return mixed
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $data = $request->validated();

        $this->_service->update($project, $data);

        if (isset($data['attachment'])) {
            if ($project->attachment) {
                Storage::disk('public')->delete($project->attachment->path);
                $project->attachment()->delete();
            }

            $this->_service->createAttachment($project, $data['attachment']);
        }

        return redirect()->route('projects.edit', $project->id)
            ->with('success', 'The project has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return mixed
     */
    public function destroy(Project $project)
    {
        $this->authorize(User::PERMISSION_PROJECT_DELETE);

        if ($project->attachment) {
            Storage::disk('public')->delete($project->attachment->path);
            $project->attachment()->delete();
        }

        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully');
    }
}
