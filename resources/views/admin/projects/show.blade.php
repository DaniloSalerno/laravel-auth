@extends('layouts.admin')

@section('content')

<div>
    Title: 
    {{$project->title}}
</div>

<div>
    Id:
    {{$project->id}}
</div>

@endsection