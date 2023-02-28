@include('layouts.header')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Products</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Products
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
                                <h4 class="card-title">Products</h4>
                                <div class="heading-elements">
                                    <a href="{{route('addProduct')}}" class="btn btn-primary">Add Product <i class="bx bx-plus-circle"></i></a>
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
                                                <th>Status</th>
                                                <th>Created at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $item)
                                            <tr>
                                                <td><img src="{{asset('images/'.$item->image)}}" width="100" alt=""></td>
                                                <td>{{ucfirst($item->title)}}</td>
                                                <td>{{$item->category}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>{{$item->amount}}</td>
                                                <td>@if($item->status == 1){{'Active'}}@else{{'Deactive'}}@endif</td>
                                                <td>{{date('h:i A M jS,Y',strtotime($item->created_at))}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{route('edit-product',base64_encode($item->id))}}"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"  data-toggle="modal" data-target="#exampleModal{{$item->id}}"><i class="bx bx-info-circle mr-1"></i> view</a>
                                                            <a class="dropdown-item" onclick="destroy('{{route('product.destroy',base64_encode($item->id))}}')" href="javascript:void(0);"><i class="bx bx-trash mr-1"></i> delete</a>
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

<!-- Modal -->
@foreach($products as $item)
<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ucfirst($item->title)}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('images/'.$item->image)}}" class="d-block w-100" alt="...">
                        </div>
                        @for($i=0; $i<count($product_images); $i++)
                        @if($product_images[$i]['productId'] == $item->id)
                        <div class="carousel-item">
                            <img src="{{asset('images/'.$product_images[$i]['image'])}}" class="d-block w-100" alt="...">
                        </div>
                        @endif
                        @endfor
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <h3 class="mt-2">{{ucfirst($item->title)}}</h3>
                <h5>{{substr($item->description,0,75)}}...</h5>
                <p><b>Brand: </b>{{$item->brand}}</p>
                <p><b>Size: </b>{{$item->size}}</p>
                <p><b>Color: </b>{{$item->color}}</p>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="{{route('edit-product',base64_encode($item->id))}}" class="btn btn-primary">Edit</a>
      </div>
    </div>
  </div>
</div>
@endforeach

<script>
    $('#dataTable').DataTable();

    function destroy(url){
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this product!",
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
        'Product has been deleted.',
        'success'
    )
</script>
@endif

@include('layouts.footer')