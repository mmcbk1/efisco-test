@extends('index')
@section('content')
    <div>
        <h3>Reference info:</h3>
        <p>Company name: {{$reference->company->name}}</p>
        <p>ID: {{$reference->id}}</p>
        <p>Reference: {{$reference->reference}}</p>
        <p>Title: {{$reference->title}}</p>
        <p>E-mail: {{$reference->email}}</p>
        <p>Job description: {{$reference->job_description}}</p>
    </div>
    <div>
        <a href="{{route('references')}}">references</a>
    </div>
@endsection
