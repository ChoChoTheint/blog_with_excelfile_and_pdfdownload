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
    <button class="btn btn-success"><a href="{{route('post.create')}}" class="text-white">Create</a></button>
    <div class="row">
        <div class="col-12 ">
            <table class="table">
            <thead>
                <tr>
                   
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Email</th>
                    <th scope="col">File</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach($posts as $post)
                <tbody>
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->email}}</td>
                        <td>{{$post->file}}</td>
                        <td>
                            <button class="btn btn-primary" name="edit"><a href="{{ route('post.edit', $post->title) }}" class="text-light" method="post">Edit</a></button>
                            <button class="btn btn-danger" name="delete"><a href="{{ route('post.delete', $post->title) }}" class="text-light " method="get">Delete</a></button>
                        </td>
                    </tr>
                </tbody>
            @endforeach
                </tr>
            </table>
        </div>
    </div>
</body>
</html>