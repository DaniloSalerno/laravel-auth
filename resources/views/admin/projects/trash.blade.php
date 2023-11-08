@extends('layouts.admin')

@section('content')
<div class="container">

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>Success!</strong> {{ session('message') }}
        </div>
    @endif

    <h1 class="text-white py-4">Trash</h1>

    <table class="table table-primary table-hover table-striped table-bordered">
    
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Deleted at</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        {{-- /thead --}}
    
        <tbody class="table-group-divider">
            @forelse ($trash_project as $project)
    
            <tr>
                <td scope="row"> {{$project->id}} </td>
                <td> {{$project->title}} </td>
    
                <td>
                    <img width="100" class="img-fluid" src="{{$project->thumb}}" alt="">
                </td>
    
                <td> {{$project->description}} </td>

                <td> {{$project->deleted_at}} </td>

    
                <td>
                    {{-- bottoni per ripristino e cancellazione --}}
                    view/restore/delete
                </td>
    
            </tr>
            @empty
                <tr>
                    <td>No project trashed</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


@endsection