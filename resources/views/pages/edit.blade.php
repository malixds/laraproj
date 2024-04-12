<x-app-layout>

    <div class="container">
        <form action="{{ route('post.edit', ['id' => $post->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Text</label>
                <input name="text" type="text" class="form-control" id="" value="{{ $post->text }}">
            </div>
            <button type="submit" class="btn btn-primary">Edit post</button>
        </form>
    </div>
</x-app-layout>
