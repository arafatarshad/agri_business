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
    <link href="{{ asset ('assets/css/shop-homepage.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">  
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
                /*background: rgb(96,99,114);*/
                color: #fff;
            } 
            .select2-container {
                width: 100% !important;
                padding: 0;
                color: black;
            }            
        </style>

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
    <div class="row">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>
    <!-- Page Content -->
    <div class="container">
        <input type="hidden" name="default_category_id" id="default_category_id" value="{{$default_category}}">
        <input type="hidden" name="default_thana_id" id="default_thana_id" value="{{$default_thana}}">
        <div class="row">

            <div class="col-md-3" style="border-right: 2px solid #eeeeee">
                <p class="lead">Agri Biznes</p>
                <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">Post New Add</button>

                <form action="{{URL::to('/')}}/filter_ad" method="POST"> 
                    <h4>Search By Category</h4>
                    <div class="list-group">
                        @foreach($all_categories as $category)
                        <div class="radio "> 
                            <label><input  type="radio" name="category_id" value="{{$category->id}}">{{$category->name}}</label>  
                        </div> 
                        @endforeach 
                    </div>
                    <h4>Search By Area</h4>
                    <div class="list-group">

                        @foreach($all_thana as $thana)
                        <div class="radio "> 
                            <label><input  type="radio" name="thana_id" value="{{$thana->id}}">{{$thana->name}}</label>  
                        </div> 
                        @endforeach 
                    </div>  

                    <input class="btn btn-info" type="submit" name="submit" value="Filter">
                </form>                          
            </div>

            <div class="col-md-9">

                <div class="row">

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
                                <h5><span class="pull-right">{{$post->thana_name}}</span></h5>
                            </div> 
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
                <p class="text-center">Copyright &copy; AgriBiznes.com</p>
                </div>
            </div>
        </footer>

    </div>







    <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog" role="document">

        <!-- Modal content-->
        <div class="modal-content"  style="color: black">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Post New Add</h4>
        </div>
        <div class="modal-body">
            <!-- <p>Some text in the modal.</p> -->
            <form action="{{URL::to('/')}}/post_add_from_front_end" method="post" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <div class="row" style="">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label for="">Product Category</label>
                                    <div style="width: 100%;min-width: 300px">

                                        <select name="product_category" class="form-control" id="product_category"> 
                                        </select> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label for="">Product Name</label>
                                    <input type="text" class="form-control" required="" name="name" placeholder="Product name" value="{{Input::old('name')}}"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label for="">Product Description</label>
                                    <textarea id="product_description" name="product_description" rows="4" class="form-control" style="resize: none;" value="{{Input::old('product_description')}}" required=""> </textarea>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9">
                                <div class="form-group has-feedback">
                                    <label for="">Quantity</label>
                                    <input type="number" class="form-control" name="product_quantity" id="product_quantity" value="{{Input::old('product_quantity')}}" required=""> 
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                                <div class="form-group has-feedback"> 
                                    <label for="">Unit</label>
                                    <select name="product_unit" class="form-control" style="padding: 0px" id="product_unit">
                                        @foreach($all_units as $unit)   
                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>              
                        </div>          
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label for="">Price</label>
                                    <input type="number" class="form-control" name="product_price" id="product_price" required="" min="0" value="{{Input::old('product_price')}}"> 
                                </div>
                            </div>              
                        </div>  

                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label for="">Add valid until</label>
                                    <input type="text" class="form-control" name="expiry_date" id="expiry_date" placeholder="date" required="" value="{{Input::old('expiry_date')}}"> 
                                </div>
                            </div>              
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label for="">Add Image</label>
                                    <input type="file" name="image_file" id="image_file" value="{{Input::old('image_file')}}"> 
                                </div>
                            </div>              
                        </div>


                        <h3>Poster Details</h3>    
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" required="" name="poster_name" placeholder="Your Name" value="{{Input::old('poster_name')}}"> 
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label for="">Contact</label>
                                    <input type="number" class="form-control" required="" name="poster_phone" placeholder="Your Phone No." value="{{Input::old('poster_phone')}}"> 
                                </div>
                            </div>      
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label for="">Thana ID</label>
                                    <select name="poster_thana_id" id="poster_thana_id" class="form-control" required=""></select>
                                </div>
                            </div> 
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" required="" name="poster_address" placeholder="Your Address" value="{{Input::old('poster_address')}}"> 
                                </div>
                            </div>                                                
                        </div>                
<!--                 <div class="row" style="margin-top:20px;margin-bottom: 100px">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="form-group has-feedback">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </div>              
                </div>  -->
            </div>
        </div>
























    </div>
    <div class="modal-footer">
        <input type="submit"  class="btn btn-success"  value="Submit">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</form>
</div>

</div>
</div>
<!-- /.container -->

<!-- jQuery -->
<script src="{{ asset ('/assets/js/jquery.js') }}"></script>
<script src="{{ asset ('/assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript"> 
    $(document).ready(function(){
        $('#expiry_date').datepicker({
            dateFormat: 'yy-mm-dd',
            minDate:'yesterday'
        });
        $("#product_category").select2({
            placeholder:"Select a Category",
            ajax: {
                url: "{{URL::to('/')}}/getallcategories",
                dataType: 'json',
                type: "POST",
                delay: 250,
                data: function (params) {
                    return {
                        term: params.term,  
                    };
                },
                processResults: function (data, params) { 
                    params.page = params.page || 1;
                    return {
                        results: data,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            }
        });



        $("#poster_thana_id").select2({
         placeholder:"Select a Thana",
         ajax: {
           url: "{{URL::to('/')}}/getallthana",
           dataType: 'json',
           type: "POST",
           delay: 250,
           data: function (params) {
              return {
                term: params.term,  
            };
        },
        processResults: function (data, params) { 
          params.page = params.page || 1;
          return {
            results: data,
            pagination: {
              more: (params.page * 30) < data.total_count
          }
      };
  },
  cache: true
}
});        
    });
//end of document ready 
</script>
</body>

</html>
