<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agri Biznes</title>

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
                /*background: #eeeeee;*/
                /*background: rgb(96,99,114);*/
                color: #fff; 
            }
            .temparature_text_large{
                font-size: 180px;
            }
            table{
                background: #323135; 
            }
            .about_us_div{ 
                text-align: justify;
                text-justify: inter-word; 
            }
            @media(max-width:767px) {
                .img-portfolio {
                    margin-bottom: 15px;
                }

                header.carousel .carousel {
                    height: 70%;
                }
            }   
            .active_link{
                /*color: #00ff3f;*/
                color: #green;
            }                 
        </style>
    </head>

    <body class="style-13">

        <!-- Navigation -->
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
                    <a class="navbar-brand" href="{{URL::to('/')}}/"><b style="color: #00ff3f">Agri</b><span style="color: #FF9800">Biznes</span></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li >
                            <a class="active_link" href="{{URL::to('/')}}/about">About</a>
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
            <!-- /.container -->
        </nav>
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img style="width: inherit;" src="{{ asset ('/assets/img/agri_cover_1.jpg') }}" alt="">
                </div>
            </div>        
            <!-- /.row -->

            <!-- Intro Content -->
            <div class="row"> 
                <div class="col-md-12 about_us_div" style="font-size: 20px;text-align:justify;text-justify: inter-word;">
                    <h2>About Agri Biznes</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>
                </div>
            </div>
            <!-- /.row -->

            <!-- Team Members -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Our Team</h2>
                </div>
                <div class="col-md-4 text-center">
                    <div class="thumbnail">
                        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                        <div class="caption">
                            <h3>John Smith<br>
                                <small>Job Title</small>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- /.row -->

            <!-- Our Customers -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Our Customers</h2>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
                </div>
            </div>
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p class="text-center">Copyright &copy; Agribiznes.com</p>
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
