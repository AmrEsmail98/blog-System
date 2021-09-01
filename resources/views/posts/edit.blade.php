@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('posts.update',$post->id)}} " class="mt-5">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label style="margin-left: 20vh" for="exampleInputEmail1">Title</label>
      <input  style="margin-left: 20vh;;width: 90vh" value={{$post->title}} name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
      <label style="margin-left: 20vh" for="exampleInputPassword1">Description</label>
      <textarea  style="margin-left: 20vh;;width: 90vh" name="description" class="form-control">{{$post->description}}</textarea>

    </div>

    <div class="form-group">
        <label style="margin-left: 20vh" for="exampleInputPassword1">Post Creator</label>
        <select style="margin-left: 20vh;;width: 90vh" name="user_id" class="form-control">
            @foreach ( $users as $user)
            <option value="{{$user->id}}" >{{$user->name}}</option>
          @endforeach
        </select>
      </div>

    <button  style="margin-left: 50vh"type="submit" class="btn btn-dark">Updata</button>
  </form>
@endsection
