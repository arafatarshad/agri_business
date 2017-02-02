<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agri Biznes.com</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset ('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/css/modern-business.css') }}" rel="stylesheet"> 
    <link href="{{ asset ('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            body{
                /*color: #ffffff;*/
            }
            .addvertisement_image{
                height: 500px ;
                /*width: 500px ;*/
                max-width: 600px;
            }
        </style>
    </head>

    <body class="style-13">

       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{URL::to('/')}}/"><b style="color: #00ff3f">Agri</b><span style="color: #FF9800">Biznes</span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{URL::to('/')}}/about">About</a>
                    </li> 
                    <li>
                        <a href="{{URL::to('/')}}/contact">Contact</a>
                    </li>
                    <li>
                        <a href="{{URL::to('/')}}/advertisements">Advertisements</a>
                    </li>
                    <li>
                        <a href="{{URL::to('/')}}/auth/login" class=""><button class="btn btn-xs btn-primary" style="padding: 1px 25px">Log In</button></a>
                    </li>                        
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div> 
    </nav>


    @if (isset($errors) && count($errors) > 0)
    <ul style="color: red">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach </ul>
      @endif
      <!-- Page Content -->
      <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="" >
                    <small><a style="color: #FF9800;" href="{{URL::to('/')}}/post/{{$data[0]->id}}">{{$data[0]->name}}</a>
                    </small>
                </h1> 
            </div>
        </div> 
        <div class="row"> 
            <div class="col-lg-8"> 
                <p style="color: #ffffff"><i class="fa fa-clock-o"></i> Posted on {{$data[0]->post_date}} at {{$data[0]->post_time}} </p>
                <hr> 
                <img class="img-responsive addvertisement_image"  src="{{asset('uploads/'.$data[0]->photo)}}" alt="">

                <!-- <hr> -->

                <!-- Post Content -->
                <p class="lead" style="color: #fff;">
                    @if(isset($data[0]->description) && !empty($data[0]->description))
                    {{$data[0]->description}}
                    @endif
                </p> 
                <hr> 
                <div class="well" >
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="{{URL::to('/')}}/comment" method="POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="post_id" value="{{$data[0]->id}}">
                        <div class="form-group"> 
                            <input class="form-control" rows="3" required="" name="commenter_name" placeholder="Your Name">
                        </div>
                        <div class="form-group"> 
                            <textarea class="form-control" name="comment" placeholder="Comment" rows="3" required=""></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <div class="media"> 
                    <div class="media-body">
                        @if(isset($comments) && !empty($comments))
                        @foreach($comments as $comment)
                        <h4 class="media-heading">{{$comment->name}}
                            <small>{{$comment->post_date}} at {{$comment->post_time}}</small>
                        </h4>
                        <p style="padding-left: 50px;"> {{$comment->comment}}</p>
                        @endforeach
                        @endif
                    </div>
                </div> 
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well" style="padding-bottom: 50px">
                    <h3><span class="pull-left">Price</span><span class="pull-right">
                        @if($data[0]->price==-1)
                        Not Mentioned
                        @else
                        {{$data[0]->price}} BDT
                        @endif
                    </span></h3>  
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Post Details</h4>
                    <div class="row">
                        <div class="col-lg-12"> 

                            <h4 class="col-lg-12"><span class="pull-left">Category : </span><span class="pull-right">{{$data[0]->category}}</span></h4>

                            <h4 class="col-lg-12"><span class="pull-left">Quantity : </span><span class="pull-right">{{$data[0]->quantity}} {{$data[0]->unit}}</span></h4>
                            <h4 class="col-lg-12"><span class="pull-left">Location : </span><span class="pull-right">{{$data[0]->thana_name}}</span></h4>
                        </div> 
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Poster Details</h4>
                    <div class="row">
                        <div class="col-lg-12"> 

                            <h4 class="col-lg-12"><span class="pull-left">Name :   </span><span class="">  {{$data[0]->poster_name}}</span></h4>

                            <h4 class="col-lg-12"><span class="pull-left">Phone No :    </span><span class="">  {{$data[0]->poster_phone}}</span></h4> 
                            <h4 class="col-lg-12"><span class="pull-left">Address:    </span><span class="">  {{$data[0]->poster_address}}</span></h4> 

                        </div> 
                    </div>
                    <!-- /.row -->
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                <p style="color: #fff;" class="text-center">Copyright &copy; Agribiznes.com</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <script src="{{ asset ('/assets/js/jquery.js') }}"></script>
    <script src="{{ asset ('/assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
