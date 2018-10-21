@extends('index')
@section('content')
    <div>
        <form action="{{route('store-reference')}}" method="post">
            {{csrf_field()}}
            <div>{{$errors->first('company_hash')}}</div>
            <input type="hidden" value="{{$companyIdHash}}" name="company_hash">
            <div>
                <div>{{$errors->first('title')}}</div>
                <input type="text" name="title" placeholder="title" value="{{old('title')}}">
            </div>
            <div>
                <div>{{$errors->first('reference')}}</div>
                <input type="text" name="reference" placeholder="reference" value="{{old('reference')}}">
            </div>
            <div>
                <div>{{$errors->first('email')}}</div>
                <input type="text" name="email" placeholder="email" value="{{old('email')}}">
            </div>
            <div>
                <div>{{$errors->first('job_description')}}</div>
                <textarea name="job_description"
                          placeholder="description...">@if(old('job_description')){{old('job_description')}}@endif</textarea>
            </div>
            <div>
                <button type="submit">Add</button>
            </div>
        </form>
    </div>
    <div>
        <h3>Company info:</h3>
        <p>ID: {{$company->id}}</p>
        <p>Name: {{$company->name}}</p>
    </div>
    <div>
        <h3>References:</h3>
        <table class="table text-center">
            <thead>
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>reference</th>
                <th>e-mail</th>
                <th>job description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($company->references as $reference)
                <tr>
                    <td>{{$reference->id}}</td>
                    <td>{{$reference->title}}</td>
                    <td>
                        <a href="{{route('reference', ['id' => $reference->id])}}">{{$reference->reference}}</a>
                    </td>
                    <td>{{$reference->email}}</td>
                    <td>{{$reference->job_description}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <a href="{{route('companies')}}">companies</a>
    </div>
@endsection
