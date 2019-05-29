
<!DOCTYPE html>
<html>
	<head>
		@include('includes.head')
		<title>404 Page Not Found</title>
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
				padding-left: 15%;
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
	</head>
	<body>
		@include('includes.header')
		<div class="aa" id="berita">
			<img src='images/sefwe.jpg'/>
			<br><br>
			<form action="/404">
				<input type="submit" class="button" value="Now Refresh">
			</form>
		</div>
		<div class="aa" id="gambar">
			<center>
			<img src='images/6cc5c746022423.584595b7d9050.jpg'/>
			</center>
		</div>
	</body>
</html>