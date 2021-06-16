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
			  <h4 class="box-title">Add Student</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
                    <form method="POST" action="{{route('student.reg.store')}}" enctype="multipart/form-data">
                    @csrf
                                <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                            <h5>Student Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required="" > </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                            <h5>Father's Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="fname" class="form-control" required="" > </div>
                                    </div>

                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                            <h5>Mother's Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mname" class="form-control" required="" > </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                            <h5>Mobile <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" class="form-control" required="" > </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                            <h5>Address <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address" class="form-control" required="" > </div>
                                    </div>

                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Gender <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="gender" id="select" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>

                                                
                                            </select>
                                        </div>
                                </div>

                                </div>
                                
                            </div>


                            <div class="row">

                                <div class="col-md-4">
                                <div class="form-group">
                                        <h5>Religion <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="religion" id="select" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Religion</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Christian">Christian</option>

                                                
                                            </select>
                                        </div>
                                </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                            <h5>DOB <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="dob" class="form-control" required="" > </div>
                                    </div>

                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                            <h5>Discount <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="discount" class="form-control" required="" > </div>
                                    </div>

                                </div>
                            </div>


                            <div class="row">

                                <div class="col-md-4">
                                <div class="form-group">
                                        <h5>Year <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="year_id" id="select" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Year</option>
                                                @foreach($years as $year)
                                                <option value="{{$year->id}}">{{$year->name}}</option>
                                                
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                </div>

                                <div class="col-md-4">
                                <div class="form-group">
                                        <h5>Class <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="class_id" id="select" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Class</option>
                                                @foreach($classes as $class)
                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                @endforeach

                                                
                                            </select>
                                        </div>
                                </div>


                                </div>


                                <div class="col-md-4">
                                <div class="form-group">
                                        <h5>Group <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="group_id" id="select" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Group</option>
                                                @foreach($groups as $group)
                                                <option value="{{$group->id}}">{{$group->name}}</option>
                                                @endforeach

                                                
                                            </select>
                                        </div>
                                </div>


                                </div>
                            </div>

                                <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                        <h5>Shift <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="shift_id" id="select" required="" class="form-control">
                                                                <option value="" selected="" disabled="">Select Shift</option>
                                                                @foreach($shifts as $shift)
                                                                <option value="{{$shift->id}}">{{$shift->name}}</option>
                                                                @endforeach

                                                                
                                                            </select>
                                                        </div>
                                                </div>


                                        </div>


                                        <div class="col-md-4">
                                            
                                                <label for="formFile" class="form-label">Profile Image:</label>
                                                <input class="form-control" type="file" name="image" id="image">
                                                
                                            </div>


                                    <div class="col-md-4">
                                    <img id="showimage" src="{{(!empty($user->image)) ? url('upload/profile_image/'.$user->image):url('upload/no_image.jpg')}}" style="width:100px;height:100px">

                                    </div>
                            </div>

       
                            
                        <div class="text-xs-right" >
                            <input type="submit" class="btn btn-rounded btn-dark mb-5" value="submit" >
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