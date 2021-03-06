<x-layout>
<p>
	@if (isset($user->name))
		Привіт, <a href ="/dashboard">{{$user->name }}</a>
		<aside id="right"><form action="/logout" method = "post" > 
		@csrf
		<input type="submit" value="Вихід"></form ></aside>
	@else 
		<x-login-form />
	@endif
	<form action="{{ route('search') }}" method="GET">
    <input type="text" name="search" required/>
    <button type="submit">Search</button>
	</form>
	@if (isset($posts))
	@foreach ($posts as $post)
	
		<article>
			<h1>
				<a href = "/posts/{{ $post->slug }}">
					{!!$post->title!!}
				</a>
			</h1>
			
			<p>
				Автор: <a href = "/authors/{{ $post->author->name }}">{{ $post->author->name }}</a>
			</p>
			
			<div>
				{{ $post->short }}
			</div>
			<hr>
		</article>
		</p>		
	@endforeach
	{{$posts->links()}}
	@endif
</x-layout>