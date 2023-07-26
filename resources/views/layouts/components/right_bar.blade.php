<div class="col-md-4 p-4 right-bar">
    <div class="content-right py-3">
        <h4 class="ms-3">Suggested For You</h4>
        <ul class="list-group">
            @foreach ($users as $user)
            <li class="list-group-item  text-white pt-3 px-3" aria-current="true" style="border:none">
              <a href="/profile/{{ $user->username }}" class="text-decoration-none d-md-flex flex-row align-items-center">
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