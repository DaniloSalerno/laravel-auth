@extends('layouts.admin')

@section('content')

<section class="create py-5 col-6 mx-auto">
    <div class="container">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif



        <form action=" {{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="mb-5">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="" aria-describedby="helpId" value="{{old('title')}}">
                <small id="titleHelper" class="text-muted">Type a title of Project</small>
                @error('title')
                    <div class="text-danger"> {{$message}} </div>
                @enderror
            </div>
            
            <div class="mb-5">
                <label for="thumb" class="form-label">Image</label>
                <input type="file" name="thumb" id="thumb" class="form-control @error('content') is-invalid @enderror" placeholder="" aria-describedby="helpId">
                <small id="imageHelper" class="text-muted">Upload an image</small>
                @error('thumb')
                <div class="text-danger"> {{$message}} </div>
                @enderror
            </div>
            
            <div class="mb-5">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="5" placeholder="Type a description">{{old('description')}}</textarea>
                @error('description')
                <div class="text-danger"> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" cols="30" rows="5" placeholder="Type a content">{{old('content')}}</textarea>
                @error('content')
                <div class="text-danger"> {{$message}} </div>
                @enderror
            </div>            
            
            <a class="text-decoration-none btn btn-primary" href="{{ route('admin.projects.index') }}">
                <i class="fa-solid fa-left-long"></i>
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-plus"></i>
            </button>
    
        </form>
    </div>
</section>


@endsection