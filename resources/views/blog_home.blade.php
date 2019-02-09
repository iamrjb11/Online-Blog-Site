<?php
//take a get url value inside blade template
$r=Request::get('u_id');
//echo $r;
if( $r ){
  Session::put('title',$data[0]->user_name.' | Profile');
 
}
else
  Session::put('title','Home');
include "../resources/views/templates/resourcesFile.php";



?>
<head>

  <style>
    .outlayer{
     
      background-color:white;
      width:57%;
      height:40%;
      padding:20px;
      border-radius:6px;
      box-shadow: 0 0 20px rgba(0,0,0,.15);
    }
    .sts_name{
      font-size:20px;
      
    }
    .sts_img{
      width:45px;
      height:45px;
    }
    
    .sts_like{
      width:20px;
      height:20px;
    }
    .searchTxt{
      width:320%;
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 6px 10px;
      color:black;
    }
    .textarea{
      margin: 0px opx 0px 0px; 
      height: 150px; 
      width: 57%;
      border-radius:5px;
      padding-left:10px;
      padding-top:7px;
      border:1px solid #c5c5c5;
    }
    @media only screen and (max-width: 500px){
      .searchTxt{
        width:100%;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 6px 10px;
        color:black;
      }
      .dropdown {
        padding-left:10%;
      }
      .dropdown-content{
        min-width: 100%;
      }
      .textarea{
        width: 100%;
      }
      .mybtn{
        width:100%;
      }
      .outlayer{
        width:100%;
      }

    }
  </style>
</head>

<body style="background-color:#e9ebee;">
<nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">


<div class="container-fluid">

  <div class="navbar-header"  style="padding-right:600px;">
  <a class="navbar-brand" href="{{Session::get('host_name')}}/blog/home" style="font-size:25px;">My Blogs</a>
    <form class="navbar-form navbar-left" method="post" action="{{ URL::to('/blog/login') }}">
  {{ csrf_field() }}
    <div class="form-group">
    <div class="dropdown">
      <input type="text" onkeyup="search(this.value);" class="searchTxt" id="searchTxt" placeholder="Search" >
     
      <div class="dropdown-content" id="drop_content">
        
      </div>
    </div>
    </div>
  </form>
  </div>
  
  <div>
    <ul class="navbar-nav">
        <li class="nav-item" style="padding-left:20px;">
        <a class="nav-link" href="{{Session::get('host_name')}}/blog/profile?u_id={{Session::get('u_id')}}"><img src="{{ Session::get('u_img') }}" class="img-rounded" style="width:25px;height:25px"> {{Session::get('u_name')}}</a>
        </li>
        <li class="nav-item" style="padding-left:20px;">
        <a class="nav-link" href="{{Session::get('host_name')}}/blog/home">Home</a>
        </li>
        <li class="nav-item" style="padding-left:20px;">
        <a class="nav-link" href="{{Session::get('host_name')}}/blog/logout">Log out</a>
        </li>
    </ul>
  </div>
  
  
</div>

</nav>

<div style="padding-top:0px;padding-left:5%;padding-right:5%">
    <form method="post" action="{{ URL::to('/blog/create_post') }}">
        {{ csrf_field() }}
        <div style="text-align:left;">
        <div style="font-size:25px;font-weight:bold;">Create a post</div>
        </div>
        <div>
        <textarea rows="5" name="status" class="textarea" placeholder="What's on your mind ... ? "></textarea>
        </div>
        <div>
        <input type="submit" name="" value="Share" class="mybtn btn-primary"></div>
    </form>
<br> 
<div id="sts" style="">
@foreach($data as $dt)
<br>
  <div class="outlayer">
    <div>
    <img src="{{$dt->user_img}}" class="sts_img">
    <a class="sts_name" href="#">{{$dt->user_name}}</a><p>Time : <span style="color:#767a82">{{ $dt->time}}</span></p>
      
      <p>{{$dt->status}}</p>
    </div><br>
    <div>
      <a href="#"><img src="/images/11.png" alt="" class="sts_like"> <span style="font-size: 20px;padding-top:30px;">Like</span></a>
    </div>
  </div>
  @endforeach

  
</div>
</div>

</body>
</html> 