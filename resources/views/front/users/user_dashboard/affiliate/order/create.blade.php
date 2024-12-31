@extends('quick_digital.layout.layout')
@push('css')
    <link rel="stylesheet" href="{{ url('front/styles/software.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <style>
        .quantity-input {
            display: none;
        }

        #qtyinput {
            display: block;
        }

        .select2-container--bootstrap4 .select2-selection {
            height: calc(2.25rem + 2px);
        }
    </style>

    <link rel="stylesheet" href="{{ url('front/styles/quick_business.css') }}">
@endpush
@section('content')
    @include('front.users.user_dashboard.sidebar')


    <section class="home-section">

        <div class="home-content">

            <div class="software_section">

                <div class="centered_list">
                    <div class="soft_heading">

                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <h5>Create New Order</h5>
                                    <a class="btn btn-primary" href="{{ route('affiliate.digialservice.index') }}">Back</a>
                                </div>
                            </div>
                            <div class="card-body bg-white">

                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form id="proposalForm" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row mb-5">
                                        <div class="col-md-6 com-sm-12 pr-3" style="border-right: 1px solid #ddd">

                                            <div class="form-group">
                                                <label for="service_type" class="text-gray">Select Your Services (*)</label>
                                                <select name="service_type" id="service_type" class="form-control"
                                                    style="width: 100%;" required>
                                                    <option selected="selected" value="">Select one</option>
                                                    <option value="Software">Software</option>
                                                    <option value="DigitalService">Digital Service</option>
                                                    <option value="DigitalProduct">Digital Product</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6 com-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="start_date" class="text-gray">Start Date</label>
                                                        <div class="input-group date" id="start_date"
                                                            data-target-input="nearest">
                                                            <input type="date" name="start_date" class="form-control"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="end_date" class="text-gray">End Date</label>
                                                        <div class="input-group date" id="end_date"
                                                            data-target-input="nearest">
                                                            <input type="date" name="end_date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="panel-body mt-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group" id="software" style="display: none;">
                                                    <label for="software_select" class="text-gray">Software (*)</label>
                                                    <select name="software" id="software_select" class="form-control"
                                                        style="width: 100%;">
                                                        <option selected="selected" value="">System Default</option>
                                                        {{-- @foreach ($softwares as $software)
                                                            <option value="{{ $software->id }}">{{ $software->name }}</option>
                                                            @endforeach --}}
                                                    </select>
                                                </div>

                                                <div class="form-group" id="digitalService" style="display: none;">
                                                    <label for="digitalService_select" class="text-gray">Digital Service (*)</label>
                                                    <select name="digitalService" id="digitalService_select"
                                                        class="form-control" style="width: 100%;">
                                                        <option selected="selected" value="">System Default</option>
                                                        {{-- @foreach ($digitalServices as $digitalService)
                                                            <option value="{{ $digitalService->id }}">{{ $digitalService->name }}</option>
                                                            @endforeach --}}
                                                    </select>
                                                </div>

                                                <div class="form-group" id="digitalProduct" style="display: none;">
                                                    <label for="digitalProduct_select" class="text-gray">* Digital Product (*)</label>
                                                    <select name="digitalProduct" id="digitalProduct_select"
                                                        class="form-control" style="width: 100%;">
                                                        <option selected="selected" value="">System Default</option>
                                                        {{-- @foreach ($digitalProducts as $digitalProduct)
                                                        <option value="{{ $digitalProduct->id }}">{{ $digitalProduct->name }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive s_table">
                                            <table
                                                class="table estimate-items-table items table-main-estimate-edit has-calculations no-mtop">
                                                <thead>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th width="20%" align="left">Item</th>
                                                        <th width="25%" align="left">Description</th>
                                                        <th width="10%" class="qty" align="right"
                                                            id="quantityLabel">Qty</th>
                                                        <th width="15%" align="right">Rate</th>
                                                        <th width="20%" align="right">Tax</th>
                                                        <th width="10%" align="right">Amount</th>
                                                        <th align="center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="items-table">
                                                    <tr class="main">
                                                        <td>1</td>
                                                        <td>
                                                            <textarea name="sale_items[0][title]" rows="4" class="form-control" placeholder="Title"></textarea>
                                                        </td>
                                                        <td>
                                                            <textarea name="sale_items[0][description]" rows="4" class="form-control" placeholder="Description"></textarea>
                                                        </td>
                                                        <td><input type="number" name="sale_items[0][quantity]"
                                                                min="0" value="1" class="form-control"
                                                                placeholder="Quantity"></td>
                                                        <td><input type="number" name="sale_items[0][rate]"
                                                                class="form-control" placeholder="Rate"></td>
                                                        <td>
                                                            <select name="sale_items[0][tax]"
                                                                class="form-control select2bs4" style="width: 100%;">
                                                                <option value="" data-taxrate="">No Tax</option>
                                                                <option value="5.00" data-taxrate="5.00">5.00%</option>
                                                                <option value="10.00" data-taxrate="10.00">10.00%
                                                                </option>
                                                                <option value="18.00" data-taxrate="18.00">18.00%
                                                                </option>
                                                            </select>
                                                        </td>
                                                        <td><input type="text" min="0" class="form-control"
                                                                placeholder="Amount" name="sale_items[0][amount]"></td>
                                                        <td><button type="button" class="btn btn-primary addRowBtn">Ok</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-8 offset-md-4">
                                            <table class="table text-right">
                                                <tbody>
                                                    <tr id="subtotal">
                                                        <td><span class="bold tw-text-neutral-700">Sub Total :</span></td>
                                                        <td>
                                                            <span class="subtotal">$0.00</span>
                                                            <input type="hidden" name="sub_total" value="0.00">
                                                        </td>
                                                    </tr>
                                                    <tr id="discount_area">
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <span class="bold tw-text-neutral-700">Discount</span>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="input-group" id="discount-total">
                                                                        <input type="number" value="0"
                                                                            class="form-control pull-left input-discount-percent"
                                                                            min="0" max="100"
                                                                            name="discount">
                                                                        <div class="form-group" style="min-width: 50px">
                                                                            <select name="discoutn_type"
                                                                                class="form-control select2bs4 select2-hidden-accessible"
                                                                                style="width: 100%;" tabindex="-1"
                                                                                aria-hidden="true">
                                                                                <option value="%">%</option>
                                                                                <option value="Fixed">Fixed</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="discount-total">-$0.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <span
                                                                        class="bold tw-text-neutral-700">Adjustment</span>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <input type="number" data-toggle="tooltip"
                                                                        data-title="The number in the input field is not formatted while edit/add item and should remain not formatted do not try to format it manually in here."
                                                                        value="0" class="form-control pull-left"
                                                                        name="adjustment">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="adjustment">$0.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="bold tw-text-neutral-700">Total :</span></td>
                                                        <td>
                                                            <span class="total">$0.00</span>
                                                            <input type="hidden" name="total" value="0.00">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    <div class="text-right tw-space-x-1" id="profile-save-section">
                                        <button class="btn btn-primary only-save customer-form-submiter">Save</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <button id="clickme">Click Me</button>

    </section>

@endsection

@push('script')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#service_type').change(function() {

            const relatedValue = $(this).val();
            const softwareDiv = $('#software');
            const digitalServiceDiv = $('#digitalService');
            const digitalProductDiv = $('#digitalProduct');

            // Hide all divs initially
            softwareDiv.hide();
            digitalServiceDiv.hide();
            digitalProductDiv.hide();

            // Show the specific div based on the selected value
            if (relatedValue === 'Software') {
                softwareDiv.show();
            } else if (relatedValue === 'DigitalService') {
                digitalServiceDiv.show();
            } else if (relatedValue === 'DigitalProduct') {
                digitalProductDiv.show();
            }
        });


        $('#customer_select, #lead_select').change(function() {
            const selectedValue = $(this).val();
            const relatedType = $(this).attr('name');

            if (selectedValue) {
                $.ajax({
                    url: `/get-${relatedType}-details/${selectedValue}`,
                    method: 'GET',
                    success: function(response) {
                        $('#customer_name').val(response.name);
                        $('#address').val(response.address);
                        $('#city').val(response.city);
                        $('#state').val(response.state);
                        $('#country').val(response.country).trigger('change');
                        $('#zip_code').val(response.zip_code);
                        $('#email').val(response.email);
                        $('#phone').val(response.phone);
                    },
                    error: function(error) {
                        console.log('Error fetching data:', error);
                    }
                });
            }
        });

        $(document).ready(function() {
            let currentQuantityType = 'qty'; // Default quantity type

            // Fetch data on item select
            $('#sale_items').change(function() {
                const itemId = $(this).val();
                if (itemId) {
                    $.ajax({
                        url: '/fetch-item-data', // Adjust this URL as per your route
                        method: 'GET',
                        data: {
                            id: itemId
                        },
                        success: function(data) {
                            fillMainRow(data);
                        }
                    });
                }
            });

            // Fill main row with fetched data
            function fillMainRow(data) {
                const mainRow = $('#items-table .main');
                mainRow.find('textarea[name^="sale_items"][name$="[title]"]').val(data.title);
                mainRow.find('textarea[name^="sale_items"][name$="[description]"]').val(data.description);
                mainRow.find('input[name^="sale_items"][name$="[rate]"]').val(data.rate);

                // Set the default quantity value to 1
                mainRow.find('input[name^="sale_items"][name$="[quantity]"]').val(1);

                // Set the tax value
                const taxOption = mainRow.find(`select[name^="sale_items"][name$="[tax]"] option`).filter(
                    function() {
                        return $(this).data('taxrate') == data.tax_rate;
                    });
                if (taxOption.length) {
                    mainRow.find('select[name^="sale_items"][name$="[tax]"]').val(taxOption.val());

                    // Ensure the select element updates correctly
                    setTimeout(() => {
                        mainRow.find('select[name^="sale_items"][name$="[tax]"]').trigger('change');
                    }, 100);
                }
            }

            // Add new row on button click
            $(document).on('click', '.addRowBtn', function() {
                const mainRow = $('#items-table .main');

                // Calculate amount before appending the row
                calculateAmount(mainRow);

                const newRow = mainRow.clone();
                newRow.removeClass('main');
                newRow.find('.addRowBtn').removeClass('addRowBtn btn-primary').addClass(
                    'removeRowBtn btn-danger').html('<i class="fa fa-trash"></i>');

                // Increment SL number
                const currentSL = parseInt($('#items-table tr').not('.main').length) + 1;
                newRow.find('td:first-child').text(currentSL);

                $('#items-table').append(newRow);
                resetMainRow();
                updateRowNames(); // Update row names for correct indexing
                calculateTotal(); // Update subtotal and total
            });

            // Remove row
            $(document).on('click', '.removeRowBtn', function() {
                $(this).closest('tr').remove();
                updateRowNames(); // Update row names for correct indexing
                calculateTotal(); // Update subtotal and total
            });

            // Function to update row names
            function updateRowNames() {
                $('#items-table tr').not('.main').each(function(index) {
                    $(this).find('textarea, input, select').each(function() {
                        const name = $(this).attr('name').replace(/\[\d+\]/, `[${index}]`);
                        $(this).attr('name', name);
                    });
                });
            }

            // Calculate amount on input changes
            $(document).on('change',
                'input[name^="sale_items"][name$="[quantity]"], input[name^="sale_items"][name$="[rate]"], select[name^="sale_items"][name$="[tax]"]',
                function() {
                    const row = $(this).closest('tr');
                    calculateAmount(row);
                    calculateTotal(); // Update subtotal and total
                });

            // Listen to radio button changes
            $('input[name="show_quantity_as"]').change(function() {
                currentQuantityType = $(this).val();
                updateQuantityField();
                updateQuantityHeader();
            });

            // Update quantity field based on selected type
            function updateQuantityField() {
                const quantityField = $('#items-table .main').find('input[name^="sale_items"][name$="[quantity]"]');
                quantityField.attr('placeholder', currentQuantityType.charAt(0).toUpperCase() + currentQuantityType
                    .slice(1));
            }

            // Update quantity header based on selected type
            function updateQuantityHeader() {
                $('#quantityLabel').text(currentQuantityType.charAt(0).toUpperCase() + currentQuantityType.slice(
                    1));
            }

            // Calculate amount
            function calculateAmount(row) {
                let qty = parseFloat(row.find('input[name^="sale_items"][name$="[quantity]"]').val()) || 1;
                let rate = parseFloat(row.find('input[name^="sale_items"][name$="[rate]"]').val()) || 0;
                let taxRate = parseFloat(row.find('select[name^="sale_items"][name$="[tax]"] option:selected').data(
                    'taxrate')) || 0;

                if (isNaN(qty) || qty === 0) qty = 1; // Default to 1 if not provided or invalid

                const amount = (qty * rate) * (1 + (taxRate / 100));
                row.find('input[name^="sale_items"][name$="[amount]"]').val(amount.toFixed(2));
            }

            function resetMainRow() {
                const mainRow = $('#items-table .main');
                mainRow.find('textarea, input').val('');
                mainRow.find('select').val('');
                updateQuantityField(); // Update placeholder text for the quantity field
            }

            // Set default quantity value to 1
            $('input[name^="sale_items"][name$="[quantity]"]').val(1);

            // Initial call to set the correct placeholder for the quantity field and the header
            updateQuantityField();
            updateQuantityHeader();

            // Function to calculate subtotal, discount, adjustment, and total
            function calculateTotal() {
                let subtotal = 0;

                // Iterate over each row to calculate the subtotal
                $('#items-table tr').not('.main').each(function() {
                    let amountField = $(this).find('input[name^="sale_items"][name$="[amount]"]');
                    if (amountField.length > 0) {
                        let amount = parseFloat(amountField.val());
                        if (!isNaN(amount)) {
                            subtotal += amount;
                        }
                    }
                });

                let discount = parseFloat($('input[name="discount"]').val()) || 0;
                let adjustment = parseFloat($('input[name="adjustment"]').val()) || 0;
                let discountType = $('select[name="discoutn_type"]').val();

                if (discountType === '%') {
                    discount = (subtotal * discount) / 100;
                }

                const total = subtotal - discount + adjustment;

                $('.subtotal').html('$' + subtotal.toFixed(2));
                // Update the subtotal and total input fields with the calculated subtotal value
                $('input[name="sub_total"]').val(subtotal.toFixed(2));
                $('input[name="total"]').val(total.toFixed(2));

                $('.total').html('$' + total.toFixed(2));
                $('.discount-total').html('$' + discount.toFixed(2));
                $('.adjustment').html('$' + adjustment.toFixed(2));
            }

            // Listen for changes in discount and adjustment fields
            $('input[name="discount"], select[name="discoutn_type"], input[name="adjustment"]').on('input change',
                function() {
                    calculateTotal();
                });

            // Handle form submission with AJAX
            $('#proposalForm').on('submit', function(e) {
                e.preventDefault();

                // Ensure all rows are included in the form data
                updateRowNames();

                var formData = new FormData(this);

                $('#items-table tr').not('.main').each(function(index, row) {
                    $(row).find('textarea, input, select').each(function() {
                        const name = $(this).attr('name');
                        formData.append(name, $(this).val());
                    });
                });

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success('Proposal saved successfully');

                        // Reset the entire form including all fields
                        $('#proposalForm')[0].reset();

                        // Clear the rows in the items table except the main row
                        $('#items-table tr').not('.main').remove();

                        // Reset the main row
                        resetMainRow();

                        // Optionally, reset specific additional fields if needed
                        $('input[name="subject"]').val('');
                        $('select[name="related"]').val('').change();
                        $('select[name="customer"]').val('').change();
                        $('select[name="lead"]').val('').change();
                        $('input[name="date"]').val('');
                        $('input[name="open_till"]').val('');
                        $('select[name="currency"]').val('').change();
                        $('select[name="status"]').val('').change();
                        $('select[name="user_id"]').val('').change();
                        $('input[name="to"]').val('');
                        $('input[name="address"]').val('');
                        $('input[name="city"]').val('');
                        $('input[name="state"]').val('');
                        $('select[name="country"]').val('').change();
                        $('input[name="zip_code"]').val('');
                        $('input[name="email"]').val('');
                        $('input[name="phone"]').val('');
                        $('select[name="sale_items"]').val('').change();

                        // Ensure all <select> options are unselected
                        $('select').each(function() {
                            $(this).val('');
                        });




                        // Optionally, recalculate totals
                        calculateTotal();
                    },
                    error: function(response) {
                        toastr.error('Error saving proposal');
                    }
                });
            });
        });
    </script>


    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK',
            });
        </script>
    @endif


@endpush
