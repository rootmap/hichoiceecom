
@extends('layout.master')
@section('title')
Product Info
@endsection
@section('barcum')
<h1>
    Product Info
    <small>Create New Product Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tags"></i> Product Info</a></li>
    <li><a href="#" class="active">Create New Product</a></li>
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
                <h3 class="box-title"><i class="fa fa-plus"></i> Create New Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/product-add')}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" class="form-control" id="proName" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Code</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="pcode" placeholder="Enter Code">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1"> New Price</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="price" placeholder="Enter New Price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Old Price <code>Used to give discount</code></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="old_price" placeholder="Enter Old Price">
                    </div>
                    
                    <div class="form-group categoryField">
                        <label for="exampleInputEmail1">Select Category </label>
                        <select class="form-control" id="cid" name="cid">
                            <option value="0">Select Category</option>
                            @if(!empty($cat))
                            @foreach($cat as $ct)
                            <option value="<?= $ct->id ?>"><?= $ct->name ?></option>
                            @endforeach
                            @endif

                        </select>
                    </div>

                    <div class="form-group bid">
                        <label for="exampleInputEmail1">Select Brand </label>
                        <select class="form-control" id="bid" name="bid">
                            <option value="0">Select Brand</option>
                            @if(!empty($brand))
                            @foreach($brand as $ct)
                            <option value="<?= $ct->id ?>"><?= $ct->name ?></option>
                            @endforeach
                            @endif

                        </select>
                    </div>

                    <div class="form-group subcid">
                        <label for="exampleInputEmail1">Select Sub-Category </label>
                        <select class="form-control" id="subcid" name="scid">
                            <option value="0">Please Select Category</option>
                        </select>
                    </div>
                    
                    <div class="form-group sscid">
                        <label for="exampleInputEmail1">Select Sub-Sub-Category </label>
                        <select class="form-control" name="sscid">
                            <option value="0">Please Select Category</option>
                        </select>
                    </div>
                    
                    
                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Tag </label>
                        <select id="tid" name="tid[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Tag" style="width: 100%;">
                            @if(!empty($tag))
                            @foreach($tag as $ct)
                            <option value="<?= $ct->id ?>"><?= $ct->name ?></option>
                            @endforeach
                            @endif
                        </select>

                    </div>

                    <div class="form-group unitcheck">
                        <input type="checkbox"  class="minimal" id="isunit" name="isunit" value="1"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Unit Active</label>
                    </div>

                    <div class="form-group isunit">
                        <label for="exampleInputEmail1">Select Unit Type </label>
                        <select class="form-control" id="unit_type_id" name="unit_type_id">
                            <option value="0">Select Unit Type</option>
                            @if(!empty($unit))
                            @foreach($unit as $ct)
                            <option value="<?= $ct->id ?>"><?= $ct->name ?></option>
                            @endforeach
                            @endif

                        </select>
                    </div>

                    <div class="form-group isunit">
                        <label for="exampleInputEmail1"> Type Available unit</label>
                        <input type="text" class="form-control" id="unit_string" name="unit" placeholder="Type Your Unit With Comma (,) Separated">
                    </div>
                    
                    <span id="newUnitPrice"></span>

                    <div class="form-group colorcheck">

                        <input type="checkbox"  class="minimal" id="iscolor" name="iscolor" value="1"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Color Available</label>
                    </div>

                    <div class="form-group iscolor">
                        <label for="exampleInputEmail1">Select Colors </label>
                        <select id="color_id" name="color_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select Colors" style="width: 100%;">
                            @if(!empty($color))
                            @foreach($color as $ct)
                            <option value="<?= $ct->id ?>"><?= $ct->name ?></option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Image</label>
                        <input type="file" class="form-control" id="brandimage" name="brandimage" placeholder="Enter Name">
                    </div>



                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="summernote" name="description" placeholder="Enter Description"></textarea>
                    </div>
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


<!-- /.row -->
<!-- /.content -->
@endsection



@section('css')
<link rel="stylesheet" href="{{url('plugins/iCheck/all.css')}}">
<link rel="stylesheet" href="{{url('plugins/select2/select2.min.css')}}">

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" />
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<link rel="stylesheet" href="{{url('editor/summernote-master/dist/summernote.css')}}" />
@endsection

@section('js')
<script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{url('plugins/select2/select2.full.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
//$("#brandimage").kendoUpload();
         $(".sscid").fadeOut();
         $(".bid").fadeOut();
         $(".subcid").fadeOut();
         

         $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        

        $(".select2").select2();
        
        $("select[name=cid]").change(function () {

                var category_id = $(this).val();
                $.post("{{url('admin-ecom/product/filter/dextra/category')}}", {'category_id': category_id,'_token':'<?=csrf_token()?>'}, function (data) {
                    //console.log(data.status);
                    if(data.status==1)
                    {
                        if(data.layout==1)
                        {
                            $(".sscid").fadeOut();
                            $(".bid").fadeIn();
                            $(".subcid").fadeIn();
                        }
                        else if(data.layout==2)
                        {
                            $(".sscid").fadeOut();
                            $(".bid").fadeOut();
                            $(".subcid").fadeIn();
                            
                        }
                        else if(data.layout==3)
                        {
                            $(".sscid").fadeIn();
                            $(".bid").fadeIn();
                            $(".subcid").fadeIn();
                        }
                        else if(data.layout==4)
                        {
                            $(".sscid").fadeOut();
                            $(".bid").fadeIn();
                            $(".subcid").fadeIn();
                        }
                        
                    }
                    else
                    {
                        $(".sscid").fadeOut();
                        $(".bid").fadeOut();
                        $(".subcid").fadeOut();
                        
                    }
                });
        });

        
        //checking layout exist for category and brand checking  from brand
        $("select[name=bid]").change(function () {

                var category_id = $("select[name=cid]").val();
                var bid = $(this).val();
                $.post("{{url('admin-ecom/product/layout/check/brand')}}", {'category_id': category_id,'bid': bid,'_token':'<?=csrf_token()?>'}, function (data) {
                    if(data.status==1)
                    {
                        if(data.layout==1)
                        {
                            $(".sscid").fadeOut();
                            $(".subcid").fadeOut();
                        }
                        else if(data.layout==2)
                        {

                            $(".sscid").fadeOut();
                            $(".subcid").fadeIn();
                        }
                        else if(data.layout==3)
                        {

                            $(".sscid").fadeIn();
                            $(".subcid").fadeIn();
                        }                            
                        
                    }
                });
            
        });

        //checking layout exist for sub category and brand checking  from sub category
        $("select[name=scid]").change(function () {

                var category_id = $("select[name=cid]").val();
                var scid = $(this).val();
                $.post("{{url('admin-ecom/product/layout/check/scid')}}", {'category_id': category_id,'scid': scid,'_token':'<?=csrf_token()?>'}, function (data) {
                    if(data==1)
                    {

                        
                        $.post("{{url('admin-ecom/product/layout/extract/scid')}}", {'category_id': category_id,'scid': scid,'_token':'<?=csrf_token()?>'}, function (data) {
                            if(data.layout==1)
                            {
                                $(".sscid").fadeIn();
                                $.post("{{url('admin-ecom/product/filter/extra/json/category')}}", {'category_id': category_id,'sub_category_id': scid,'_token':'<?=csrf_token()?>'}, function (data) {
                                    var htmlString = '<option value="0">Please Select</option>';
                                    $.each(data, function (i, item) {
                                        console.log(item.name);
                                        htmlString += '<option value="' + item.id + '">' + item.name + '</option>';
                                    });

                                    $("select[name=sscid]").html(htmlString);

                                });
                            }
                            else if(data.layout==2)
                            {

                                $(".sscid").fadeIn();
                                $(".bid").fadeIn();

                                $.post("{{url('admin-ecom/product/filter/extra/json/category')}}", {'category_id': category_id,'sub_category_id': scid,'_token':'<?=csrf_token()?>'}, function (data) {
                                    var htmlString = '<option value="0">Please Select</option>';
                                    $.each(data, function (i, item) {
                                        console.log(item.name);
                                        htmlString += '<option value="' + item.id + '">' + item.name + '</option>';
                                    });

                                    $("select[name=sscid]").html(htmlString);

                                });
                            }
                            else if(data.layout==3)
                            {

                                $(".bid").fadeIn();
                            }
                            else if(data.layout==3)
                            {

                                $(".sscid").fadeOut();
                            }
                            //console.log(data.layout);
                        });
                                

                            
                        
                    }
                });
            
        });
        
        $("select[name=scid]").change(function () {
            var category_id = $("select[name=cid]").val();
            var sub_category_id = $(this).val();
            
            $.post("{{url('admin-ecom/product/filter/extra/category')}}", {'category_id': category_id,'sub_category_id': sub_category_id,'_token':'<?=csrf_token()?>'}, function (data) {
                if(data==1)
                {
                    $(".sscid").fadeIn();
                    $.post("{{url('admin-ecom/product/filter/extra/json/category')}}", {'category_id': category_id,'sub_category_id': sub_category_id,'_token':'<?=csrf_token()?>'}, function (data) {
                        var htmlString = '<option value="0">Please Select</option>';
                        $.each(data, function (i, item) {
                            console.log(item.name);
                            htmlString += '<option value="' + item.id + '">' + item.name + '</option>';
                        });

                        $("select[name=sscid]").html(htmlString);

                    });
                }
                else
                {
                    $(".sscid").fadeOut();
                }
            });
            
        });
        
        

        $(".is_custom_layout").fadeOut();
         $(".custom_layout_check .iCheck-helper").click(function () {
            var colorAcLayout = $(this).parent('div').attr('aria-checked');
            //alert(colorAcLayout);        
            if (colorAcLayout == 'true')
            {
                $("input[name=layout_pr_value]").val(1);
                $(".is_custom_layout").fadeIn();
            } 
            else
            {
                $(".is_custom_layout").fadeOut();
                $("input[name=layout_pr_value]").val(0);
            }
        });

        $(".isunit").fadeOut();
        $(".unitcheck .iCheck-helper").click(function () {
            var colorAc = $(this).parent('div').attr('aria-checked');
            //alert(colorAc);        
            if (colorAc == 'true')
            {
                $(".isunit").fadeIn();
            } else
            {
                $(".isunit").fadeOut();
            }
        });

        $("#unit_string").keyup(function () {
            var str = $(this).val();
            var StrArray = str.split(',');
            var strLength=StrArray.length;
            //console.log(StrArray.length);
            var proName=$("#proName").val();
            var text='';
            for (i = 0; i <strLength; i++) {
                if(StrArray[i]==null || StrArray[i]=='')
                {
                    console.log(StrArray[i]);
                }
                else
                {
                    text +='<div class="form-group"><input type="hidden" name="unit_names_param[]" value="'+proName+' '+StrArray[i]+'"><label for="exampleInputEmail1"> '+proName+' '+StrArray[i]+' </label><input type="text" class="form-control" id="exampleInputEmail1" name="unit_price[]" placeholder="Enter New Price"></div>';
                }
                //text += StrArray[i] + "<br>";
            }
            
            $("#newUnitPrice").html(text);
            
            //console.log(text);
        });

        $(".iscolor").fadeOut();
        $(".colorcheck .iCheck-helper").click(function () {
            var colorAc = $(this).parent('div').attr('aria-checked');
            //alert(colorAc);        
            if (colorAc == 'true')
            {
                $(".iscolor").fadeIn();
            } else
            {
                $(".iscolor").fadeOut();
            }
        });

        $("#cid").change(function () {
            
            var cid = $(this).val();
            if (cid == null || cid == 0)
            {
                var loadingscid = '<option value="0">Please Select Category</option>';
                $("#subcid").html(loadingscid);
            } 
            else
            {
                var loadingscid = '<option value="0">Loading Please Wait...</option>';
                $("#subcid").html(loadingscid);
                $.post("./product-filter-subcat-data", {'cid': cid, '_token': '<?php echo csrf_token(); ?>'}, function (cdata) {
                    //console.log(cdata);
                    var loadingscid = '<option value="0">Please Select Sub Category</option>';
                    $.each(cdata, function (index, val) {
                        //console.log(val);
                        loadingscid += '<option value="' + val.id + '">' + val.name + '</option>';
                    });
                    var getlength = cdata.length;
                    //console.log(getlength);
                    if (getlength == 0)
                    {
                        var loadingscid = '<option value="0">Please Select Another Category</option>';
                        $("#subcid").html(loadingscid);
                    } else
                    {
                        $("#subcid").html(loadingscid);
                    }
//                    if(cdata==null)
//                    {
//                        var loadingscid = '<option value="0">Please Select Category</option>';
//                        $("#subcid").html(loadingscid);
//                    }
//                    else
//                    {
//                        $("#subcid").html(cdata);
//                    }
                });
            }
        });
    });
</script>

<script type="text/javascript" src="{{url('editor/summernote-master/dist/summernote.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".summernote").summernote({
            height: 300,
            tabsize: 2
        });
    });
</script>

@endsection