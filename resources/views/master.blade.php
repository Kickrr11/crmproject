<!doctype html>
<head>
    <!-- Latest compiled and minified jquery -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Optional theme -->
	<link rel="stylesheet" href="<?php echo asset('css/index.css')?>" type="text/css"> 
	<link rel="stylesheet" href="<?php echo url('css/login.css')?>" type="text/css"> 
	<link rel="stylesheet" href="<?php echo asset('bootstrap-wysiwyg-master/index.css')?>" type="text/css">
	<script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"> </script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
 
<body>
  @include('navigation')
<div class="container">
   
 
    
	
    @yield('content')
 
    @include('footer')
</div>


 
</body>
</html>