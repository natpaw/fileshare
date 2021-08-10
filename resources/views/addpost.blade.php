<x-layout>

	@if (isset($user->name))
		<p>Автор: {{$user->name }}</p>
		<form action="/addpost/submit" method="post" enctype="multipart/form-data">
			@csrf
			Назва:
			<p><textarea rows="1" cols="45" name="title"></textarea></p>
			Короткий опис:
			<p><textarea rows="3" cols="45" name="short"></textarea></p>
			Повний опис:
			<p><textarea rows="10" cols="45" name="body"></textarea></p>
			Картинка:
			<input type="file" name="image" id="image">
			Файл:
			<input type="file" name="file" id="file">
			<input type="submit" value="Відправити" name="submit">
		</form>
		
	@else 
		<x-login-form />
	@endif
</x-layout>
