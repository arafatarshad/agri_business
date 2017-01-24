    @extends('layouts.admin')
    @section('content')
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Permission Against Role</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        {!! Form::open(array('url' => '/permission/submit_role_permission', 'id' => 'role-form')) !!}
        {{ csrf_field() }}

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Role Permission</h3>
          </div>
          <!-- /.box-header -->

          <div class="box-body no-padding">
            <table class="table table-striped">
              <tr>
                <th>Permission</th>
                @foreach($roles as $role)
                @if($role->name!==null)
                <th><input name="role[]" value="{{$role->id}}" class="hidden">{{$role->name}}</th>
                @endif
                @endforeach
              </tr>

              @foreach($permissions as $permission)
              <tr>
                <td>{{$permission->display_name}}</td>
                <!-- <input name="permission_name[]" value="{{$permission->id}}" class="hidden" > -->
                @foreach($roles as $role)
                @if($role->name!==null)
                @if($role->id==$permission->role_id)
                <!-- <td><input type="checkbox" name="permission[]" value="{{$permission->id}}" checked></td> -->
                <td>
                <!-- hello -->
                <input type="checkbox" name="permission[]" value="{{$permission->id."_".$role->id}}" checked >

                </td>
                @else
                <!-- <td><input type="checkbox" name="permission[]" value="{{$permission->id}}"></td> -->
                <td>
                <!-- hi -->
                  <input type="checkbox" name="permission[]" value="{{$permission->id."_".$role->id}}">

                </td>
                @endif
                @endif
                @endforeach

              </tr>
              @endforeach

            </table>
            <div class="form-group">
              <!-- description -->

              <button type="submit" class="btn btn-primary center-block btn-flat">Submit</button>
            </div>
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


