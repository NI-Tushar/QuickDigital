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
                <div class="card bg-white mt-3" style="width: 100%">
                    <div class="card-header">
                      <div class="d-flex flex-wrap justify-content-between align-items-center" style="gap: 1em">
                          <h3>All Orders</h3>
                          <a class="btn btn-primary" href="{{ route('affiliate.order.create') }}">Create Order</a>
                      </div>
                    </div>
                    <div class="card-body" style=" backgrond-color: red;">
                            <style>
                            @media screen and (max-width: 768px) {
                                table.table {
                                    font-size: 12px; /* Reduce font size for smaller screens */
                                }
                                table.table th, table.table td {
                                    white-space: nowrap; /* Prevent text from wrapping */
                                }
                                .d-flex {
                                    flex-direction: column; /* Adjust action buttons for small screens */
                                }
                            }
                            </style>
                            <div style="overflow-x: auto; width: 100%;">
                            <table style="width: 100%;" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Order Date</th>
                                        <th>Order ID</th>
                                        <th>Total</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Delivery Status</th>
                                        <th>Payment Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr style="cursor: pointer" class="showOrderData" data-toggle="modal" data-target="#orderViewModla" data-id="{{ $order->id }}">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $order->created_at->format('F j, Y') }}</td>
                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>{{ $order->start_date }}</td>
                                            <td>{{ $order->end_date }}</td>
                                            <td>
                                                <span style="padding: 2px 15px; border: 1px solid #007bff; color: #007bff; border-radius: 10px;">
                                                    {{ $order->delivery_status }}
                                                </span>
                                            </td>
                                            <td>
                                                <span style="padding: 2px 15px; border: 1px solid #007bff; color: #007bff; border-radius: 10px;">
                                                    {{ $order->payment_status }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-wrap justify-content-center align-items-center" style="gap: .5em">
                                                    <a style="width: {{ $order->payment_status === 'Paid' ? '100%' : '' }}" class="btn btn-success" href="{{ route('affiliate.order.show', $order->id) }}">View</a>
                                                    @if ($order->payment_status !== 'Paid')
                                                        <a class="btn btn-success" href="{{ route('affiliate.order.payment', $order->id) }}">Payment</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ $orders->links('pagination::bootstrap-4') }}
                    </div>
                  </div>
            </div>
        </div>
    </section>

@endsection
