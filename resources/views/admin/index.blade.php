
@extends("layouts.main")

@section("title", "Articles")

@section('header')
<div class="container">
    <header>
        <nav id="navbar-example2" class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" style="color:aqua" href="#">Articles</a>
            <ul class="nav nav-pills">
                <li class="nav-item dropdown " style="display:flex;">
                    <a href="{{ route('admin.article.create') }}" class="btn btn-success  ">Create Article</a>
                </li>
            </ul>
        </nav>
    </header>
</div>
@endsection

@section("content")
    <div class="container">
        @include('errors.forms')

        <div class="album py-5 bg-light">
                <div class="row">
                      @foreach($articles as $article)
                        <div class="col-md-4">
                          <div class="card mb-4 box-shadow">

                            <div class="card-body">
                                <p style="color: red" class="card-text"># {{ $article->id}} </p>
                                <p class="card-text">Title: {{ $article->title}}</p>
                                <p class="card-text">Description: {{ $article->description}}</p>
                                <p class="card-text">Text: {{ $article->text}}</p>
                                <div style="display: flex; margin-bottom: 10px">
                                    @foreach ($article->images as $image)
                                        <img class="card-img-top"  alt="Image" style="height: 50px; width: 50px; display: block;" src="{{ asset('storage/images/articles/'.$image->image) }}" >
                                    @endforeach
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{  route('admin.article.edit', $article->id) }}" class="btn btn-sm btn-success mr-2">Edit</a>
                                    <a href="{{  route('admin.article.view', $article->id) }}" class="btn btn-sm btn-warning mr-2">View</a>
                                    <form  action="{{  route('admin.article.delete', $article->id) }}" method="POST">
                                        @csrf
                                        <button class="ml-2 btn btn-sm btn-danger"> Delete </button>
                                    </form>
                                </div>
                                <small class="text-muted"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </div>
              </div>
    </div>
    {{ $articles->links() }}
@endsection




