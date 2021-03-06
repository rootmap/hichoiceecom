@extends('layout.master')
@section('title')
Currency Info
@endsection
@section('barcum')
<h1>
    Currency Info
    <small>Create Currency & All Currency List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-cogs"></i> Site Setting</a></li>
    <li><a href="#" class="active">Currency Info</a></li>
</ol>
@endsection

@include('extra.msg')

@section('content')
<!-- Main content -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i> Create New Currency</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" action="{{url('admin-ecom/currency-add')}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Currency Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Currency Code</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="short_code" placeholder="Enter CODE">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Currency Icon</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="icon" placeholder="Enter Icon">
                    </div>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">

                        <input type="checkbox"  class="minimal"  name="isactive" placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Create</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </div>
    <!--/.col (left) -->
</div>

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-table"></i> Currency List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">


                    <div id="grid"></div>

                </div>
                <!-- /.box-body -->
            </form>
        </div>
        <!-- /.box -->

    </div>
    <!--/.col (left) -->
</div>
<!-- /.row -->
<!-- /.content -->
@endsection


@section('css')
<link rel="stylesheet" href="{{url('plugins/iCheck/all.css')}}">
@endsection

@section('js')
<script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
@include('extra.kendo')
<script id="edit_client" type="text/x-kendo-template">
    <a class="k-button k-button-icontext k-grid-delete" href="{{url('admin-ecom/currency')}}/#= id #"><span class="k-icon k-edit"></span>Edit</a> 
    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Del                            ete</a>
</script>  
<script type="text/javascript">
    function deleteClick(id) {
        var c = confirm("Do you want to delete?");
        if (c === true) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "currency-delete/" + id,
                success: function (result) {
                    $(".k-i-refresh").click();
                }
            });
        }
    }

</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        var dataSource = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "currency-data",
                    type: "GET",
                    datatype: "JSON"

                }
            },
            autoSync: false,
            schema: {
                data: "data",
                total: "total",
                model: {
                    id: "id",
                    fields: {
                        id: {nullable: true},
                        name: {type: "string"},
                        short_code: {type: "string"},
                        icon: {type: "string"},
                        isactive: {type: "string"},
                        created_at: {type: "string"},
                        updated_at: {type: "string"}

                    }
                }
            },
            pageSize: 10,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true
        });
        $("#grid").kendoGrid({
            dataSource: dataSource,
            filterable: true,
            pageable: {
                refresh: true,
                input: true,
                numeric: false,
                pageSizes: true,
                pageSizes: [10, 20, 50, 100, 200, 400]
            },
            sortable: true,
            groupable: true,
            columns: [
                {field: "id", title: "TID", width: "80px"},
                {field: "name", title: "Name", width: "150px"},
                {field: "short_code", title: "Code", width: "150px"},
                {field: "icon", title: "Icon", width: "150px"},
                {field: "isactive", title: "Is Active", width: "150px"},
                {field: "created_at", title: "Created", width: "150px"},
                {
                    title: "Action", width: "290px",
                    template: kendo.template($("#edit_client").html())
                }
            ],
        });




    });

</script>

@endsection