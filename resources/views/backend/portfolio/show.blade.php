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
        <section class="col-sm-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3> Magazine List
                        <a class="btn btn-success float-right btn-sm" href="{{ route('magazines.view') }}"><i
                                class="fa fa-plus-circle"></i>Add Magazine</a>
                    </h3>
                </div><!-- /.card-body -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Description</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($portfolies as $key => $Magazine)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $Magazine->category->name }}</td>
                                    <td>{{ $Magazine->url }}</td>

                                    

                                    <td>
                                        <img src="{{ Storage::url($Magazine->image) }}" alt="" srcset=""
                                            width="50" />
                                    </td>

                                    <td>
                                        <div dangerouslySetInnerHTML=__html:> <?php echo $Magazine->description; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('magazines.edit', $Magazine->id) }}"
                                            class="btn btn-sm btn-primary" title="edit"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('magazines.delete', $Magazine->id) }}" id="delete"
                                            class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>
            </div>
    </div>
    </section>
    <!-- right col -->
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>

    </div>

    <script type="text/javascript">
        $(document).ready(function() {
                    $('#myForm').validate({
                        rules: {
                            usertype: {
                                required: true,
                            },
                            name: {
                                required: true,
                            },


                            email: {
                                required: true,
                                email: true,
                            },

                            password: {
                                required: true,
                                minlength: 5
                            },
                            password2: {
                                required: true,
                                equalTo: '#password'
                            },

                            messages: {

                                usertype: {
                                    required: "Please Select a Roll",

                                },

                                name: {
                                    required: "Please enter a Name",

                                },

                                email: {
                                    required: "Please enter a email address",

                                },
                                password: {
                                    required: "Please provide a password",
                                    minlength: "Your password must be at least 5 characters long"
                                },
                                password2: {
                                    required: "Please provide a Confirm password",
                                    equalTo: "Your password must be at least 5 characters long"
                                },

                                errorElement: 'span',
                                errorPlacement: function(error, element) {
                                    error.addClass('invalid-feedback');
                                    element.closest('.form-group').append(error);
                                },
                                highlight: function(element, errorClass, validClass) {
                                    $(element).addClass('is-invalid');
                                },
                                unhighlight: function(element, errorClass, validClass) {
                                    $(element).removeClass('is-invalid');
                                }
                            });
                    });
    </script>
@endsection
