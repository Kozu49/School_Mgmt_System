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
			  <h4 class="box-title">Update Password</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
                <form method="POST" action="{{route('password.update',$user->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                       
                                <div class="form-group">
                                        <h5>Current Password</h5>
                                        <div class="controls">
                                            <input type="password"   class="form-control" required="" name="oldpassword" id="current_password"> </div>
                                        </div>

                                    <div class="form-group">
                                            <h5> New Password </h5>
                                            <div class="controls">
                                                <input type="password" class="form-control" required="" id="password" name="password"> </div>
                                    </div>

                            

                               
                                    <div class="form-group">
                                            <h5>Confirm Password </h5>
                                            <div class="controls">
                                                <input type="password"  class="form-control" required="" id="password_confirmation" name="password_confirmation"> </div>
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