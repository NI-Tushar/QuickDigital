@extends('admin.layout.layout')
@push('css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Update Product</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('quick-shopping-product.index') }}">Product</a></li>
                            <li class="breadcrumb-item active">Update Product</li>
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <a href="{{ route('quick-shopping-product.index') }}" class="btn btn-primary">
                                Back All Product
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('quick-shopping-product.update', $product->slug) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Product Basic Information Section Start -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="form-group">
                                                <label for="name" class="text-gray">Product Name (*)</label>
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}">
                                                @error('name')
                                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="unit" class="text-gray">Product Unit (*)</label>
                                                <input type="text" name="unit" class="form-control @error('unit') is-invalid @enderror" value="{{ old('unit', $product->unit) }}" placeholder="kg, pcs">
                                                @error('unit')
                                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="price" class="text-gray">Unit Price (*)</label>
                                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}">
                                                @error('price')
                                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="thumbnail_image" class="form-label">Thumbnail Image (*)</label>
                                                <div class="custom-file">
                                                    <input type="file" name="thumbnail_image" class="custom-file-input" id="thumbnail_image" value="x.pbg">
                                                    <label class="custom-file-label" for="thumbnail_image">Choose file</label>
                                                </div>
                                                @error('thumbnail_image')
                                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                                @enderror
                                                <img id="thumbnail_image_prviewImage" style="border: 1px solid #ddd; padding:5px; width:100px; margin-top:10px" src="{{ asset($product->thumbnail_image ?? '') }}" alt="">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="form-group">
                                                <label for="category" class="text-gray">Category (*)</label>
                                                <select name="category" class="form-control select2bs4 select2-hidden-accessible @error('category') is-invalid @enderror" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category', $product->quick_shop_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="quantity" class="text-gray">Product Quantity (*)</label>
                                                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $product->qty) }}">
                                                @error('quantity')
                                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="discount" class="text-gray">Discount</label>
                                                <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount', $product->discount) }}">
                                                @error('discount')
                                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Gallery Image (*)</label>
                                                <div class="custom-file">
                                                    <input type="file" name="images[]" class="custom-file-input" id="image" multiple value="x.pbg">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                                @error('images')
                                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                                                @enderror
                                                <div class="prviewImage" style="display: flex;flex-wrap:wrap;gap:.5em">
                                                    @foreach (explode('|', $product->images) as $image)
                                                      <img src="{{ asset($image) }}" class="img-fluid" style="border: 1px solid #ddd; padding:5px; width:100px;height:100px;object-fit:cover;margin-top:10px;">
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description" class="text-gray">Description</label>
                                            <div id="quill-editor" class="mb-3" style="height: 200px;">{!! old('description', $product->description) !!}</div>
                                            <textarea rows="3" class="mb-3 d-none" name="description" class="form-control @error('discount') is-invalid @enderror" id="description">{!! old('description', $product->description) !!}</textarea>
                                            @error('description')
                                            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Basic Information Section End -->

                                <!-- Product Variation Section Start -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" id="addVariationBtn" class="btn btn-info">Add Product Variation</button>
                                    </div>
                                </div>

                                <div id="productVariationContainer" class="mt-2">
                                    <!-- Existing variations will be loaded here -->
                                </div>
                                <!-- Product Variation Section End -->



                                <div class="">
                                    <div class="text-right tw-space-x-1" id="profile-save-section">
                                        <button type="submit" class="btn btn-primary only-save customer-form-submiter">Save Product</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('description')) {
            var editor = new Quill('#quill-editor', {
                theme: 'snow'
            });
            var quillEditor = document.getElementById('description');
            editor.on('text-change', function() {
                quillEditor.value = editor.root.innerHTML;
            });
            quillEditor.addEventListener('input', function() {
                editor.root.innerHTML = quillEditor.value;
            });
        }
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var thumbnail_image_reader = new FileReader();

        thumbnail_image_reader.onload = function (e) {
        $('#thumbnail_image_prviewImage').attr('src', e.target.result);
        }

          thumbnail_image_reader.readAsDataURL(input.files[0]);
        }
    }

    $("#thumbnail_image").change(function(){
        readURL(this);
    });

    $('#image').on('change', function(){
      var files = $(this)[0].files;
      var prviewImage = $('.prviewImage');
      prviewImage.empty(); // Clear previous previews

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function(e) {
                $('<img/>', {
                    'src': e.target.result,
                    'style': 'border: 1px solid #ddd; padding:5px; width:100px;height:100px;object-fit:cover;margin-top:10px;'
                }).appendTo(prviewImage);
            }

            reader.readAsDataURL(file);
        }
    });

    $(document).ready(function () {
        let variationIndex = 0;

        // Load existing variations (replace this with dynamic data from the server)
        const existingVariations = @json($existingVariations ?? []); // Replace `$existingVariations` with your data

        if (existingVariations.length > 0) {
            existingVariations.forEach(function (variation, index) {
                variationIndex = index;
                const variationHtml = `
                    <div class="row variationRow" data-index="${variationIndex}">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="form-group">
                                    <label for="color_${variationIndex}" class="text-gray">Color Name</label>
                                    <input type="text" name="variations[${variationIndex}][color]" id="color_${variationIndex}" class="form-control" value="${variation.color}" placeholder="Green, Red">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="form-group">
                                    <label for="color_code_${variationIndex}" class="text-gray">Color Code</label>
                                    <input type="text" name="variations[${variationIndex}][color_code]" id="color_code_${variationIndex}" class="form-control" value="${variation.color_code}" placeholder="#f3f3f3">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="form-group">
                                    <label for="size_${variationIndex}" class="text-gray">Size</label>
                                    <input type="text" name="variations[${variationIndex}][size]" id="size_${variationIndex}" class="form-control" value="${variation.size}" placeholder="XS, S, M | 40, 41">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <div class="form-group">
                                    <label for="quantity_${variationIndex}" class="text-gray">Quantity</label>
                                    <input type="number" name="variations[${variationIndex}][quantity]" id="quantity_${variationIndex}" class="form-control" value="${variation.qty}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="card">
                                <div class="form-group">
                                    <label style="opacity: 0;">Delete</label>
                                    <button type="button" class="btn btn-danger deleteVariationBtn">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                $('#productVariationContainer').append(variationHtml);
            });
        }

        // Add new variation
        $('#addVariationBtn').on('click', function () {
            variationIndex++;
            const variationHtml = `
                <div class="row variationRow" data-index="${variationIndex}">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="form-group">
                                <label for="color_${variationIndex}" class="text-gray">Color Name</label>
                                <input type="text" name="variations[${variationIndex}][color]" id="color_${variationIndex}" class="form-control" placeholder="Green, Red">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="form-group">
                                <label for="color_code_${variationIndex}" class="text-gray">Color Code</label>
                                <input type="text" name="variations[${variationIndex}][color_code]" id="color_code_${variationIndex}" class="form-control" placeholder="#f3f3f3">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="form-group">
                                <label for="size_${variationIndex}" class="text-gray">Size</label>
                                <input type="text" name="variations[${variationIndex}][size]" id="size_${variationIndex}" class="form-control" placeholder="XS, S, M | 40, 41">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <div class="form-group">
                                <label for="quantity_${variationIndex}" class="text-gray">Quantity</label>
                                <input type="number" name="variations[${variationIndex}][quantity]" id="quantity_${variationIndex}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="card">
                            <div class="form-group">
                                <label style="opacity: 0;">Delete</label>
                                <button type="button" class="btn btn-danger deleteVariationBtn">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            $('#productVariationContainer').append(variationHtml);
        });

        // Delete variation
        $(document).on('click', '.deleteVariationBtn', function () {
            $(this).closest('.variationRow').remove();
        });
    });

</script>

@endpush
