@extends('backend.app')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">SIS</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                    <li class="breadcrumb-item active">Product Update</li>
                </ol>
            </div>
            <h4 class="page-title">Product Update</h4>
        </div>
    </div>
</div>   
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.products.update',[$item->id])}}" id="ajax_form">
                    @csrf
                     {{ method_field('PATCH') }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label  class="form-label">Product Name</label>
                                <input type="text" name="name" value="{{$item->name}}" class="form-control" placeholder="Product Name">
                            </div>

                            <div class="mb-3">
                                <label for="example-email" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="example-email" class="form-label">Optional Image</label>
                                <input type="file" name="optional_image" class="form-control">
                            </div>


                            <div class="mb-3">
                                <label  class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="5">{!! $item->description !!}</textarea>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label  class="form-label">Product Category</label>
                                <select class="form-select" name="category_id">
                                    <option value="">Select One</option>
                                    @foreach($cats as $cat)
                                    <option value="{{$cat->id}}" {{$cat->id == $item->category_id ?'selected':''}}> {{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label  class="form-label">Productn Purchase Price</label>
                                <input type="text" name="purchase_price" value="{{$item->purchase_price}}" class="form-control" placeholder="Productn Purchase Price">
                            </div>

                            <div class="mb-3">
                                <label  class="form-label">Productn sell Price</label>
                                <input type="text" name="sell_price" value="{{$item->sell_price}}" class="form-control" placeholder="Productn sell Price">
                            </div>

                            <div class="mb-3">
                                <label  class="form-label" style="width:50%;">Productn Sizes</label>
                                <select class="js-example-basic-multiple" name="size_id[]" multiple="multiple">
                                    @foreach($sizes as $s)

                                    @php
                                    $check=$item->sizes()->where('size_id', $s->id)->first();
                                    @endphp
                                    <option value="{{$s->id}}" {{$check?'selected':''}}> {{$s->title}} </option>
                                    @endforeach
                                </select>
                            </div>


                            
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label  class="form-label">Product Body</label>
                                <textarea class="form-control" name="body" rows="5">{!! $item->body !!}</textarea>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>

                </form>
       
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection 

@push('js')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    CKEDITOR.replace('body', {
        filebrowserUploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

</script>

@endpush