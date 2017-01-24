    @extends('layouts.admin')
    @section('content')

    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Role Against User</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        {!! Form::open(array('url' => '/permission/submit_user_role', 'id' => 'role-form')) !!}
          {{ csrf_field() }}         
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">User Role</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th>Users</th>
                  <th>Role</th>
                  <th>edit</th>
                </tr>

                @foreach($users as $user)
                <tr>
                  <td><input value="{{$user->user_id}}" class="hidden">{{$user->name}}</td>
                  <td>
                    {{$user->role_name}}
                  </td>
                  <td><a href="{{URL::to('/')}}/permission/{{$user->user_id}}/submit_user_role">Edit</a></td>
                </tr>
                @endforeach
                
              </table>
            </div>
            <!-- /.box-body -->

          </div>
        <!-- /.box-body -->

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


</script>
@endsection


