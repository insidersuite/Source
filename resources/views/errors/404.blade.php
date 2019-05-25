<head>
	<link rel="stylesheet" type="text/css" href="{{ url('css/customize/profile.css') }}">
</head>
<style>
    body {
        background-color: #545afb;
    }
    .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        background-color : white;
        height : 95%;
        width : 98%;
        margin-left : 1%;
        margin-top : 2%;
        border-radius : 20px;
    }

    /* On mouse-over, add a deeper shadow */
    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    /* Add some padding inside the card container */
    .container {
        padding: 2px 16px;
    }
    .col{
        display : grid;
        grid-template-columns: 1fr 3fr;
    }
    .item1{
        display : grid;
        grid-column : 0/1;
        margin-left : 20%;
        margin-top : 10%;
    }
    .item1{
        display : grid;
        grid-column : 1/2;
    }
</style>
<body>
    <div class="card col">
        <div class="item1">
            <img src="imgs/blip.jpg">
            <img src="imgs/404_text.jpg">
            <form action="404">
                <div class="col-md-12">
                    <input type="submit" id="login_update_button" style="background-color: #545afb;" class="btn btn-default pull-left" value="Now Refresh">
                </div>
            </form>
        </div>
        <div class="item2">
            <img src="imgs/404.jpg" style="width:70%;height:70%;margin-left:25%;margin-top:5%">
            <img src="imgs/text.jpg" style="margin-left:15%;margin-top:7.5%">
        </div>
    </div>
    
</body>