<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <title>@yield('title')</title>
</head>
<body>

    <div id="root">
        @component('app._components.navbar')
        @endcomponent

        @yield('content')
    </div>

</body>
    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="http://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatable.js') }}" ></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</html>
