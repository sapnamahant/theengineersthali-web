@include('layouts.header')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Profile</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Profile</a>
                            </li>
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
                                <h4 class="card-title">Profile</h4>
                            </div>
                            <div class="card-body">
                                <form id="jquery-val-form" method="post" action="{{route('update-profile')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Name</label>
                                        <input type="text" class="form-control" value="{{$user->name}}" id="basic-default-name" name="name" placeholder="John Doe" />
                                        <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-email">Email</label>
                                        <input type="text" id="basic-default-email" value="{{$user->email}}" name="email" class="form-control" placeholder="john.doe@email.com" />
                                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-mobile">Mobile</label>
                                        <input type="text" id="basic-default-mobile" value="{{$user->mobile}}" name="mobile" class="form-control" placeholder="9876543210" />
                                        <span class="text-danger">@error('mobile') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-password">Password</label>
                                        <input type="password" id="basic-default-password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Update</button>
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
        text: 'Successfully updated profile',
        icon: 'success',
        confirmButtonText: 'Ok'
        });
   </script>
   @endif

@include('layouts.footer')
