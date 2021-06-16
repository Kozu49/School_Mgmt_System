@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
<div class="container-full">
<!-- Content Header (Page header) -->


<!-- Main content -->
<section class="content">
            <div class="col-md-12">	
                 <div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Search</strong></h4>
				  </div>

				  <div class="box-body">
                  <form action="{{route('reg.student.search')}}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                        <div class="form-group">
                                <h5>Year <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="year_id" id="select" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Year</option>
                                        @foreach($years as $year)
                                        <option value="{{$year->id}}" 
                                        <?php if($year_id==$year->id) echo "selected" ; ?>
                                        >{{$year->name}}</option>
                                        
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
                                        <option value="{{$class->id}}"
                                        <?php if($class_id==$class->id) echo "selected" ; ?>
                                        >{{$class->name}}</option>
                                        @endforeach

                                        
                                    </select>
                                </div>
                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="text-xs-right" style="padding-top:25px;">
                            <input type="submit" class="btn btn-rounded btn-dark mb-5" value="Search" name="search">
                        </div>
                        </div>
                    
                    </div>
                  </form>
					
				  </div>
			    </div>	
                </div>

        <div class="col-12">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Student List</h3>
 

            <a href="{{route('student.reg.add')}}" class="btn btn-rounded btn-primary mb-5" style="float:right" type="submit">Add Student</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
           
        @if(isset($search))
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>                         
                            <th>Name</th>
                            <th>ID No</th>
                            <th>Year</th>
                            <th>Class</th>
                            <th>Roll</th>
                            <th>Image</th>
                            
                            @if(Auth::user()->role=="Admin")
                            <th>Code</th>
                            @endif

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                        @foreach($assigns as $assign)
                        <tr>
                        <td width="5%">{{$i++}}</td>
                        
                        <td>{{$assign->student->name}}</td>
                        <td>{{$assign->student->id_no}}</td>
                        <td>{{$assign->student_year->name}}</td>
                        <td>{{$assign->student_class->name}}</td>
                        <td>{{$assign->roll}}</td>
                        <td>
                        
                        <img src="{{(!empty($assign->student->image)) ? url('upload/student_image/'.$assign->student->image):url('upload/no_image.jpg')}}" style="width:100px;height:100px">
                        </td>
                        <td>{{$assign->student->code}}</td>
                        
                        <td width="20%">
                            <a href="{{route('student.reg.edit',$assign->student_id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('student.reg.promote',$assign->student_id)}}" class="btn btn-danger">Promote</a>

                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            @else
            <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>                         
                            <th>Name</th>
                            <th>ID No</th>
                            <th>Year</th>
                            <th>Class</th>
                            <th>Roll</th>
                            <th>Image</th>
                            
                            @if(Auth::user()->role=="Admin")
                            <th>Code</th>
                            @endif

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                        @foreach($assigns as $assign)
                        <tr>
                        <td width="5%">{{$i++}}</td>
                        
                        <td>{{$assign->student->name}}</td>
                        <td>{{$assign->student->id_no}}</td>
                        <td>{{$assign->student_year->name}}</td>
                        <td>{{$assign->student_class->name}}</td>
                        <td>{{$assign->roll}}</td>
                        <td>
                        
                        <img src="{{(!empty($assign->student->image)) ? url('upload/student_image/'.$assign->student->image):url('upload/no_image.jpg')}}" style="width:100px;height:100px">
                        </td>
                        <td>{{$assign->student->code}}</td>
                        
                        <td width="20%">
                            <a href="{{route('student.reg.edit',$assign->student_id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('student.reg.promote',$assign->student_id)}}" class="btn btn-danger">Promote</a>

                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            @endif
               
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

            
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

</div>
</div>


@endsection