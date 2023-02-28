@include('layouts.header')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Expense</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('expenses')}}">Expense</a>
                            </li>
                            @if(isset($expense))
                            <li class="breadcrumb-item"><a href="#">Edit Expense</a></li>
                            @else
                            <li class="breadcrumb-item"><a href="#">Add Expense</a></li>
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
                                @if(isset($expense))
                                <h4 class="card-title">Edit Expense</h4>
                                @else
                                <h4 class="card-title">Add Expense</h4>
                                @endif
                            </div>
                            <div class="card-body">
                                <form id="jquery-val-form" method="post" action="{{route('add-expense')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Title</label>
                                        <input type="text" class="form-control" value="@if(isset($expense)){{$expense->title}}@endif" id="basic-default-name" name="title" placeholder="Title" required />
                                        <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea type="text" id="description" value="" name="description" class="form-control">@if(isset($expense)){{$expense->description}}@endif</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-amount">Amount</label>
                                                <input type="text" class="form-control" value="@if(isset($expense)){{$expense->amount}}@endif" id="basic-default-amount" name="amount" placeholder="Amount" />
                                                <span class="text-danger">@error('amount') {{ $message }} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-amount">Expense Date</label>
                                                <input type="date" class="form-control" value="@if(isset($expense)){{$expense->expense_date}}@endif" id="basic-default-amount" name="expense_date" placeholder="Expense Date" />
                                                <span class="text-danger">@error('expense_date') {{ $message }} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="@if(isset($expense)){{$expense->id}}@endif">
                                    <div class="row">
                                        <div class="col-12">
                                            @if(isset($expense))
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
        text: 'Expense updated successfully',
        icon: 'success',
        confirmButtonText: 'Ok'
        });
   </script>
   @endif

@include('layouts.footer')
