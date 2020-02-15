@extends ('layout')

@section('content')

<div id="wrapper">
	<div id="page" class="container">
        
        <div class="title">
            <h2>Update Article</h2>
        </div>

        <form action="/articles/{{ $article->id }}" method="POST">

            @csrf
            @method('PUT')
			
			<div class="field">
            <label for="title" class="label" value="">Title</label>

				<div class="control">
					<input type="text" name="title" id="title" class="input" value="{{ $article->title }}">
				</div>
			</div>

			<div class="field">
				<label for="excerpt" class="label">Excerpt</label>

				<div class="control">
					<textarea type="textarea" name="excerpt" id="excerpt" class="textarea">{{ $article->excerpt }}</textarea>
				</div>
			</div>

			<div class="field">
				<label for="body" class="label">Body</label>

				<div class="control">
					<textarea name="body" id="body" class="textarea">{{ $article->body }}</textarea>
				</div>
			</div>

			<div class="field">

				<div class="control">
					<button type="submit" class="button is-link">Update</button>
				</div>

			</div>



		</form>

	</div>
</div>

@endsection