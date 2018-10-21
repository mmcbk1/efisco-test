@extends('index')
@section('content')
    <h3>References:</h3>
    @if(count($references))
        <table class="table text-center">
            <thead>
            <tr>
                <th>ID</th>
                <th>company name</th>
                <th>reference</th>
                <th>title</th>
                <th>job description</th>
            </tr>
            </thead>
            <tbody>

            @foreach($references as $reference)
                <tr>
                    <td>
                        {{$reference->id}}
                    </td>
                    <td>
                        {{$reference->company->name}}
                    </td>
                    <td>
                        <a href="{{route('reference', ['id' => $reference->id])}}">{{$reference->reference}}</a>
                    </td>
                    <td>
                        {{$reference->title}}
                    </td>
                    <td>
                        {{$reference->job_description}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$references->links()}}
    @endif
@endsection
