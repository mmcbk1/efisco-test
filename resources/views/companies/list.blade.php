@extends('index')
@section('content')
    <div>
        <h3>You can add new company</h3>
    </div>
    <form action="{{route('store')}}" method="post">
        {{csrf_field()}}
        <div>
            <div>{{$errors->first('name')}}</div>
            <input type="text" name="name" placeholder="name...">
        </div>
        <div>
            <button type="submit">Add</button>
        </div>
    </form>
    @if(count($companies))
        <table class="table text-center">
            <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>
                        {{$company->id}}
                    </td>
                    <td>
                        <div>
                            <a href="{{route('company', ['id' => $company->id])}}">{{$company->name}}</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <div>
            {{$companies->links()}}
        </div>
    @endif
@endsection
