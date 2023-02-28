@include('layouts.header')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Category</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('category')}}">Categories</a>
                            </li>
                            @if(isset($category))
                            <li class="breadcrumb-item"><a href="#">Edit Category</a></li>
                            @else
                            <li class="breadcrumb-item"><a href="#">Add Category</a></li>
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
                                @if(isset($category))
                                <h4 class="card-title">Edit Category</h4>
                                @else
                                <h4 class="card-title">Add Category</h4>
                                @endif
                            </div>
                            <div class="card-body">
                                <form id="jquery-val-form" method="post" action="{{route('add-category')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Title</label>
                                        <input type="text" class="form-control" value="@if(isset($category)){{$category->title}}@endif" id="basic-default-name" name="title" placeholder="Title" required />
                                        <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-email">Description</label>
                                        <textarea type="text" id="basic-default-email" value="" name="description" class="form-control">@if(isset($category)){{$category->description}}@endif</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-mobile">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" @if(isset($category) && $category->status ==1){{'selected'}}@endif>Active</option>
                                            <option value="0" @if(isset($category) && $category->status ==0){{'selected'}}@endif>De-Active</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id" value="@if(isset($category)){{$category->id}}@endif">
                                    <div class="row">
                                        <div class="col-12">
                                            @if(isset($category))
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
        text: 'Category updated successfully',
        icon: 'success',
        confirmButtonText: 'Ok'
        });
   </script>
   @endif

@include('layouts.footer')