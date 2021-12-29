
@extends("layouts.main")

@section("title", "View Article")


@section('header')
<div class="container">
    <header>
        <nav id="navbar-example2" class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" style="color:aqua" href="">View Article</a>
            <ul class="nav nav-pills">

                <li class="nav-item dropdown " style="display:flex;">

                    <a class="nav-link dropdown-toggle active" style="margin-left: 20px;" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                    <div class="dropdown-menu">
                        <a style="color:blue" class="dropdown-item" href="/dashboard">All Articles</a>

                    </div>
                </li>
            </ul>
        </nav>
    </header>
</div>
@endsection
@section("content")
    <div class="container">
        <div class="card " style="width: 69.5rem;">
            <div class="card-body">
                @foreach ($article->images as $image)

                <img class="card-img-top"  alt="Image" style="height: 150px; width: 150px; display: block;" src="{{ asset('storage/images/articles/'.$image->image) }}" >
                @endforeach
              <h5 class="card-title">Title: {{ $article->title }}</h5>
              <p class="card-text">Description: {{ $article->description }}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Text: {{ $article->text }}</li>
            </ul>
            <form method="POST" action="{{  route('admin.article.image', $article->id) }}"  enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="Image"> Add Image</label>
                    <input type="file" name="image"  id="image" class="form-control-file"></input>
                    <button type="submit"> Add Image</button>
                </div>
            </form>
        </div>
@endsection
