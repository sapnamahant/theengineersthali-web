@include('layouts.header')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Notification</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('notifications')}}">Notification</a>
                            </li>
                            @if(isset($notification))
                            <li class="breadcrumb-item"><a href="#">Edit Notification</a></li>
                            @else
                            <li class="breadcrumb-item"><a href="#">Add Notification</a></li>
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
                                @if(isset($notification))
                                <h4 class="card-title">Edit Notification</h4>
                                @else
                                <h4 class="card-title">Add Notification</h4>
                                @endif
                            </div>
                            <div class="card-body">
                                <form id="jquery-val-form" method="post" action="{{route('add-notification')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="description1">Notifications</label>
                                        <textarea type="text" id="description1" rows="5" value="" name="message" class="form-control">@if(isset($notification)){{$notification->message}}@endif</textarea>
                                    </div>                                  
                                    <input type="hidden" name="id" value="@if(isset($notification)){{$notification->id}}@endif">
                                    <div class="row">
                                        <div class="col-12">
                                            @if(isset($notification))
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
    CKEDITOR.replace( 'description1' );
</script>
    @if(Session::get('message'))
   <script>
       Swal.fire({
        title: 'Success',
        text: 'Notification updated successfully',
        icon: 'success',
        confirmButtonText: 'Ok'
        });
   </script>
   @endif
   <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
   <script>
    var socket = io.connect('http://localhost:8890');
    socket.on('message', function (data) {
        data = jQuery.parseJSON(data);
        console.log(data.user);
        $( "#messages" ).append( "<strong>"+data.user+":</strong><p>"+data.message+"</p>" );
      });
   
</script>
@include('layouts.footer')
