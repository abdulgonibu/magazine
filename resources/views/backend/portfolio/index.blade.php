@extends('backend.layouts.master')
@section('admin-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Magazine</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <section class="col-sm-12">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3> Add Magazine Image
                                <a class="btn btn-success float-right btn-sm" href="{{ route('magazines.show')}}"><i
                                        class="fa fa-list"></i> Magazine List</a>
                            </h3>
                        </div><!-- /.card-body -->
                        <div class="card-body">
                            <form method="post" action="{{ route('magazines.store')}}" id="myForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">

                                    <div class="mb-3 col-md-6"> <label for="name" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" id="name"
                                            placeholder="Enter Magazine Title">
                                    </div>
                                    <div class="mb-3 col-md-6"> <label for="name" class="form-label">Url
                                            (optional)</label>
                                        <input type="text" class="form-control" name="url" id="name"
                                            placeholder="Enter Magazine url">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="mb-3 col-md-6"> <label for="editor"
                                            class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="editor"
                                            rows="3"></textarea>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <h1>Image</h1>
                                        <p>Recommended thumbnail size 800x400 (px). <br>
                                            <input type="file" name="image" class="dropify" data-height="250" />
                                        </p>
                                    </div>


                                    <br /><br /><br />

                                    <div class="form-group col-md-6">
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                    </div>

                                </div>

                            </form>

                        </div>
                    </div>

                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">
            </div>
        </div>
    </section>
    <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>

</div>


@endsection