<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body{
        background-color: rgb(227, 227, 233);
        color: rgb(4, 23, 132);
    }

</style>
<body  >
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h1 class="display-1 text-danger">404</h1>
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">Not Found</h2>
                        <p class="card-text">The page you are looking for does not exist.</p>
                        <a href="{{  route('login') }}" class="btn btn-primary">Go to Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>