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
            <h3 class="box-title">Exam Types</h3>
            <a href="{{route('exam.type.add')}}" class="btn btn-rounded btn-primary mb-5" style="float:right" type="submit">Add Exam Type</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>                         
                            <th>Name</th>
                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                        @foreach($types as $type)
                        <tr>
                        <td width="5%">{{$i++}}</td>
                        
                        <td>{{$type->name}}</td>
                        
                        
                        <td width="20%">
                            <a href="{{route('exam.type.edit',$type->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('exam.type.delete',$type->id)}}" id="delete" class="btn btn-danger">Delete</a>

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