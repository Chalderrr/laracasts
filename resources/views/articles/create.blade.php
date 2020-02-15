@extends ('layout')

@section('content')

<div id="wrapper">
	<div id="page" class="container">
        
        <h1 class="title">New Article</h1>

		<form action="/articles" method="POST">

			@csrf
			
			<div class="field">
				<label for="title" class="label">Title</label>

				<div class="control">
					<input type="text" name="title" id="title" class="input @error('title') is-danger @enderror">

					@error('title')
						<p class="help is-danger"> {{ $errors->first('title') }}</p>
					@enderror
				</div>
			</div>

			<div class="field">
				<label for="excerpt" class="label">Excerpt</label>

				<div class="control">
					<textarea type="textarea" name="excerpt" id="excerpt" class="textarea @error('excerpt') is-danger @enderror"></textarea>
					@error('excerpt')
						<p class="help is-danger"> {{ $errors->first('excerpt') }}</p>
					@enderror
				</div>
			</div>

			<div class="field">
				<label for="body" class="label">Body</label>

				<div class="control">
					<textarea name="body" id="body" class="textarea @error('body') is-danger @enderror"></textarea>
				</div>
				@error('body')
					<p class="help is-danger"> {{ $errors->first('body') }}</p>
				@enderror
			</div>

			<div class="field">

				<div class="control">
					<button type="submit" class="button is-link">Submit</button>
				</div>

			</div>



		</form>

	</div>
</div>

@endsection