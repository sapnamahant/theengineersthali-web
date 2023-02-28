@include('layouts.header')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Menus</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Menus
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
                                <h4 class="card-title">Menus</h4>
                                <div class="heading-elements">
                                    <a href="{{route('addMenu')}}" class="btn btn-primary">Add Menu <i class="bx bx-plus-circle"></i></a>
                                </div>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <th>weekly</th>
                                                <th>fortnight</th>
                                                <th>Status</th>
                                                <th>Created at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($menus as $item)
                                            <tr>
                                                <td><img src="{{asset('images/'.$item->image)}}" width="100" alt=""></td>
                                                <td>{{ucfirst($item->title)}}</td>
                                                <td>{{$item->category}}</td>
                                                <td>{!!$item->description!!}</td>
                                                <td>{{$item->amount}}</td>
                                                <td>{{$item->weekly}}</td>
                                                <td>{{$item->fortnight}}</td>
                                                <td>@if($item->status == 1){{'Active'}}@else{{'Deactive'}}@endif</td>
                                                <td>{{date('h:i A M jS,Y',strtotime($item->created_at))}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{route('edit-menu',base64_encode($item->id))}}"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                                            <a class="dropdown-item" onclick="destroy('{{route('menu.destroy',base64_encode($item->id))}}')" href="javascript:void(0);"><i class="bx bx-trash mr-1"></i> delete</a>
                                                        </div>
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

    function destroy(url){
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this menu!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
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
        'Deleted!',
        'Menu has been deleted.',
        'success'
    )
</script>
@endif

@include('layouts.footer')
