<?php
header('Access-Control-Allow-Origin: http://180.211.159.171/PublicPortal/MarketDisplayFullScreenBangla.php');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset ('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/css/modern-business.css') }}" rel="stylesheet"> 
    <link href="{{ asset ('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">  
    <style> 
        body{
            /*background: #eeeeee;*/
            background: rgb(96,99,114);
            color: #fff;
        }
        .temparature_text_large{
            font-size: 180px;
        }
        table{
            background: #323135; 
        }
        #myCarousel{
            height: 600px;
        }
        @media(max-width:767px) {
            .img-portfolio {
                margin-bottom: 15px;
            }

            header.carousel .carousel {
                height: 70%;
            }
        }        
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

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
                        <li>
                            <a href="services.html">Services</a>
                        </li>
                        <li>
                            <a href="{{URL::to('/')}}/contact">Contact</a>
                        </li>
                        <li class="dropdown">
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
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Header Carousel -->
        <header id="myCarousel" class="carousel slide" >
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="fill" style="background-image:url('{{ asset ('/assets/img/agri_cover_1.jpg') }}');background-size:cover;background-repeat: no-repeat;"></div>
                    <div class="carousel-caption">
                        <h1>Sell Your Dream</h1>
                    </div>
                </div>
                <div class="item">
                    <div class="fill" style="background-image:url('{{ asset ('/assets/img/agri_cover_2.jpg') }}');background-size:cover;background-repeat: no-repeat;"></div>
                    <div class="carousel-caption">
                        <h1>Save Your Dream</h1>
                    </div>
                </div>
                <div class="item">
                    <div class="fill" style="background-image:url('{{ asset ('/assets/img/agri_cover_3.jpg') }}');background-size:cover;background-repeat: no-repeat;"></div>
                    <div class="carousel-caption">
                        <h1>Build Your Dream</h1>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="icon-next"></span>
            </a>
        </header>

        <!-- Page Content -->
        <div class="container">

            <!-- Marketing Icons Section -->
            <div class="row">
                <div class="col-lg-12 ">
                    <h1 class="page-header text-center">
                        Get The Latest Weather Update
                    </h1> 
                </div>
            </div>
            <div class="row weather-row">   
                <div class="col-md-6">
                    <h1>Dhaka</h1>
                    <h3>Bangladesh</h3> 
                    <h5>Published Date : <?php print_r( $weather_data->query->results->channel->item->pubDate);?></h5>
                    <h3><span>Sunrise : <?php print_r( $weather_data->query->results->channel->astronomy->sunrise);?></span>  -  <span>Sunset : <?php print_r( $weather_data->query->results->channel->astronomy->sunset);?></span></h3>
                    <h3><span >Humidity</span><span style="margin-left: 10px;"><?php print_r( $weather_data->query->results->channel->atmosphere->humidity);?></span></h3>
                    <h3><span class="glyphicon glyphicon-cloud" ></span><span style="margin-left: 10px;"><?php print_r( $weather_data->query->results->channel->item->condition->text);?></span></h3>
                    <h3><span >&uarr; <?php print_r( $weather_data->query->results->channel->item->forecast[0]->high);?>&deg;</span> <span >    &darr; <?php print_r( $weather_data->query->results->channel->item->forecast[0]->low);?>&deg;</span> </h3>
                    <p><span class="temparature_text_large"><?php print_r( $weather_data->query->results->channel->item->condition->temp);?>&deg;</span><span style="font-size: 25px">F</span></p>
                </div>         
                <div class="col-md-6">
                    <div > 
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Day</th>
                            <th>High</th>
                            <th>Low</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php for($i=0;$i<10;$i++):?>
                         <tr>
                             <td><?php print_r( $weather_data->query->results->channel->item->forecast[$i]->date);?></td>
                             <td><?php print_r( $weather_data->query->results->channel->item->forecast[$i]->day);?></td>
                             <td><?php print_r( $weather_data->query->results->channel->item->forecast[$i]->high);?>&deg;</td>
                             <td><?php print_r( $weather_data->query->results->channel->item->forecast[$i]->low);?>&deg;</td>
                             <td><?php print_r( $weather_data->query->results->channel->item->forecast[$i]->text);?></td>
                         </tr>   

                     <?php endfor;?>
                 </tbody>
             </table>
         </div>

     </div>


<!--                 <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-fw fa-check"></i> Bootstrap v3.3.7</h4>
                        </div>
                        <div class="panel-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                            <a href="#" class="btn btn-default">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-fw fa-gift"></i> Free &amp; Open Source</h4>
                        </div>
                        <div class="panel-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                            <a href="#" class="btn btn-default">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-fw fa-compass"></i> Easy to Use</h4>
                        </div>
                        <div class="panel-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                            <a href="#" class="btn btn-default">Learn More</a>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- /.row -->

            <!-- Portfolio Section -->
<!--             <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Portfolio Heading</h2>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="portfolio-item.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="portfolio-item.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="portfolio-item.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="portfolio-item.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="portfolio-item.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="portfolio-item.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                </div>
            </div> -->
            <!-- /.row -->

            <!-- Features Section -->
<!--             <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Modern Business Features</h2>
                </div>
                <div class="col-md-6">
                    <p>The Modern Business template by Start Bootstrap includes:</p>
                    <ul>
                        <li><strong>Bootstrap v3.3.7</strong>
                        </li>
                        <li>jQuery v1.11.1</li>
                        <li>Font Awesome v4.2.0</li>
                        <li>Working PHP contact form with validation</li>
                        <li>Unstyled page elements for easy customization</li>
                        <li>17 HTML pages</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive" src="http://placehold.it/700x450" alt="">
                </div>
            </div> -->
            <!-- /.row -->

            <!-- <hr> -->

            <!-- Call to Action Section -->
<!--             <div class="well">
                <div class="row">
                    <h4>Market Prices</h4>    
                </div>
            </div> -->

            <hr>
            <div class="row">
                <div class="col-lg-12 ">
                    <h1 class="page-header text-center">
                        Get The Latest Market Update
                    </h1> 
                </div>
            </div>
            <div class="row" id="market_price_div">
                <iframe id="theFrame" src="http://180.211.159.171/PublicPortal/MarketDisplayFullScreenBangla.php" style="width:100%;min-height: 500px;overflow: scroll;" frameborder="0">
                </iframe>
            </div>
            <!-- <object type="text/html" class="row" data="http://180.211.159.171/PublicPortal/MarketDisplayFullScreenBangla.php" style="width:100%; height:100%"> -->
            <!-- <p>backup content</p> -->
            <!-- </object> -->

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
        <!-- <script src="{{ asset ('/assets/js/cross-domain-request.js') }}"></script> -->
        <!-- Script to Activate the Carousel -->
        <script>

            $('.carousel').carousel({
                interval: 5000 //changes the speed
            })

            $(document).ready( function() { 
                // function requestCrossDomain(site,callback) {
                // alert("hello");
                // if (!site) {
                //     alert("no site added");
                //     return false;
                // }
                // alert("ok");
                
                //json
                // var yql="https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D'180.211.159.171%2FPublicPortal%2FMarketDisplayFullScreenBangla.php'&format=json&diagnostics=true&callback=";
                //xml
                // var yql="https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D'180.211.159.171%2FPublicPortal%2FMarketDisplayFullScreenBangla.php'&diagnostics=true'";
                
                // var yql="https://query.yahooapis.com/v1/public/yql?q="+encodeURIComponent("select* from html where url = '180.211.159.171%2FPublicPortal%2FMarketDisplayFullScreenBangla.php'")+'&diagnostics=true&format=xml';

                // alert("asda");
              //   $.getJSON( yql, function( data ) {
              //       console.log(parseJSON(data));
              // });



              // $.ajax({
              //   url: yql,
              //   data: {},
              //   success: function(data){
              //      alert("kaj");
              //      console.log(data);
                    // $test = $xml.find('test');
                    // var temp=$(data).find('results')[0]
                   // console.log(temp);
                    // $('#market_price_div').html(temp);
                        // callback(data);
                //    if (data.results[0]) {
                //     data=data.results[0].replace(/<script[^>]*>[\s\S]*?<\/script>/,'');
                //     if (typeof callback==='function') {
                //         callback(data);
                //     }
                // }else{
                //     throw new Error('Nothing Found');
                // }
            // },
            // dataType: 'xml'
        // });

        // $.get(yql, function(d){
        // $('#market_price_div').append('<h1> Recommended Web Development Books </h1>');
        // $('#market_price_div').append('<dl />');

        // $(d).find('results').each(function(){
            // console.log($(this)[0]);
            // var $book = $(this); 
            // var title = $book.attr("title");
            // var description = $book.find('description').text();
            // var imageurl = $book.attr('imageurl');

            // var html = '<dt> <img class="bookImage" alt="" src="' + imageurl + '" /> </dt>';
            // html += '<dd> <span class="loadingPic" alt="Loading" />';
            // html += '<p class="title">' + title + '</p>';
            // html += '<p> ' + description + '</p>' ;
            // html += '</dd>';

            // $('#market_price_div').html($(this)[0]);

            // $('.loadingPic').fadeOut(1400);
        // });
    // });

              // $.getJSON(yql,  function(data){
              //   alert("kaj");
              //   console.log(data);
              //       // if (data.results[0]) {
              //       //     data=data.results[0].replace(/<script[^>]*>[\s\S]*?<\/script>/,'');
              //       //     if (typeof callback==='function') {
              //       //         callback(data);
              //       //     }
              //       // }else{
              //       //     throw new Error('Nothing Found');
              //       // }
              //   });
          // }  


          // requestCrossDomain();//end of cross domain















// $("#market_price_div").load("http://180.211.159.171/PublicPortal/MarketDisplayFullScreenBangla.php");




            });//end of doccumnent ready
        </script>

    </body>

    </html>
