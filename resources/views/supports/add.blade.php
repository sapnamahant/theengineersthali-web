@include('layouts.header')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Support</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('supports')}}">Support</a>
                            </li>
                            @if(isset($supports))
                            <li class="breadcrumb-item"><a href="#">Edit Support</a></li>
                            @else
                            <!-- <li class="breadcrumb-item"><a href="#">Add Notification</a></li> -->
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
                                @if(isset($support))
                                <h4 class="card-title">Edit Support</h4>
                                @else
                                <!-- <h4 class="card-title">Add Notification</h4> -->
                                @endif
                            </div>
                            <div class="card-body">
                                <form id="jquery-val-form" method="post" action="{{route('edit-support')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="data">Supports</label>
                                        <!-- <textarea type="text" id="description1" rows="5" value="" name="message" class="form-control">@if(isset($notification)){{$notification->message}}@endif</textarea> -->
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-email">Email</label>
                                        <input type="email" class="form-control" value="@if(isset($supports)){{$supports->email}}@endif" id="basic-default-email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-address">Addrses</label>
                                        <input type="textarea" class="form-control" value="@if(isset($supports)){{$supports->address}}@endif" id="basic-default-address" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-mobile">Mobile</label>
                                        <input type="number" class="form-control" value="@if(isset($supports)){{$supports->mobile}}@endif" id="basic-default-mobile" name="mobile">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-privacy_policy">Privacy Policy</label>
                                        <textarea type="text" id="basic-default-privacy_policy" value="" name="privacy_policy" class="form-control">@if(isset($policy)){{$policy->privacy_policy}}@endif</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="terms_and_condition">Terms and Condition</label>
                                        <textarea type="text" id="basic-default-terms_and_condition" name="terms_and_condition" value="" name="terms_and_condition" class="form-control">@if(isset($policy)){{$policy->terms_and_condition}}@endif</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-about">About</label>
                                        <textarea type="text" id="basic-default-about" value="" name="about" class="form-control">@if(isset($policy)){{$policy->about}}@endif</textarea>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
<script>
    CKEDITOR.replace('basic-default-privacy_policy');
    CKEDITOR.replace('basic-default-terms_and_condition');
    CKEDITOR.replace('basic-default-about');
</script>
@if(Session::get('message'))
<script>
    Swal.fire({
        title: 'Success',
        text: 'Data updated successfully',
        icon: 'success',
        confirmButtonText: 'Ok'
    });
</script>
@endif



@include('layouts.footer')
