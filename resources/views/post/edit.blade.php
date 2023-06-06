<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <h1>Edit Page</h1>
 
    <div class="container">
        
        <form action="{{ route('post.update', $posts['title']) }}" method="post" enctype="multipart/form-data">

            @csrf
           <div class="mb-3 ">
                <label for="" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{$posts->title}}">
           </div>

            <div class="mb-3 ">
                <label for="" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" value="{{$posts->description}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" value="{{$posts->email}}">
            </div>
            <div class=" mb-3">
                <input type="file" class="form-control" name="file" value="{{$posts->file}}">
                <img src="{{asset('storage/file/'.$posts->file)}}" alt="image" height="300" width="300">
            </div>
            <a href="{{route('home')}}"><button class="btn btn-success" type="submit">Submit</button></a>
        </form>
    </div>
</body>
</html>