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
			  <h4 class="box-title">Edit Assigned Subject</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
                <form method="POST" action="{{route('assign.subject.update',$assigns[0]->class_id)}}">
                    @csrf
                    <div class="row">
                    <div class="col-12">
                    
                    <!-- //addition of row -->
                        <div class="add_item">
                        
                        

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <h5>Student Class </h5>
                            <div class="controls">
                                <select name="class_id"  required="" class="form-control">
                                    <option value="" selected="" disabled="">Select Student Class</option>
                                    @foreach($classes as $class)
                                    <option value="{{$class->id}}"
                                    {{($assigns[0]->class_id==$class->id)? "selected":""}}
                                    >{{$class->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        
                        
                        </div>
                    
                    
                    </div>
                    @foreach($assigns as $assign)
                  <!-- //Addition of row second one-->
                  <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

                    <div class="row">
                        <div class="col-md-3">
                        <div class="form-group">
                            <h5>Subject </h5>
                            <div class="controls">
                                <select name="subject_id[]"  required="" class="form-control">
                                    <option value="" selected="" disabled="">Select Subject</option>
                                    @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}"
                                    {{($assign->subject_id==$subject->id)? "selected":""}}
                                    >{{$subject->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                                <h5>Full Marks </h5>
                                <div class="controls">
                                    <input type="text" name="full_mark[]" value="{{$assign->full_mark}}" class="form-control" required="" > 
                                </div>
                        </div>
                        
                        </div>


                        <div class="col-md-2">
                        <div class="form-group">
                                <h5>Pass Marks </h5>
                                <div class="controls">
                                    <input type="text" name="pass_mark[]" value="{{$assign->pass_mark}}" class="form-control" required="" > 
                                </div>
                        </div>
                        
                        </div>
                        <div class="col-md-2">
                        <div class="form-group">
                                <h5>Subjective Marks </h5>
                                <div class="controls">
                                    <input type="text" name="subjective_mark[]" value="{{$assign->subjective_mark}}" class="form-control" required="" > 
                                </div>
                        </div>
                        
                        </div>



                        <div class="col-md-2" style="padding-top:25px;">
                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>


                        </div>
                    
                    </div>
                    </div>
                    @endforeach

                    </div> 
                    <!-- //Addition of row -->

                        
                        
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


<!-- //For addition of additional row -->

<div style="visibility:hidden;">
<div class="whole_extra_item_add" id="whole_extra_item_add">
    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
        <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <h5>Subject </h5>
                            <div class="controls">
                                <select name="subject_id[]"  required="" class="form-control">
                                    <option value="" selected="" disabled="">Select Subject</option>
                                    @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                                <h5>Full Marks </h5>
                                <div class="controls">
                                    <input type="text" name="full_mark[]" class="form-control" required="" > 
                                </div>
                        </div>
                        
                        </div>


                        <div class="col-md-2">
                        <div class="form-group">
                                <h5>Pass Marks </h5>
                                <div class="controls">
                                    <input type="text" name="pass_mark[]" class="form-control" required="" > 
                                </div>
                        </div>
                        
                        </div>
                        <div class="col-md-2">
                        <div class="form-group">
                                <h5>Subjective Marks </h5>
                                <div class="controls">
                                    <input type="text" name="subjective_mark[]" class="form-control" required="" > 
                                </div>
                        </div>
                        
                        </div>



                        <div class="col-md-2" style="padding-top:25px;">
                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                        </div>

        </div>
    </div>

</div>

</div>


<!-- //Script for additional row -->
<script type="text/javascript">
    $(document).ready(function(){
        var counter=0;
        $(document).on("click",".addeventmore",function(){

            var whole_extra_item_add=$('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click",".removeeventmore",function(event){   
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter-=1
    });

});


</script>


@endsection