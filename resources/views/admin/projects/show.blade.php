@extends('layouts.app')

@section('content')
  <section class="container mt-3">
    <a href="{{ route('admin.projects.index') }}" class="">
      <button class="btn btn-outline-secondary mb-3">Return to the list</button>
  </a>
  <a href="{{ route('admin.projects.edit', $project) }}" class="">
      <button class="btn btn-outline-secondary mb-3">Edit project</button>
  </a>

  <div class="row">
      <div class="col-4">
          <img src="{{$project->img_path}}" alt="">
      </div>
      <div class="col-8">
          <div class="row g-4">
              <div class="col-12"><strong>{{$project->name}}</strong></div>
              <div class="col-12"><strong>Description: </strong> {{$project->description}}</div>
              <div class="col-3"><strong>Name Repo: </strong>{{$project->name_repo}}</div>
              <div class="col-3"><strong>Slug: </strong>{{$project->slug}}</div>
              <div class="col-3"><strong>Created at: </strong>{{$project->created_at}}</div>
              <div class="col-3"><strong>Updated at: </strong>{{$project->updated_at}}</div>
          </div>
      </div>
  </div>
  </section>
@endsection
