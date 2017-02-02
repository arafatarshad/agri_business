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

    <title>Agri Biznes</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset ('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/css/modern-business.css') }}" rel="stylesheet"> 
    <link href="{{ asset ('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">  
    <style> 
        body{
            /*background: #eeeeee;*/
            background: rgb(96,99,114);
            color: #fff;
            /*color: #FF9800;*/
        }
        .temparature_text_large{
            font-size: 180px;
        }
        table{
            /*background: #323135; */
            /*background: #F57c50; */
            /*background: #2196F3; */
            /*background: #E040FB; */
            background: #1976D2; 
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

    <body class="style-13">

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
                @if(isset($weather_data))
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
     @endif
 </div>

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
