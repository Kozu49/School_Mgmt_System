@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="content-wrapper">
<div class="container-full">

<div class="container-full">
		

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Manage Profile</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
                <form method="POST" action="{{route('profile.update',$user->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">

                

                            <div class="row">
                                    
                                <div class="col-md-6">
                                    
                                        <div class="form-group">
                                        <h5>User Email<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email"  name="email" class="form-control" required="" value="{{$user->email}}"> </div>
                                        </div>

                                </div>
                                <div class="col-md-6">
                                    
                                        <div class="form-group">
                                        <h5>User name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="name" class="form-control" required="" value="{{$user->name}}"> </div>
                                        </div>

                                </div>

                                


                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <h5>User Role <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="usertype" id="select" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Role</option>
                                                    <option value="Admin"
                                                    <?php if($user->usertype=="Admin") echo "selected" ; ?>
                                                    >Admin</option>
                                                    <option value="User"
                                                    <?php if($user->usertype=="User") echo "selected" ; ?>
                                                    >User</option>
                                                    
                                                </select>
                                            </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                            <h5>User Mobile <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" class="form-control" required="" value="{{$user->mobile}}"> </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <h5>Gender <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="gender" id="select" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Gender</option>
                                                    <option value="Male"
                                                    <?php if($user->gender=="Male") echo "selected" ; ?>
                                                    >Male</option>
                                                    <option value="Female"
                                                    <?php if($user->gender=="Female") echo "selected" ; ?>
                                                    >Female</option>
                                                    <option value="Others"
                                                    <?php if($user->gender=="Others") echo "selected" ; ?>
                                                    >Others</option>
                                                    
                                                </select>
                                            </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                            <h5>Address <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address" class="form-control" required="" value="{{$user->address}}"> </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                
                                    <label for="formFile" class="form-label">Profile Image:</label>
                                    <input class="form-control" type="file" name="image" id="image">
                                    
                                </div>

                                <div class="col-md-6">
                                    <img id="showimage" src="{{(!empty($user->image)) ? url('upload/profile_image/'.$user->image):url('upload/no_image.jpg')}}" style="width:100px;height:100px">

                                
                                </div>
                                <input type="hidden"  name="old" class="form-control"  value="{{$user->image}}"> </div>

                                
                                
                            
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

<!-- //Ajax for displayibg image -->
        <script type="text/javascript">
        $(document).ready(function(){
        $('#image').change(function(e){
        var reader=new FileReader();
        reader.onload=function(e){
            $('#showimage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);

        });

        });


</script>



@endsection