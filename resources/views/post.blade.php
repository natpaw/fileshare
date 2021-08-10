<x-layout>
		<article>
			<h1>
				{!!$post->title!!}
			</h1>
			
			<p>
				Автор: <a href = "/authors/{{ $post->author->name }}">{{ $post->author->name }}</a> {{ $post->created_at }}
			</p>
			@if (isset($post->image))
				<img src="/storage/{{ $post->image }}" height=200>
			@endif
			<div>
				{{ $post->body }}
			</div>
			@if (isset($post->file))
				<p>
					<a href = "{{$post->slug}}/download">Завантажити</a>
				</p>
			@endif	
		</article>
	
		<p>
			Коментарі:
		</p>
		
		<hr>
		
		@foreach ($post->comments as $comment)
	
		<article>
			<p>
			@if (isset($comment->author->avatar))
				<aside id="left"><img src=/storage/{{ $comment->author->avatar }} width=50 height=50/></aside>
			@endif
				{{ $comment->author->name }} {{ $comment->created_at }}
			</p>
			
			<div>
				{{ $comment->body }}
			</div>
			<hr>
		</article>
		
		@endforeach
		<form method = "post" action="/comment"> 
		@csrf
		<p>Ваш коментар:</p>
		<p><textarea rows="10" cols="45" name="comment"></textarea></p>
		<input type="hidden" name="post" value={{ $post->id }}>
		<input type="submit" value="Відправити"></form >


</x-layout>