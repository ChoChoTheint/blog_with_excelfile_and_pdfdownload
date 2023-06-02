<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <h1>Create</h1>
    <div class="container text-center">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
           <div class="mb-3 ">
                <label for="" class="form-label">Title</label>
                <input type="text" name="title" class="form-control">
           </div>

            <div class="mb-3 ">
                <label for="" class="form-label">Description</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class=" mb-3">
                <input type="file" class="form-control" name="file">
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>