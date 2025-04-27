@extends('layout.dashboard.app')
@section('title', '403 Forbidden')
@section('body')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body{
        background-color:rgb(227, 227, 233);
        color:rgb(4, 23, 132);
    }

</style>
<body  >
    <div class="container text-center mt-5">
         <h1 class="display-1 text-danger">403</h1>
        <h2 class="mb-4">Forbidden</h2>
        <p class="lead">You don't have permission to access this page.</p>
        <a href="{{  route('admin.login') }}" class="btn btn-primary mt-3">Go to Homepage</a>
    </div>
</body>
</html>
@endsection
