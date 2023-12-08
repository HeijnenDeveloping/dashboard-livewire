<div class="flex flex-col">
@foreach($users as $user)
    <div class="card">
        <div class="header">{{$user->name}}</div>
        <div class="content">
            <ul>
                <li>{{$user->fname}} {{$user->lname}} </li>
            </ul>
        </div>
    </div>


@endforeach
</div>
