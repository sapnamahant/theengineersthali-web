@include('layouts.header')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Product</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('product')}}">Products</a>
                            </li>
                            @if(isset($product))
                            <li class="breadcrumb-item"><a href="#">Edit Product</a></li>
                            @else
                            <li class="breadcrumb-item"><a href="#">Add Product</a></li>
                            @endif
                            
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Simple Validation start -->
            <section class="simple-validation">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                @if(isset($product))
                                <h4 class="card-title">Edit Product</h4>
                                @else
                                <h4 class="card-title">Add Product</h4>
                                @endif
                            </div>
                            <div class="card-body">
                                <form id="jquery-val-form" method="post" action="{{route('add-product')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Title</label>
                                        <input type="text" class="form-control" value="@if(isset($product)){{$product->title}}@endif" id="basic-default-name" name="title" placeholder="Title" required />
                                        <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-mobile">Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option>--Select Category--</option>
                                            @foreach($categories as $item)
                                            <option value="{{$item->id}}" @if(isset($product) && ($product->category == $item->id)){{'selected'}}@endif>{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-email">Description</label>
                                        <textarea type="text" id="basic-default-email" value="" name="description" class="form-control">@if(isset($product)){{$product->description}}@endif</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-amount">Amount</label>
                                                <input type="text" class="form-control" value="@if(isset($product)){{$product->amount}}@endif" id="basic-default-amount" name="amount" placeholder="Amount" />
                                                <span class="text-danger">@error('amount') {{ $message }} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-brand">Brand</label>
                                                <input type="text" class="form-control" value="@if(isset($product)){{$product->brand}}@endif" id="basic-default-brand" name="brand" placeholder="Brand" />
                                                <span class="text-danger">@error('brand') {{ $message }} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-color">Color</label>
                                                <input type="text" class="form-control" value="@if(isset($product)){{$product->color}}@endif" id="basic-default-color" name="color" placeholder="Color" />
                                                <span class="text-danger">@error('color') {{ $message }} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-size">Size</label>
                                                <input type="text" class="form-control" value="@if(isset($product)){{$product->size}}@endif" id="basic-default-size" name="size" placeholder="Size" />
                                                <span class="text-danger">@error('size') {{ $message }} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-image">Image</label>
                                        <input type="file" class="form-control" id="basic-default-image" name="image" />
                                        @if(isset($product))
                                        <img src="{{asset('images/'.$product->image)}}" class="mt-2" width="100" alt="">
                                        @endif
                                        <span class="text-danger">@error('image') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-image2">Image2 (Multiple)</label>
                                        <input type="file" class="form-control" id="basic-default-image2" name="image2[]" multiple />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-mobile">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" @if(isset($product) && $product->status ==1){{'selected'}}@endif>Active</option>
                                            <option value="0" @if(isset($product) && $product->status ==0){{'selected'}}@endif>De-Active</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id" value="@if(isset($product)){{$product->id}}@endif">
                                    <div class="row">
                                        <div class="col-12">
                                            @if(isset($product))
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            @else
                                            <button type="submit" class="btn btn-primary">Add</button>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Input Validation end -->

        </div>
    </div>
</div>
    <!-- END: Content-->
    @if(Session::get('message'))
   <script>
       Swal.fire({
        title: 'Success',
        text: 'Product updated successfully',
        icon: 'success',
        confirmButtonText: 'Ok'
        });
   </script>
   @endif

@include('layouts.footer')