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
            <h3 class="box-title">Assigned Subject Details</h3>
            <a href="{{route('assign.subject.add')}}" class="btn btn-rounded btn-primary mb-5" style="float:right" type="submit">Assign Subject</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <h4><strong>Class: </strong>{{$details[0]->class->name}}</h4>
           <br>
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>SN</th>                         
                            <th>Subject Name</th>
                            <th>Full Mark</th>
                            <th>Pass Mark</th>
                            <th>Subjective Mark</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                        @foreach($details as $detail)
                        <tr>
                        <td width="5%">{{$i++}}</td>
                        
                        <td>{{$detail->subject->name}}</td>
                        <td>{{$detail->full_mark}}</td>
                        <td>{{$detail->pass_mark}}</td>
                        <td>{{$detail->subjective_mark}}</td>
                        
                        
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>SN</th>
                        <th>Subject Name</th>
                            <th>Full Mark</th>
                            <th>Pass Mark</th>
                            <th>Subjective Mark</th>
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