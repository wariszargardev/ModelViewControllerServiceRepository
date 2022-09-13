<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Laravel 9 PDF Generate Example</title>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <table class="table table-bordered mb-5">
        <thead>
        <tr class="table-danger">
            <th class="col">#</th>
            <th class="col">Name</th>
            <th class="col">Email</th>
            <th class="col">Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($students ?? '' as $key => $student)
            <tr>
                <th>{{++$key}}</th>
                <th>{{$student->name}}</th>
                <th>{{$student->email}}</th>
                <th>{{$student->created_at}}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
