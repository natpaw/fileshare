<x-layout>

	@if (isset($user->name))
		<p>Ім'я: {{$user->name }}</p>
		<p>E-mail: {{$user->email }}</p>
		<p> <img src={{$avatar }} width=100 height=100></p>
		<p> <a href = "/addpost">Створити пост</a></p>
		<form action="/dashboard/upload" method="post" enctype="multipart/form-data">
			@csrf
			Виберіть аватар:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" value="Відправити" name="submit">
		</form>
		<aside id="right"><form action="/logout" method = "post" > 
		@csrf
		<input type="submit" value="Вихід"></form ></aside>
		
	@else 
		<x-login-form />
	@endif
</x-layout>
