<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Test</title>

</head>
<body>
<div>
    <?php $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName() ?>
    <nav>
        <ul>
            <li class="d-inline-block">
                <a href="{{route('companies')}}"
                   class="@if ($currentRoute === 'companies')active @endif">Companies</a>
            </li>
            <li class="d-inline-block">
                <a href="{{route('references')}}"
                   class="@if ($currentRoute === 'references')active @endif">References</a>
            </li>
        </ul>
    </nav>
    @yield('content')
</div>

</body>
</html>
