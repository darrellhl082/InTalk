@extends('layouts.main')
@section('main')
<div class="container-fluid">
    <div class="row">
        @include('layouts.components.sidebar')
        <div class="col-md-6 p-4">
            <div class="explore py-3">
                <h4 class="ms-3 mb-4">Explore your friends</h4>
                <ul class="list-group">
                    @foreach ($users2 as $user)
                    @php
                    if (Auth::check()) {
                        if($user->id == auth()->user()->id){
                            continue;
                        }
                        # code...
                    }
                    @endphp
                    <li class="list-group-item bg-transparent text-white pt-3 mb-3 px-3" aria-current="true" style="border:1px solid #2f3336;">
                      <a href="/profile/{{ $user->username }}" class="text-decoration-none d-flex flex-row align-items-center">
                            <div class="avatar border-none d-inline-block "style="background-image: url('/img/{{ $user->avatar }}'); width:50px; height:50px; border:1px solid #c7c3c3">
                            </div>
                            <h5 class="card-title text-light mx-2 name d-inline-block">{{ $user->name }}</h5>
                            <h5 class="card-title username-talk d-inline-block">{{ '@'.$user->username }}<h5>
                          
                           
                         </a>
                       
                    </li>
                    @endforeach
                </ul>  
            </div>
        </div>
      @include('layouts.components.right_bar')
  </div>
@endsection

