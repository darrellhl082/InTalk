@extends('layouts.main')
@section('main')
<div class="container-fluid">
    <div class="row">
        @include('layouts.components.sidebar')
        <div class="col-md-6 p-4 ">
        
            <main class="form-login text-start">
                <form action="/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class=" mt-1 mb-3">
                    {{-- <img class="icon" src="/rsc/icon/headphone.png" alt=""> --}}
                    <h1 class="d-inline-block mb-2 " style="">Edit Profile</h1>
                  </div>
                  @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                       {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                 
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" required class="form-control @error('name') is_invalid @enderror" id="name" name="name" value="{{ $user->name }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                   @enderror
                  </div>
                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" required class="form-control @error('username') is_invalid @enderror" id="username" name="username" value="{{ $user->username }}">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <span class="d-block mb-1" style="font-size:12px; margin-top:-10px">Max: 1000 Characters</span>
                    <textarea maxlength="1000" name="bio" style="min-height: 200px" id="bio" cols="30" rows="10" class="form-control @error('bio') is_invalid @enderror" id="bio" name="bio" value="{{ $user->bio }}" >{{  $user->bio  }} </textarea>
                    @error('bio')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="formFile" class="form-label" >Profile Picture</label>
                    <input class="form-control @error('avatar') is_invalid @enderror" type="file" id="formFile" name="avatar" accept="image/*">
                    @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                       {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                  </div>
                 
                  <button type="submit" class="btn btn-submit mt-3 w-100">Update</button>
           
                </form>
              </main>
           
        </div>
      @include('layouts.components.right_bar')
  </div>
@endsection
