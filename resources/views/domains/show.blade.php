<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
	 <p>DOMAIN {{$domain}} </p>
         {{var_dump($domain)}}
         <?php $data = (json_decode($domain, true)) ?>
         {{var_dump($data[0])}}
         
	 
          
       
           	     
    </body>
</html>
