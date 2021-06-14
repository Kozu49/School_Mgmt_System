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
			  <h4 class="box-title">Edit Fee Amount</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
                <form method="POST" action="{{route('update.fee.amount',$amounts[0]->fee_category_id)}}">
                    @csrf
                    <div class="row">
                    <div class="col-12">
                    
                    <!-- //addition of row -->
                        <div class="add_item">
                        
                        

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <h5>Fee Category </h5>
                            <div class="controls">
                                <select name="fee_category_id"  required="" class="form-control">
                                    <option value="" selected="" disabled="">Select Fee Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" 
                                    {{($amounts[0]->fee_category_id==$category->id)? "selected":""}}
                                    >{{$category->name }}</option>
                                    

                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        
                        
                        </div>
                    
                    
                    </div>

                  @foreach($amounts as $amount)
                  <!-- //Addition of row second one-->
                  <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

                    <div class="row">
                        <div class="col-md-5">
                        <div class="form-group">
                            <h5>Student Class </h5>
                            <div class="controls">
                                <select name="student_class_id[]"  required="" class="form-control">
                                    <option value="" selected="" disabled="">Select Student Class</option>
                                    @foreach($classes as $class)
                                    <option value="{{$class->id}}" 
                                    {{($amount->student_class_id==$class->id)? "selected":""}}
                                    >{{$class->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        </div>

                        <div class="col-md-5">
                        <div class="form-group">
                                <h5>Amount </h5>
                                <div class="controls">
                                    <input type="text" name="amount[]" value={{$amount->amount}} class="form-control" required="" > 
                                </div>
                        </div>
                        
                        </div>

                        <div class="col-md-2" style="padding-top:25px;">
                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>

                        </div>
                    
                    </div>
                </div>
                <!-- //Addition of row second one-->
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
             <div class="col-md-5">
                        <div class="form-group">
                            <h5>Student Class </h5>
                            <div class="controls">
                                <select name="student_class_id[]"  required="" class="form-control">
                                    <option value="" selected="" disabled="">Select Student Class</option>
                                    @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        </div>

                        <div class="col-md-5">
                        <div class="form-group">
                                <h5>Amount </h5>
                                <div class="controls">
                                    <input type="text" name="amount[]" class="form-control" required="" > 
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