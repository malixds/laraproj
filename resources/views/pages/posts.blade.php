<x-app-layout>

    <div class="container">
        @foreach ($posts as $item)
            <div class="cover border-1 p-3 rounded-xl border-gray-400 my-3">
                <a href="{{ route('post.edit-show', ['id' => $item->id])}}" class="mb-3">{{ $item->title }}</a>
                <p class="mb-3">{{ $item->text }}</p>
                <p class="mb-3">User: {{ $item->user->name }}</p>
                @if ($item->user_id === auth()->id() || $user_role == 'Admin')
                <form action="{{ route('post.delete', ['id' => $item->id])}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete post</button>
                </form>
                @endif
            </div>
        @endforeach


        <form action="{{ url('/posts') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Text</label>
                <input name="text" type="text" class="form-control" id="">
            </div>
            <button type="submit" class="btn btn-primary">Create post</button>
        </form>
    </div>
</x-app-layout>
