@extends('admin.layout.layout')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">PRODUCT LIST</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Product List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('success'))
        <div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Well done!</strong> {{ Session::get('success') }}
        </div>
        @endif
        <div class="content-body">
            <section id="column">
                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header">
                                <!-- Button trigger modal -->
                                <a href="{{ route('quick-shopping-product.create') }}" class="btn btn-primary">
                                    Add New Product
                                </a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>
                                                    <img width="50px" height="50px" src="{{ asset($product->thumbnail_image) }}" alt="">
                                                </td>
                                                <td>{!! Str::limit($product->name, 50) !!}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>
                                                    @foreach ($product->variations as $variation)
                                                        <div style="text-transform: uppercase">{{ $variation->color }} {{ $variation->size }} - {{ $variation->qty }}</div>
                                                    @endforeach
                                                    <b>Total: {{ $product->qty }}</b>
                                                </td>
                                                <td>
                                                    <div class="d-flex" style="gap: 1em">
                                                        <a href="{{ route('quick-shopping-product.edit', $product->slug) }}" class="btn btn-sm btn-info">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('quick-shopping-product.destroy', $product->slug) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="show_confirm btn btn-sm btn-danger"
                                                                data-toggle="tooltip" title='Delete'>
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
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
            </section>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        $('.editProduct').click(function(event) {

            var categoryId = $(this).data("id");

            $.ajax({
                url: '/admin/quick-shopping-category/' + categoryId + '/' + 'edit'
                , type: 'GET'
                , dataType: 'json'
                , success: function(res) {
                    $('#editId').val(res.id);
                    $('#editName').val(res.name);
                }
                , error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('.show_confirm').click(function(event) {
            event.preventDefault(); // Prevent form submission

            var form = $(this).closest("form"); // Get the closest form

            Swal.fire({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel",
                dangerMode: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if the user confirms
                }
            });
        });
    </script>
@endpush
