<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
       <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">       

    </head>
    <body>
@include('flash::message')
	   <form method="post" action="/">
                {{ csrf_field() }}
                <p><b>Введите сайт:</b>
                   <input type="text" name="domain[name]" size="40" > 
                   <input type="submit" value="Отправить">
               </p>
	   </form>

 

	   <a href="/domains">Все сайты</a>

           @if ($errors->any())
		    <div class="alert alert-danger">
			<ul>
			    @foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			    @endforeach
			</ul>
		    </div>
	    @endif


    </body>
</html>
