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
@push('css')
<style>
    .proposal-date {
        text-align: right;
        font-style: italic;
    }
    address {
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        padding: 15px;
        text-align: center;
    }
    th {
        border-top: 2px solid #ddd;
        border-bottom: 2px solid #ddd;
    }
    td{
        border-bottom: 1px solid #ddd;
    }
    a{
        text-decoration: none;
        color: black;
    }
    h1,h2,h3,h4,h5,h6{
        margin: 0;
        padding: 0;
    }
    .header .proposal-header{
        width: 100%
        text-align: left;
        color: #34495e;
        margin-bottom: 20px;
        display: block
    }
    .header .proposal-header h1{
        font-size: 20px;
        margin-bottom: 0;
    }
    .clear::after {
        content: "";
        clear: both;
        display: block;
    }
    .address-header::after {
        content: "";
        clear: both;
        display: block;
    }
    .admin-address{
        float: left;
    }
    .header .row address{
        line-height: 22px
    }
    .user-address{
        float: right;
        text-align: right;
        width: 200px;
    }
    .proposal-headline{
        background: #ddd;
        padding: 10px;
        text-align: center;
        margin-bottom: 20px;
    }
    .summarytable tbody{
       padding-right: 300px;
    }
    .summarytable th{
        border-top: none;
        border-bottom: 1px solid #ddd;
        text-align: right;
    }
    .summarytable td{
        padding-right: 30px;
        text-align: right;
    }
    .summarytable .total-amount{
        border-bottom: none ;
    }
    .company-logo{
        width: 300px;
        height: 200px;
        margin: auto;
    }
    .company-logo img{
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    .service-offer{
        margin-bottom: 20px;
        color: #34495e;
    }
    .proposal-footer{
        text-align: center;
        margin-top: 50px;
    }
</style>
@endpush
@section('content')
    @include('front.users.user_dashboard.sidebar')


    <section class="home-section">

        <div class="home-content">

            <div class="software_section">

                {{-- <div class="card bg-white mt-3"  style="width: 100%">
                    <div class="card-header">
                      <div class="d-flex flex-wrap justify-content-between align-items-center" style="gap: 1em">
                          <h3>Make Payment</h3>
                          <a class="btn btn-primary" href="{{ route('affiliate.order.index') }}">Back</a>
                      </div>
                    </div>
                    <div class="card-body">

                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Item</th>
                                  <th>Qty</th>
                                  <th>Rate</th>
                                  <th>Tax</th>
                                  <th>Amount</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($order->items as $item)
                              <tr>
                                  <td>{{ $loop->index + 1 }}</td>

                                  @php
                                    if($item->ser_type === "Software"){
                                        $service = App\Models\Software::findOrFail($item->ser_id);
                                    }else if($item->ser_type === "DigitalService"){
                                        $service = App\Models\DigitalService::findOrFail($item->ser_id);
                                    }else if($item->ser_type === "DigitalProduct"){
                                        $company = App\Models\DigitalProduct::findOrFail($item->ser_id);
                                    }
                                @endphp
                                <td>{{ $service->title }}</td><br>

                                  <td>{{ $item->quantity }}</td>
                                  <td>{{ number_format($item->rate) }}</td>
                                  <td>{{ $item->tax ? $item->tax . '%' : '' }}</td>
                                  @php
                                      $totalAmount = ($item->quantity * $item->rate) * (1 + ($item->tax / 100));
                                  @endphp
                                  <td>{{ number_format($totalAmount) }}</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                    </div>
                </div> --}}



                <div class="card" style="width: 100%">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bolder">View Order - #{{ $order->order_id }}</h5>
                            <a href="{{ route('affiliate.order.index') }}" class="btn btn-sm btn-outline-primary">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                            <h2 class="proposal-headline">Order Summery</h2>
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                        <th>Tax</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->rate }}</td>
                                        <td>{{ $item->tax ? $item->tax . '%' : '' }}</td>
                                        @php
                                            $totalAmount = ($item->quantity * $item->rate) * (1 + ($item->tax / 100));
                                        @endphp
                                        <td>{{ $totalAmount }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <table class="summarytable">
                                <tbody>
                                    <tr>
                                        {{-- <th></th> --}}
                                        <td><b>Sub Total:</b> {{ $order->sub_total }}</td>
                                    </tr>
                                    <tr style="display: none">
                                        {{-- <th> </th> --}}
                                        <td><b>Discount:</b> {{ $order->discount }}</td>
                                    </tr>
                                    <tr style="display: none">
                                        {{-- <th> </th> --}}
                                        <td><b>Adjustment:</b> {{ $order->adjustment }}</td>
                                    </tr>
                                    <tr>
                                        {{-- <th>T </th> --}}
                                        <td class="total-amount"><b>Total:</b> {{ $order->total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a style="width: 100%;display:inline-block;" href="" class="btn btn-success">Make Payment</a>
                        </div>
                    </div>
                </div>



            </div>

        </div>

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
