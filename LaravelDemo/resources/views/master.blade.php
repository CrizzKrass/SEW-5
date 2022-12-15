<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
	<div id="header">
		<img src="{{ assets('logo.png') }}">
		<h1>Invoice</h1>
	</div>
    <div id="content">
        @yield('content')
    </div>
	<div id="footer">
		<a href="#">impressum</a>
		{{ date('d.m.Y'); }}	
	</div>
</body>
</html>
