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
</x-layout>