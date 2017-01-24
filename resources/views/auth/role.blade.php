    @extends('layouts.admin')
    @section('content')

    <section class="content">
        <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Create A Role To Manage System</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      {!! Form::open(array('url' => '/permission/submitrole',  'id' => 'role-form')) !!}
      {{ csrf_field() }} 
        
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">

                <!-- Customer type -->

                <div class="form-group">
                <label>Name</label>
                  <input type="text" class="form-control" type="text" id="username"name="username" placeholder="Enter User Name"value="{{ old('name') }}" style="width: 40em; position:relative;">   

                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">

            
          <button type="submit" class="btn btn-primary center-block btn-flat" style="margin-top: 1.7em">Submit</button>
          <!-- /.col -->
        </div>


              
            </div>
            
            <!-- /.col -->
          </div>
          <!-- /.row -->
          
        </div>
      {!! Form::close() !!}
      <!-- /.box-body -->
      <div class="form-group">
     @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>      
    </div>
  </section>

  @endsection



  @section('script')

  <script type="text/javascript">

  $("#role-form").validate({
   rules: {
    // simple rule, converted to {required:true}
    username: {"required":true, "minlength": 2}
    

  },
  messages: {
    username: {"required":"Please specify your username", "minlength": "minlength"}
    
  }
});

  </script>
  @endsection


