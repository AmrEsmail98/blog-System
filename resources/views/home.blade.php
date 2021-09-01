@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CRUD OPERATION') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1> {{ __('Welcome Amr Esmail page ') }} </h1>
                </div>

            </div>
            <div class="pull-right">
                <a class="btn btn-dark mt-5" href="{{ route('posts.index') }}"> Start (:</a>
            </div>
        </div>
    </div>
</div>
@endsection
