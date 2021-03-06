@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
<div class="container-full">

<div class="container-full">
		

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit User</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
                <form method="POST" action="{{route('users.update',$user->id)}}">
                    @csrf
                    <div class="row">
                    <div class="col-12">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                <h5>User Role <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="role" id="select" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Role</option>
                                        <option value="Admin"
                                        <?php if($user->role=="Admin") echo "selected" ; ?>
                                        >Admin</option>
                                        <option value="Operator"
                                        <?php if($user->role=="Operator") echo "selected" ; ?>
                                        >Operator</option>
                                        
                                    </select>
                                </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                                <h5>User Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" required="" value="{{$user->name}}"> </div>
                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        
                            <div class="form-group">
                            <h5>User Email<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="email"  name="email" class="form-control" required="" value="{{$user->email}}"> </div>
                            </div>

                    </div>

                    


                </div>
                        
                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-dark mb-5" value="Update">
                    </div>
                </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                </section>
                <!-- /.content -->
            </div>



@endsection