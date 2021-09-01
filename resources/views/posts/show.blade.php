@extends('layouts.app')

@section('content')


      <div class="card mt-2  ml-5" style="width: 50vh">
        <div class="card-header">
          Post Creator Info
        </div>
        <div class="card-body " style="width: 50vh">
            <h5 class="card-title">ID : {{ $blog->id}}</h5>
          <h5 class="card-title">Name : {{ $blog->title}}</h5>
          <h5 class="card-title">description : {{ $blog->description}}</h5>
         <!-- <h5 class="card-title">Slug : {{ $blog->slug}}</h5> -->


          <p class="card-text">WE are so happy with you (:</p>
        </div>
      </div>
      <div class="pull-right">
        <a class="btn btn-dark mt-5 ml-5" href="{{ route('posts.index') }}"> Back</a>
    </div>
@endsection


@section('pageName') This Is The New Page Name @endsection
