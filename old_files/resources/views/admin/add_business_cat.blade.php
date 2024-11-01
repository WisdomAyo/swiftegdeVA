@extends('admin.content')
@section('content')


    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Add A Business Category</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="item"><a href="">Dashboard</a></li>
            <li class="item">Business Category</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Post a New Job Area -->


    <div class="col-md-12">

        @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h5>Add Category</h5>

                <form role="form" method="post" class="validate"  action="{{ route('admin.add.business.cat.save')}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}


                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="example-text-input-floating"  name="category_name" placeholder="Enter Language Name">
                        <label class="form-label" for="example-text-input-floating">Category Name</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="file" class="form-control" placeholder="Service Title Here" name="icon" required="required">
                        <label class="form-label" for="register4-firstname">Category Icon</label>
                    </div>

                    <button type="submit" class="default-btn"><i class="flaticon-plus"></i> Add Category</button>
                </form>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5>Add Sub Category</h5>

                <form role="form" method="post" class="validate"  action="{{ route('admin.add.business.cat.save')}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}


                    <div class="form-floating mb-4">
                        <select name="assoc_category" class="form-control" required="required">
                            <option>Select Main category</option>
                            @foreach($category as $row)
                                <option value="{{$row->id}}">{{$row->title}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="example-text-input-floating"  name="category_name" placeholder="Enter Language Name">
                        <label class="form-label" for="example-text-input-floating">Category Name</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="file" class="form-control" placeholder="Service Title Here" name="icon" required="required">
                        <label class="form-label" for="register4-firstname">Category Icon</label>
                    </div>

                    <button type="submit" class="default-btn"><i class="flaticon-plus"></i> Add Category</button>
                </form>

            </div>
        </div>
    </div>


@endsection
