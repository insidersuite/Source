@extends('layout404')
@section('title','404 Page Not Found')
@section('head')
@parent
<style>
	body{
		margin: 0;
		padding: 0;
	}

	.button{
		background-color: #fc3769;
		border: none;
		color: white;
		padding: 15px 80px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		border-radius: 30px;
	} 

	#berita{
		width: 30%;
		float: left;
		padding-left: 10%;
	}

	#gambar{
			width: 55%;
		float: right;
	}

	#gambar img{
		width: 70%;
	}

	.aa{
		margin-top: 200px;
	}
</style>
<link rel="stylesheet" type="text/css" href="{{ url('css/customize/home.css') }}">
@endsection
@section('content')
	<div class="aa" id="berita">
		<font size="7" style="font-family: sans-serif;"><i><b>Oops</b></i></font><br>
		<font size="5" style="font-family: sans-serif;"><i>it seems that someone<br> has run our way</i></font>
		<br><br>
		<form action="/">
			<input type="submit" class="button" value="Now Refresh">
		</form>
	</div>
	<div class="aa" id="gambar">
		<center>
			<img src='images/6cc5c746022423.584595b7d9050.jpg'/>
		</center>
	</div>
@endsection