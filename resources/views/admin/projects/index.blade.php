@extends('layouts.admin')

@section('content')

<div class="container py-4">


        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              <strong>Success!</strong> {{session('message')}}
            </div>
            
        @endif

        <h2 class="text-muted text-uppercase">Projects table</h1>

        <div id="icons">
            <a class="btn btn-primary d-inline-flex align-items-center justify-items-center p-2" href="{{ route('admin.projects.create') }}">
                <i class="fa-solid fa-plus"></i>
            </a>
    
            <a class="btn btn-danger d-inline-flex align-items-center justify-items-center p-2" href="{{ route('admin.trash') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                  </svg>
            </a>
        </div>
        {{-- /#icons --}}

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
    
                            <img width="100" class="img-fluid" src="{{$project->thumb}}" alt="">

                        </td>

                        <td> {{$project->description}} </td>
                        
                        <td>

                            <div class="d-flex gap-2">
                                <a href=" {{route('admin.projects.show', $project->slug)}} " class="btn btn-outline-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a> 
                                <a href=" {{route('admin.projects.edit', $project->slug)}} " class="btn btn-outline-success">
                                    <i class="fa-solid fa-file-pen"></i>
                                </a> 
    
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalId-{{$project->id}}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                             
                             <!-- Modal Body -->
                             <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId-{{$project->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{$project->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">

                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title d-flex justify-content-center align-items-center gap-3 w-100" id="modalTitleId-{{$project->id}}">
                                                <i class="fa-solid fa-triangle-exclamation text-warning"></i> Warning <i class="fa-solid fa-triangle-exclamation text-warning"></i>
                                            </h5>
                                        </div>
                                        {{-- /.modal-header --}}

                                        <div class="modal-body text-center">
                                            Are you sure to delete?
                                        </div>
                                        {{-- /.modal-body --}}

                                        <div class="modal-footer d-flex justify-content-center align-items-center gap-3">

                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Confirm</button>
                                            </form>

                                        </div>
                                        {{-- /.modal-footer --}}

                                    </div>
                                    {{-- /.modal-content --}}

                                </div>
                                {{-- /.modal-dialog --}}
                            </div>
                            {{-- /.modal --}}

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