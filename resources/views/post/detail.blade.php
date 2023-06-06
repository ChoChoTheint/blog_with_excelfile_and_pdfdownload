<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
   <div class="container text-center">
    <h1>Detail Post</h1>
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
                <img src="{{asset('storage/file/'.$posts->file)}}" alt="image" height="300" width="300">
            </div>
         
            <div>
                <a href="{{ URL::previous() }}"><button class="btn btn-danger">Back</button></a>
                <a href="{{ URL::to('download-pdf') }}"><button class="btn btn-success">Download PDF</button></a>
                <a href="{{route('export')}}"><button class="btn btn-primary">Excel Download</button></a>
            </div>
    </div>
</body>
</html>
