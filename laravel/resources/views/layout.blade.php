<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>@yield('title')</title>
		<!-- <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" /> -->
		{{-- <link rel="stylesheet" href="css/bootstrap.min.css" /> --}} 

	</head>

	<body>
		<div id="header">
			@yield('header')
		</div>


		<div class="container">
		    <div class="row">
		          <div class="col-sm-3">
		                @yield('leftcontent')
		          </div>
		          <div class="col-sm-9">
		                @yield('rightcontent')
		          </div> 
		    </div>
		</div>
		

		

		<div id="footer" class="container">
			 @yield('footer')
		</div>

    {{-- <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script> --}}
    {{-- <script type="text/javascript" src="js/jquery.min.js"></script> --}}
  
    {{-- <script type="text/javascript" src="js/bootstrap.min.js"></script> --}}
	</body>

</html>




