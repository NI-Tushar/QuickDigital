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
        @if (Session::has('success_message'))
        <div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Well done!</strong> {{ Session::get('success_message') }}
        </div>
        @endif
        <div class="content-body">
            <section id="column">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @if($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                <a href="{{ url('admin/add-edit-product') }}"><button type="button" class="btn btn-secondary btn-min-width mr-1 mb-1"><i class="feather icon-edit"></i> Add Product</button></a>
                                @endif
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    @if(count($products) > 0)
                                    <table id="product" class="table table-striped table-bordered custom-toolbar-elements">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAME</th>
                                                <th>CATEGORY</th>
                                                <th>ACTUAL PRICE</th>
                                                <th>DISCOUNT PRICE</th>
                                                <th>HEADLINE</th>
                                                <th>FEATURES</th>
                                                <th>IMAGE 1</th>
                                                <th>IMAGE 2</th>
                                                <th>IMAGE 3</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product['id'] }}</td>
                                                <td>{{ $product['name'] }}</td>
                                                <td>{{ $product['category']['name'] }}</td>
                                                <td>{{ $product['actual_price'] }}</td>
                                                <td>{{ $product['discount_price'] }}</td>
                                                <td>{{ $product['headline_1'] }}</td>
                                                <td>
                                                    @if(isset($product['features']))
                                                        @foreach(json_decode($product['features']) as $feature)
                                                            <p>{{ $feature }}</p>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td><img src="{{ asset($product['image_1']) }}" alt="image1" style="width:50px; height:50px;"></td>
                                                <td><img src="{{ asset($product['image_2']) }}" alt="image2" style="width:50px; height:50px;"></td>
                                                <td><img src="{{ asset($product['image_3']) }}" alt="image3" style="width:50px; height:50px;"></td>
                                                <td>
                                                    @if($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                                    <a href="{{ url('admin/add-edit-product/'.$product['id']) }}"><i class="fa fa-edit"></i></a>
                                                    &nbsp;&nbsp;
                                                    @endif
                                                    @if($pagesModule['full_access']==1)
                                                    <a href="{{ url('admin/delete-product/'.$product['id']) }}" onclick="return confirm('Are you sure you want to delete this product?');"><i class="fa fa-trash"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAME</th>
                                                <th>CATEGORY</th>
                                                <th>ACTUAL PRICE</th>
                                                <th>DISCOUNT PRICE</th>
                                                <th>HEADLINE</th>
                                                <th>FEATURES</th>
                                                <th>IMAGE 1</th>
                                                <th>IMAGE 2</th>
                                                <th>IMAGE 3</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @else
                                    <div class="alert alert-warning" role="alert">
                                        Still there is no Product, please add category first and then products.
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#product').DataTable();
    });
</script>
@endsection
