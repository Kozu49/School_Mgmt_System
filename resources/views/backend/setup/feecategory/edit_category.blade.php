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
			  <h4 class="box-title">Edit Fee Category</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
                <form method="POST" action="{{route('fee.category.update',$category->id)}}">
                    @csrf
                    <div class="row">
                    <div class="col-12">

               

                    <div class="col-md-6">
                        <div class="form-group">
                                <h5>Fee Category <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" value="{{$category->name}}" class="form-control" required="" > </div>
                        </div>

                    </div>

       

                
                        
                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-dark mb-5" value="update">
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