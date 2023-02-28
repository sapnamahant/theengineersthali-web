@include('layouts.header')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Menu</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('menus')}}">Menu</a>
                            </li>
                            @if(isset($menu))
                            <li class="breadcrumb-item"><a href="#">Edit Menu</a></li>
                            @else
                            <li class="breadcrumb-item"><a href="#">Add Menu</a></li>
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
                                @if(isset($menu))
                                <h4 class="card-title">Edit Menu</h4>
                                @else
                                <h4 class="card-title">Add Menu</h4>
                                @endif
                            </div>
                            <div class="card-body">
                                <form id="jquery-val-form" method="post" action="{{route('add-menu')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Title</label>
                                        <input type="text" class="form-control" value="@if(isset($menu)){{$menu->title}}@endif" id="basic-default-name" name="title" placeholder="Title" required />
                                        <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-mobile">Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option>--Select Category--</option>
                                            @foreach($categories as $item)
                                            <option value="{{$item->id}}" @if(isset($menu) && ($menu->category_id == $item->id)){{'selected'}}@endif>{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="description1">Description</label>
                                        <textarea type="text" id="description1" rows="5" value="" name="description" class="form-control">@if(isset($menu)){{$menu->description}}@endif</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-amount">30 days Amount</label>
                                                <input type="text" class="form-control" value="@if(isset($menu)){{$menu->amount}}@endif" id="basic-default-amount" name="amount" placeholder="Amount" />
                                                <span class="text-danger">@error('amount') {{ $message }} @enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-fortnight">15 Days Amount</label>
                                                <input type="text" class="form-control" value="@if(isset($menu)){{$menu->fortnight}}@endif" id="basic-default-fortnight" name="fortnight" placeholder="fortnight package" />
                                                <span class="text-danger">@error('fortnight') {{ $message }} @enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-weekly">7 Days Amount</label>
                                                <input type="text" class="form-control" value="@if(isset($menu)){{$menu->weekly}}@endif" id="basic-default-weekly" name="weekly" placeholder="weekly package" />
                                                <span class="text-danger">@error('weekly') {{ $message }} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-image">Image</label>
                                        <input type="file" class="form-control" id="basic-default-image" name="image" />
                                        @if(isset($menu))
                                        <img src="{{asset('images/'.$menu->image)}}" class="mt-2" width="100" alt="">
                                        @endif
                                        <span class="text-danger">@error('image') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-mobile">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" @if(isset($menu) && $menu->status ==1){{'selected'}}@endif>Active</option>
                                            <option value="0" @if(isset($menu) && $menu->status ==0){{'selected'}}@endif>De-Active</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id" value="@if(isset($menu)){{$menu->id}}@endif">
                                    <div class="row">
                                        <div class="col-12">
                                            @if(isset($menu))
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
<script>
    CKEDITOR.replace( 'description' );
</script>
    @if(Session::get('message'))
   <script>
       Swal.fire({
        title: 'Success',
        text: 'Menu updated successfully',
        icon: 'success',
        confirmButtonText: 'Ok'
        });
   </script>
   @endif

@include('layouts.footer')
