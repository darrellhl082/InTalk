@php
    $replies = $replies->where('talk_id', $talk->id);
  
@endphp
<div class="collapse w-100" id="Reply{{ $talk->id }}">
    <form action="/reply" method="POST">
        @csrf
        <div class="row p-3">
            <div class="col-9 col-md-10">
              <input type="text" class="form-control reply-input" placeholder="Reply Here" name="body">
              <input type="hidden" name="talk_id" value="{{ $talk->id }}">
           
            </div>
           
            <button type="submit" class="btn btn-outline-light col-3 col-md-2">Send</button>
          </div>
      </form>
    <div class="reply  card-body">
        @foreach ($replies as $reply)
            <div class="reply-card ">
            <a href="/profile/{{ $reply->user->username }}" class="text-light text-decoration-none mb-1 d-flex flex-row align-items-center">
                <div class="avatar border-none me-2 d-inline-block "style="background-image: url('/img/{{ $reply->user->avatar }}'); width:30px; height:30px; border:1px solid #c7c3c3">
                </div>
                {{$reply->user->username }}
            </a>
            <p>{{ $reply->body }}</p>
            </div>     
        @endforeach
      </div>
  </div>