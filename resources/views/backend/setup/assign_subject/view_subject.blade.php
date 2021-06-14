@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
<div class="container-full">
<!-- Content Header (Page header) -->


<!-- Main content -->
<section class="content">
    <div class="row">		

        <div class="col-12">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Assign Subject</h3>
            <a href="{{route('assign.subject.add')}}" class="btn btn-rounded btn-primary mb-5" style="float:right" type="submit">Assign Subject</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>                         
                            <th>Class Name</th>
                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                        @foreach($subjects as $subject)
                        <tr>
                        <td width="5%">{{$i++}}</td>
                        
                        <td>{{$subject->class->name}}</td>
                        
                        
                        <td width="20%">
                            <a href="{{route('assign.subject.edit',$subject->class_id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('assign.subject.details',$subject->class_id)}}" class="btn btn-danger">Details</a>

                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>SN</th>
                            
                            <th>Name</th>
                            
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
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