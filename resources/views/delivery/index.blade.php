@include('layouts.header')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Delivery Report</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Delivery Report
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
                                <h4 class="card-title">Delivery Report</h4>
                                <div class="heading-elements">
                                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add <i class="bx bx-plus-circle"></i></a>
                                </div>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Date</th>
                                                <th>User</th>
                                                <!-- <th>Break Fast</th> -->
                                                <th>Lunch</th>
                                                <th>Dinner</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $check = '<i class="text-success bx bx-check"></i>';
                                                 $uncheck = '<i class="text-danger bx bx-block"></i>';
                                                 $s=1;
                                            @endphp
                                            @foreach($deliveries as $item)
                                            <tr>
                                                <td>{{$s++}}</td>
                                                <td>{{date('jS M,Y',strtotime($item->date))}}</td>
                                                <td>{{ucfirst($item->user)}}</td>
                                                <!-- <td><?php if($item->break_fast == 1){ echo $check; }else{ echo $uncheck; } ?></td> -->
                                                <td><?php if($item->lunch == 1){ echo $check; }else{ echo $uncheck; } ?></td>
                                                <td><?php if($item->dinner == 1){ echo $check; }else{ echo $uncheck; } ?></td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delivery Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('update-delivery')}}" class="form" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <input type="date" class="form-control" name="date" required>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <!-- <th>Break Fast</th> -->
                        <th>Lunch</th>
                        <th>Dinner</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $item)
                    <tr class="text-center">
                        <td>{{$item->user}}</td>
                        <!-- <td><input type="checkbox" name="break_fast[]" value="break_fast-{{$item->id}}" @if(isset($item->delivery_user->break_fast) && $item->delivery_user->break_fast==1) {{'checked'}} @endif class="form-check-input"></td> -->
                        <td><input type="checkbox" name="lunch[]" value="lunch-{{$item->id}}" @if(isset($item->lunch) && $item->lunch==1) {{'checked'}} @endif class="form-check-input"></td>
                        <td><input type="checkbox" name="dinner[]" value="dinner-{{$item->id}}" @if(isset($item->dinner) && $item->dinner==1) {{'checked'}} @endif class="form-check-input"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end align-content-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    $('#dataTable').DataTable();

    function destroy(url){
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this category!",
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
    Swal.fire({
        title: 'Success',
        text: 'Delivery updated successfully',
        icon: 'success',
        confirmButtonText: 'Ok'
    });
</script>
@endif

@include('layouts.footer')
