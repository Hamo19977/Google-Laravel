<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
@include('errors/forms')

    <form method="POST"  enctype="multipart/form-data" >
        @csrf

        <div class="form-group">
            <label for="Title"> Title </label>
            <input type="text" name="title" placeholder="Title" id="Title" class="form-control"></input>
            @error('Title')
            <span style="color:red;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description"> Description</label>
            <input type="text" name="description" placeholder="Write description" id="description" class="form-control"></input>
            @error('description')
            <span style="color:red;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="text"> Text </label>
            <input type="text" name="text" placeholder=" Write text" id="text" class="form-control"></input>
            @error('text')
            <span style="color:red;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>



        <button type="submit" class="btn btn-success">Create Article</button>
    </form>

</div>

</body>
</html>
