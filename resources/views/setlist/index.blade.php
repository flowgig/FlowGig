<ul>
@foreach($setlists as $setlist)
    <li><a href="{{ route('setlist.show', $setlist) }}">show</a> <a href="{{ route('setlist.edit', $setlist) }}">edit</a> {{ $setlist->title }} </li>
@endforeach
</ul>