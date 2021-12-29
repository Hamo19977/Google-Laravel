




@extends("layouts.main")

@section("title", "Articles")

@section('header')
<div class="container">

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
                                <div style="display: flex">
                                    @foreach ($article->images as $image)
                                    <img class="card-img-top"  alt="Image" style="height: 50px; width: 50px; display: block;" src="{{ asset('storage/images/articles/'.$image->image) }}" >
                                    @endforeach
                                </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </div>
              </div>
    </div>

@endsection




