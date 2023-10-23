<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(8);
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $this->validation($request->all(), $project->id);

        $project->update($data);

        return redirect()->route('admin.project.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.project.index');
    }

    private function validation($data, $id = null){
        $validator = Validator::make(
            $data, 
            [
                'name'=>'required|string|max:25',
                'name_repo'=>'required|string',
                'slug'=>'required|string',
                'img_path'=>'required|string|url',
                'description'=>'nullable|string',
            ],
            [
                'name.required'=>'The name is obligatory',
                'name.string' => 'The name must be a string',
                'name.max' => 'The name must be a maximum of 25 characters',

                'name_repo.required'=>'The name_repo is obligatory',
                'name_repo.string' => 'The name_repo must be a string',

                'slug.required'=>'The name_repo is obligatory',
                'slug.string' => 'The name_repo must be a string',
                
                'img_path.required' => 'The image path is obligatory',
                'img_path.string' => 'The image path must be a string',
                'img_path.url' => 'The image path must be a URI',

                'description.string'=> 'The description must be a string',                
            ],
        )->validate();
        return $validator;
    }
}