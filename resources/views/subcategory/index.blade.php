@extends('layout.master')
@section('title')
Sub-Category Info
@endsection
@section('barcum')
<h1>
    Sub-Category Info
    <small>Create Sub-Category & All Sub-Category List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-cogs"></i> Product Setting</a></li>
    <li><a href="#" class="active">Sub-Category Info</a></li>
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
                <h3 class="box-title"><i class="fa fa-plus"></i> Create New Sub-Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" enctype="multipart/form-data"  role="form" action="{{url('admin-ecom/sub-category-add')}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Category </label>
                        <select class="form-control" id="exampleInputEmail1" name="cid">
                            <option value="0">Select Category</option>
                            @if(!empty($cat))
                                @foreach($cat as $ct)
                                    <option value="<?= $ct->id ?>"><?= $ct->name ?></option>
                                @endforeach
                            @endif
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sub-Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" placeholder="Enter Name">
                    </div>
                    <div class="form-group iscustomlayout">
                        <input type="checkbox"  class="minimal" id="is_custom_layout" name="is_custom_layout" value="1"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Custom Layout</label>
                    </div>
                    <div class="form-group customlayout">
                        <label for="exampleInputPassword1">Please Choose a Brand Layout</label>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input type="radio" value="1" name="layout" id="layout_0" /> Layout One</b></div>
                                    <div class="col-md-12">
                                        <BR>
                                        <img src="{{url('subcategory_layout/subl1.jpg')}}" />
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input type="radio" name="layout" value="2" id="layout_1" /> Layout Two</b></div>
                                    <div class="col-md-12">
                                        <BR>
                                        <img width="130"  src="{{url('subcategory_layout/subl2.jpg')}}" />
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input type="radio" name="layout" value="3" id="layout_2" /> Layout Three</b></div>
                                    <div class="col-md-12">
                                        <BR>
                                        <img width="130" src="{{url('subcategory_layout/subl3.jpg')}}" />
                                    </div>
                                </label>
                            </div>

                            <div class="col-md-3">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input type="radio" name="layout" value="4" id="layout_3" /> Layout Four</b></div>
                                    <div class="col-md-12">
                                        <BR>
                                        <img width="130" src="{{url('subcategory_layout/subl4.jpg')}}" />
                                    </div>
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Description"></textarea>
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
                <h3 class="box-title"><i class="fa fa-table"></i> Sub-Category List</h3>
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
    <a class="k-button k-button-icontext k-grid-delete" href="{{url('admin-ecom/sub-category')}}/#= id #"><span class="k-icon k-edit"></span>Edit</a> 
    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
</script>  
<script type="text/javascript">
    function deleteClick(id) {
        var c = confirm("Do you want to delete?");
        if (c === true) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "sub-category-delete/" + id,
                success: function (result) {
                    $(".k-i-refresh").click();
                }
            });
        }
    }

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".customlayout").fadeOut();
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
        });

        
        $(".iscustomlayout .iCheck-helper").click(function () {
                var colorAc = $(this).parent('div').attr('aria-checked');
                //alert(colorAc);        
                if (colorAc == 'true')
                {
                    $(".customlayout").fadeIn();
                } else
                {
                    $(".customlayout").fadeOut();
                }
        });


        var dataSource = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "sub-category-data",
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
                        cname: {type: "string"},
                        photo: {type: "string"},
                        description: {type: "string"},
                        created_at: {type: "string"},
                        updated_at: {type: "string"}

                    }
                }
            },
            pageSize: 10,
            serverPaging: false,
            serverFiltering: false,
            serverSorting: false
        });
        
        $("#grid").kendoGrid({
            dataSource: dataSource,
            filterable: true,
            pageable: {
                refresh: true,
                input: true,
                numeric: true,
                pageSizes: true,
                pageSizes: [10, 20, 50, 100, 200, 400]
            },
            sortable: true,
            groupable: true,
            columns: [
                {field: "id", title: "CID", width: "80px"},
                {field: "cname", title: "Category Name"},
                {field: "name", title: "Sub-Category Name"},
                {field: "photo", title: "Photo"},
                {field: "created_at", title: "Created"},
                {
                    title: "Action", width: "290px",
                    template: kendo.template($("#edit_client").html())
                }
            ],
        });




    });

</script>

@endsection