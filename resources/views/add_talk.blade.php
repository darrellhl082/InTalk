@extends('layouts.main')
@section('main')
<div class="container-fluid">
    <div class="row add">
        @include('layouts.components.sidebar')
        <div class="col-md-6 p-4 main-add">
            <h1>Let's Talk Everything</h1>
            <div class="add_talk d-flex flex-column justify-content-center w-80 mt-3">
                <form method="POST" action="/talks" enctype="multipart/form-data">
                    @csrf
                    {{-- @trix(\App\Post::class, 'content') --}}
                    <input id="x" type="hidden" name="body">
                    <trix-editor input="x"></trix-editor>
                    <div class="my-3">
                        <label for="formFile" class="form-label" >Only Image</label>
                        <input class="form-control image-input @error('image') is_invalid @enderror" type="file" id="formFile" name="image" accept="image/*" >
                        @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                           {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                      </div>
                    <button type="submit" name="submit" class="btn btn-outline-light btn-transparent mt-1">Talk</button>
                </form>
              
            </div>
        </div>
      @include('layouts.components.right_bar')
  </div>
@endsection