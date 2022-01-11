<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <title>@yield('title')</title>
</head>
<body>

    <div id="root">
        @yield('content')
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="http://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        } );
    </script>
</body>
</html>
