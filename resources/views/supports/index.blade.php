@include('layouts.header')

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
                            <li class="breadcrumb-item active">Support
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
                                <h4 class="card-title">Supports</h4>
                                <!-- <div class="heading-elements">
                                    <a href="{{route('addNotification')}}" class="btn btn-primary">Add Notification <i class="bx bx-plus-circle"></i></a>
                                </div> -->
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Mobile</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- @php $s=0; @endphp
                                            @foreach($supports as $item)
                                            @php $s++; @endphp -->
                                            <tr>

                                                <!-- <td>{{$s}}</td> -->
                                                <td>1</td>
                                                <td><?= ucfirst($item->message) ?>kausarnoorain@gmail.com</td>
                                                <td>Bhilai</td>
                                                <td>9340227037</td>
                                                <!-- <td>{{date('h:i A M jS,Y',strtotime($item->created_at))}}</td> -->
                                               
                                            </tr>
                                            <tr>
                                            <td><a href="{{route('edit-support',base64_encode($item->id))}}" class="btn btn-primary">Update</td></a>
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


<!-- <script>
    $('#dataTable').DataTable();

    function destroy(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this data!",
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
</script> -->

<!-- @if(Session::get('message'))
<script>
    Swal.fire(
        'Deleted!',
        'Data has been deleted.',
        'success'
    )
</script>
@endif
 -->
@include('layouts.footer')