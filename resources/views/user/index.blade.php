@include('layouts.header')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Users</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Users
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content-body">
            <!-- Zero configuration table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Users</h4>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Status</th>
                                                <th>Created at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $item)
                                            <tr>
                                                <td>{{ucfirst($item->name)}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->mobile}}</td>
                                                <td>@if($item->status == 1){{'Active'}}@else{{'Deactive'}}@endif</td>
                                                <td>{{date('h:i A M jS,Y',strtotime($item->created_at))}}</td>
                                                <td>
                                                    <div class="custom-control custom-switch custom-control-inline">
                                                        @if($item->status == 1)
                                                        <a onchange="updateStatus('{{route('user.update-status',base64_encode($item->id))}}')" href="javascript:void(0);">
                                                            <input type="checkbox" class="custom-control-input" value="1" checked id="accountSwitch{{$item->id}}">
                                                            <label class="custom-control-label mr-1" for="accountSwitch{{$item->id}}"></label>
                                                        </a>
                                                        @else
                                                        <a onchange="updateStatus('{{route('user.update-status',base64_encode($item->id))}}')" href="javascript:void(0);">
                                                            <input type="checkbox" class="custom-control-input" value="0" id="accountSwitch{{$item->id}}">
                                                            <label class="custom-control-label mr-1" for="accountSwitch{{$item->id}}"></label>
                                                        </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Zero configuration table -->
        </div>
    </div>
</div>



<script>
    $('#dataTable').DataTable();

    function updateStatus(url){
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to change status of this user!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = url;
            }
        })
    }
</script>

@if(Session::get('message'))
<script>
    Swal.fire(
        'Updated!',
        'Status has been updated.',
        'success'
    )
</script>
@endif

@include('layouts.footer')