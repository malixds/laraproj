<h1>Music</h1>
@foreach ($musicList as $music)
<p> | {{$music->user_id->name}}</p>
@endforeach
