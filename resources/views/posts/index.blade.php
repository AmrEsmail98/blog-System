@extends('layouts.app')

@section('pageName') Index @endsection

@section('content')
        <div class="text-center ">
            <a href="{{ route('posts.create') }}" class="mt-4 btn btn-dark">Create Post</a>
        </div>
        <table class="table mt-4 ml-5" style="width: 180vh">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">slug</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($postCollectionView as $post)

                <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->user->name}}</td>
                  <td>{{$post->slug}}</td>
                  <td>{{$post->created_at}}</td>
                  <td>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-info">View</a>
                        <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
@endsection
