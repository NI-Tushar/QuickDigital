@extends('admin.layout.layout')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">{{ $title }}</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/products') }}">Products</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <section id="column">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
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
                                <div class="card-body">

                                    <div class="card-text">
                                        <p>“You Can Change What You Do, But You Can’t Change What You Want.” <code>~Thomas Shelby</code> </p>
                                    </div>
                                    @if (Session::has('error_message'))
                                    <div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>Oh snap! </strong>{{ Session::get('error_message') }}
                                    </div>
                                    @endif
                                    @if (Session::has('success_message'))
                                    <div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>Well done!</strong> {{ Session::get('success_message') }}
                                    </div>
                                    @endif
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form name="product" id="productForm" @if(empty($product['id'])) action="{{ url('admin/add-edit-product') }}" @else action="{{ url('admin/add-edit-product/'.$product['id']) }}" @endif method="POST" enctype="multipart/form-data">@csrf
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label for="name">NAME</label>
                                                <input type="text" id="name" class="form-control round" placeholder="Enter Product Name" name="name" @if(!empty($product['name'])) value="{{ old('name', $product['name']) }}" @endif>
                                            </div>

                                            <div class="form-group">
                                                <label for="category_id">Category</label>
                                                <select id="category_id" class="form-control round" name="category_id">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $categoryId => $categoryName)
                                                    <option value="{{ $categoryId }}" @if(old('category_id', $product['category_id'] ?? '') == $categoryId) selected @endif>{{ $categoryName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="actual_price">Actual Price</label>
                                                <input type="number" id="actual_price" class="form-control round" placeholder="Enter Product Actual Price" name="actual_price" @if(!empty($product['actual_price'])) value="{{ old('actual_price', $product['actual_price']) }}" @endif>
                                            </div>

                                            <div class="form-group">
                                                <label for="discount_price">Discount Price</label>
                                                <input type="number" id="discount_price" class="form-control round" placeholder="Enter Product Discount Price" name="discount_price" @if(!empty($product['discount_price'])) value="{{ old('discount_price', $product['discount_price']) }}" @endif>
                                            </div>

                                            <div class="form-group">
                                                <label for="headline_1">Headline</label>
                                                <input type="text" id="headline_1" class="form-control round" placeholder="Enter Product Headline" name="headline_1" @if(!empty($product['headline_1'])) value="{{ old('headline_1', $product['headline_1']) }}" @endif>
                                            </div>

                                            <div class="form-group">
                                                <label for="features">Features</label>
                                                <div id="features-container">
                                                    @if (isset($product->features) && is_array($product->features))
                                                        @foreach ($product->features as $index => $feature)
                                                            <div class="input-group mb-2">
                                                                <input type="text" name="features[]" class="form-control" value="{{ old('features.' . $index, $feature) }}">
                                                                <div class="input-group-append">
                                                                    <button type="button" class="btn btn-danger remove-feature">X</button>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="input-group mb-2">
                                                            <input type="text" name="features[]" class="form-control">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-danger remove-feature">X</button>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <button type="button" id="add-feature" class="btn btn-secondary">Add Feature</button>
                                            </div>

                                            <div class="form-group">
                                                <label for="image_1">Image 1</label>
                                                <input type="file" id="image_1" class="form-control round" name="image_1">
                                                @if (!empty($product['image_1']))
                                                <img src="{{ asset($product['image_1']) }}" alt="" width="100">
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="image_2">Image 2</label>
                                                <input type="file" id="image_2" class="form-control round" name="image_2">
                                                @if (!empty($product['image_2']))
                                                <img src="{{ asset($product['image_2']) }}" alt="" width="100">
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="image_3">Image 3</label>
                                                <input type="file" id="image_3" class="form-control round" name="image_3">
                                                @if (!empty($product['image_3']))
                                                <img src="{{ asset($product['image_3']) }}" alt="" width="100">
                                                @endif
                                            </div>

                                            <div class="form-actions center">
                                                <a href="{{ url('admin/products') }}" class="btn btn-warning mr-1">
                                                    <i class="feather icon-x"></i> Cancel
                                                </a>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    document.getElementById('add-feature').addEventListener('click', function() {
        var container = document.getElementById('features-container');
        var inputGroup = document.createElement('div');
        inputGroup.classList.add('input-group', 'mb-2');

        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'features[]';
        input.classList.add('form-control');

        var inputGroupAppend = document.createElement('div');
        inputGroupAppend.classList.add('input-group-append');

        var button = document.createElement('button');
        button.type = 'button';
        button.classList.add('btn', 'btn-danger', 'remove-feature');
        button.textContent = 'X';

        inputGroupAppend.appendChild(button);
        inputGroup.appendChild(input);
        inputGroup.appendChild(inputGroupAppend);
        container.appendChild(inputGroup);

        button.addEventListener('click', function() {
            container.removeChild(inputGroup);
        });
    });

    document.querySelectorAll('.remove-feature').forEach(function(button) {
        button.addEventListener('click', function() {
            var inputGroup = button.parentElement.parentElement;
            var container = document.getElementById('features-container');
            container.removeChild(inputGroup);
        });
    });
</script>
@endsection
