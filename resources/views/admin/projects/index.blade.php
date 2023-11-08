@extends('layouts.admin')

@section('content')

<div class="container py-4">


        {{-- @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              <strong>Success!</strong> {{session('message')}}
            </div>
            
        @endif --}}

        <h1>Projects table</h1>

        <div class="d-flex justify-content-between my-4">
            <a class="btn btn-primary" href="{{-- {{ route('projects.create') }} --}}">Add New project</a>
            <a class="btn btn-danger" href="{{-- {{ route('projects.trash') }} --}}">Trash</a>

        </div>

        <div class="pt-4"> {{$projects->links('pagination::bootstrap-5')}} </div>

        <div class="table-responsive">
            <table class="table table-primary table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($projects as $project)
    
                    <tr>
                        <td scope="row"> {{$project->id}} </td>
                        <td> {{$project->title}} </td>

                        <td>
                            @if (str_contains($project->thumb, 'http'))
                                <img width="100" class=" img-fluid" src="{{ $project->thumb }}">
                            @else
                                <img width="100" class=" img-fluid" src="{{asset('storage/' . $project->thumb)}}" alt="">
                            @endif
                        </td>

                        <td> {{$project->description}} </td>
                        <td class="d-flex gap-2 py-4">
                             <a href=" {{-- {{route('projects.show', $project->id)}} --}} " class="btn btn-outline-primary">View</a> 
                             <a href=" {{-- {{route('projects.edit', $project->id)}} --}} " class="btn btn-outline-success">Edit</a> 
                        </td>
                    </tr>
                        
                    @empty
                        No projects yet
                    @endforelse
                </tbody>
            </table>
            <div class="pt-4"> {{$projects->links('pagination::bootstrap-5')}} </div>
        </div>
    </div>
    

@endsection