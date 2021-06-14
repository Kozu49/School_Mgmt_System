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
            <h3 class="box-title">Fee Amount Details</h3>
            <a href="{{route('fee.category.amount.add')}}" class="btn btn-rounded btn-primary mb-5" style="float:right" type="submit">Add Fee Amount</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <h4><strong>Fee Category: </strong>{{$details[0]->feecategory->name}}</h4>
           <br>
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>SN</th>                         
                            <th>Class Name</th>
                            
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                        @foreach($details as $detail)
                        <tr>
                        <td width="5%">{{$i++}}</td>
                        
                        <td>{{$detail->Studentclass->name}}</td>
                        <td>{{$detail->amount}}</td>
                        
                        
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>SN</th>
                            
                            <th>Name</th>
                            
                            <th>Amount</th>
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