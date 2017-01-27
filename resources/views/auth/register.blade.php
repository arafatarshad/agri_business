  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset("/bower_components/admin-lte/plugins/iCheck/square/blue.css")}}" rel="stylesheet" type="text/css" />
    <!-- <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/main.css')}}"> -->
    <!-- select2 css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />


    <script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.2.3.min.js") }}"></script>
    <!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <!-- AdminLTE App -->

    <script src="{{ asset ("/bower_components/admin-lte/plugins/iCheck/icheck.min.js") }}" type="text/javascript"></script>

    <!-- <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>  -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="../../index2.html"><b>Agri</b>Business</a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Register a new membership</p>

      <!-- <form action="../../index.html" method="post"> -->
      <form method="POST" action="{{URL::to('/')}}/auth/register">
        {!! csrf_field() !!}
        @if (count($errors) > 0)
        <ul style="color: red">
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
        @endif
        <div class="form-group has-feedback">
          <select class="form-control" name="user_type" name="user_type" id="user_type" required="" placeholder="select user type">
            <option value="">Select User Type</option>
            <option value="1">Farmer</option>
            <option value="2">Dealer</option>
          </select> 
        </div>

        <div class="form-group has-feedback">
          <select name="thana_id" id="thana_id" class="form-control"></select>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" required="" name="address" placeholder="Address">
          <span class="glyphicon glyphicon-home form-control-feedback"></span>
        </div>



        <div class="form-group has-feedback">
          <input type="text" class="form-control" required="" name="name" placeholder="Full name">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>



        <!-- 
        <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div> -->
        <div class="form-group has-feedback">
          <input type="text" required="" name="phone_no" class="form-control" placeholder="Phone Number" >
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        </div>


        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>



        <div class="form-group has-feedback">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="row">
<!--                 <div class="col-xs-8">
                  <div class="checkbox icheck">
                    <label>
                      <input type="checkbox"> I agree to the <a href="#">terms</a>
                  </label>
              </div>
            </div> -->
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
<!--       <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
          Google+</a> -->
        </div>

        <a href="{{URL::to('/')}}/auth/login" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
    <script>


      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
    // alert("hi");
  });
      $(document).ready(function(){
        // alert("hi");
        // $('#thana_id').select2();


// $("#thana_id").select2({
//     minimumInputLength: 1,
//     tags: [],
//     ajax: {
//         url: "{{URL::to('/')}}/getallthana",
//         dataType: 'json',
//         type: "POST",
//         quietMillis: 50,
//         data: function (term) {
//             return {
//                 term: term
//             };
//         },
//         results: function (data) {
//             return {
//                 results: $.map(data, function (item) {
//                     return {
//                         text: item.text, 
//                         id: item.id
//                     }
//                 })
//             };
//         }
//     }
// });








$("#thana_id").select2({
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
    </script>
  </body>
  </html>
