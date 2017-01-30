<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS --> 


    <link href="{{ asset ('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/css/modern-business.css') }}" rel="stylesheet"> 
    <link href="{{ asset ('assets/css/shop-homepage.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .list-group{
                max-height: 200px;
                overflow: auto;
            } 
            body{
                /*background: #eeeeee;*/
                background: rgb(96,99,114);
                color: #fff;
            } 
        </style>

    </head>

    <body>

        <!-- Navigation -->
<!--     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
         </div>
     </nav> -->

        <!-- Navigation -->
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
                    <a class="navbar-brand" href="{{URL::to('/')}}/">Agri Business</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{URL::to('/')}}/about">About</a>
                        </li>
<!--                         <li>
                            <a href="services.html">Services</a>
                        </li> -->
                        <li>
                            <a href="{{URL::to('/')}}/contact">Contact</a>
                        </li>
                        <li>
                        <a href="{{URL::to('/')}}/advertisements">Advertisements</a>
                        </li>
                        <li>
                        <a href="{{URL::to('/')}}/auth/login">Log In</a>
                        </li>                        
<!--                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="portfolio-1-col.html">1 Column Portfolio</a>
                                </li>
                                <li>
                                    <a href="portfolio-2-col.html">2 Column Portfolio</a>
                                </li>
                                <li>
                                    <a href="portfolio-3-col.html">3 Column Portfolio</a>
                                </li>
                                <li>
                                    <a href="portfolio-4-col.html">4 Column Portfolio</a>
                                </li>
                                <li>
                                    <a href="portfolio-item.html">Single Portfolio Item</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="blog-home-1.html">Blog Home 1</a>
                                </li>
                                <li>
                                    <a href="blog-home-2.html">Blog Home 2</a>
                                </li>
                                <li>
                                    <a href="blog-post.html">Blog Post</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Pages <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="full-width.html">Full Width Page</a>
                                </li>
                                <li>
                                    <a href="sidebar.html">Sidebar Page</a>
                                </li>
                                <li>
                                    <a href="faq.html">FAQ</a>
                                </li>
                                <li>
                                    <a href="404.html">404</a>
                                </li>
                                <li>
                                    <a href="pricing.html">Pricing Table</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    <!-- Page Content -->
    <div class="container">
        <input type="hidden" name="default_category_id" id="default_category_id" value="{{$default_category}}">
        <input type="hidden" name="default_thana_id" id="default_thana_id" value="{{$default_thana}}">
        <div class="row">

            <div class="col-md-3" style="border-right: 2px solid #eeeeee">
                <p class="lead">Shop Name</p>
                <form action="{{URL::to('/')}}/filter_ad" method="POST">
                <!-- <form action="{{URL::to('/')}}/advertisements" method="POST"> -->
                    <h4>Search By Category</h4>
                    <div class="list-group">
                        @foreach($all_categories as $category)
                        <div class="radio "> 
                            <label><input  type="radio" name="category_id" value="{{$category->id}}">{{$category->name}}</label>  
                        </div> 
                        @endforeach
                 <!--  <a href="#" class="list-group-item">Category 1</a>
                  <a href="#" class="list-group-item">Category 2</a>
                  <a href="#" class="list-group-item">Category 3</a> -->
              </div>
              <h4>Search By Area</h4>
              <div class="list-group">

                @foreach($all_thana as $thana)
                <div class="radio "> 
                    <label><input  type="radio" name="thana_id" value="{{$thana->id}}">{{$thana->name}}</label>  
                </div> 
                @endforeach
               <!--  <a href="#" class="list-group-item">Category 1</a>
                <a href="#" class="list-group-item">Category 2</a>
                <a href="#" class="list-group-item">Category 3</a> -->
            </div>  

            <input class="btn btn-info" type="submit" name="submit" value="Filter">
        </form>                          
    </div>

    <div class="col-md-9">
        <div class="item active" style="margin-bottom: 50px;">
         <img class="slide-image" src="{{ asset ('/assets/img/agri_cover_1.jpg') }}"  alt=""> 
     </div>
<!-- 
        <div class="row carousel-holder">

            <div class="col-md-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="slide-image" src="{{ asset ('/assets/img/agri_cover_1.jpg') }}" height="300px" alt=""> 
                        </div>
                        <div class="item">
                            <img class="slide-image" src="{{ asset ('/assets/img/agri_cover_2.jpg') }}" height="300px" alt=""> 
                        </div>
                        <div class="item">
                            <img class="slide-image" src="{{ asset ('/assets/img/agri_cover_3.jpg') }}" height="300px" alt=""> 
                        </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

        </div> -->

        <div class="row">

<!--             <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/320x150" alt="">
                    <div class="caption">
                        <h4 class="pull-right">$24.99</h4>
                        <h4><a href="#">First Product</a>
                        </h4>
                        <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">15 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/320x150" alt="">
                    <div class="caption">
                        <h4 class="pull-right">$64.99</h4>
                        <h4><a href="#">Second Product</a>
                        </h4>
                        <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">12 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/320x150" alt="">
                    <div class="caption">
                        <h4 class="pull-right">$74.99</h4>
                        <h4><a href="#">Third Product</a>
                        </h4>
                        <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">31 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/320x150" alt="">
                    <div class="caption">
                        <h4 class="pull-right">$84.99</h4>
                        <h4><a href="#">Fourth Product</a>
                        </h4>
                        <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">6 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/320x150" alt="">
                    <div class="caption">
                        <h4 class="pull-right">$94.99</h4>
                        <h4><a href="#">Fifth Product</a>
                        </h4>
                        <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">18 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-lg-4 col-md-4">
                <h4><a href="#">Like this template?</a>
                </h4>
                <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
            </div>
        -->

        <!-- <div class="container"> -->
        @foreach ($all_posts as $post) 

        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail" >
                @if(isset($post->photo) && !is_null($post->photo))
                
                <img src="{{ asset ('uploads') }}/{{$post->photo}}" style="width: : 250px"  alt="">
                @else
                <img src="http://placehold.it/320x150" alt="">

                @endif
                <div class="caption">
                    @if(isset($post->price) && $post->price==-1)

                    <h4 class="pull-right"><span class="price1">Price:</span> N/A</h4> 
                    @else
                    <h4 class="pull-right"><span class="price1">Price:</span> {{$post->price}} BDT</h4> 
                    @endif
                    @if(isset($post->name) && !empty($post->name))

                    <h4><a href="{{URL::to('/')}}/post/{{$post->id}}">{{$post->name}}</a>
                        @endif

                    </h4>
                    <p>
                        @if(isset($post->description) && !empty($post->description))
                        <?php echo implode(' ', array_slice(explode(' ', $post->description), 0, 10));?>
                        @else
                        No description Added . .        
                        @endif
                    </p>
                </div>
<!--                 <div class="ratings">
                    <p class="pull-right">15 reviews</p>
                    <p>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                    </p>
                </div> -->
            </div>
        </div>  


        @endforeach
        <!-- </div> --> 
    </div>
    <div class="row">
        {!! $all_posts->render() !!}
    </div>
</div>

</div>

</div>
<!-- /.container -->

<div class="container">

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="{{ asset ('/assets/js/jquery.js') }}"></script>
<script src="{{ asset ('/assets/js/bootstrap.min.js') }}"></script>


</body>

</html>
