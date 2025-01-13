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

                <div class="card bg-white mt-3"  style="width: 100%">
                    <div class="card-header">
                      <div class="d-flex flex-wrap justify-content-between align-items-center" style="gap: 1em">
                          <h3>Order Details</h3>
                          <a class="btn btn-primary" href="{{ route('affiliate.order.index') }}">Back</a>
                      </div>
                    </div>
                    <div class="card-body">
                        <section id="column">
                            <div class="row">
                                <div class="col-12">

                                    <div class="card">
                                        <div class="card-body">

                                            <div class="d-flex justify-content-between">
                                                <div class="">
                                                    <table style="overflow-x: auto;">
                                                        <tr>
                                                            <td style="padding:5px 20px">Order #</td>
                                                            <td style="padding:5px 20px">{{ $order->order_id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:5px 20px">Order status </td>
                                                            <td style="padding:5px 20px"><span class="badge badge-secondary ml-3" style="background: #008cff">{{ $order->delivery_status }}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:5px 20px">Payment status </td>
                                                            <td style="padding:5px 20px"><span class="badge badge-secondary ml-3" style="background: #008cff">{{ $order->payment_status }}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:5px 20px">Order date </td>
                                                            <td style="padding:5px 20px">{{ $order->created_at->format('d-m-Y h:i A') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:5px 20px">Total amount </td>
                                                            <td style="padding:5px 20px">{{ $order->total }} Tk</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:5px 20px">Payment method </td>
                                                            <td style="padding:5px 20px">{{ $order->payment_method ?? 'N/A' }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="text-right">
                                                    <table>
                                                        <tr>
                                                            <td style="padding:5px 20px">Start Date</td>
                                                            <td style="padding:5px 20px">{{ $order->start_date }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:5px 20px">End Date </td>
                                                            <td style="padding:5px 20px">{{ $order->end_date }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <br>

                                            <table style="overflow-x: auto;" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th>Price</th>
                                                        <th>Qty</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($order->items as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ Str::limit($item->title, 50) }}</td>
                                                        <td>{{ Str::limit($item->description, 100) }}</td>
                                                        <td>{{ number_format($item->rate) }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ number_format($item->amount) }}</td>
                                                        @if ($order->payment_status === 'Paid' && $item->ser_type === 'DigitalProduct')
                                                        <td>
                                                            @php
                                                                if($item->ser_type === "DigitalProduct"){
                                                                    $service = App\Models\DigitalProduct::findOrFail($item->ser_id);
                                                                }
                                                            @endphp
                                                            <a target="_blank" class="btn btn-primary" download="DigitalProduct" href="{{ asset($service->zip_file) }}" title="DigitalProduct">Download</a>
                                                        </td>
                                                        @else
                                                        <td>{{ $order->delivery_status }}</td>
                                                        @endif
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <div class="row justify-content-end">
                                                <div class="col-md-4 col-of">
                                                    <table style="overflow-x: auto;" class="table">
                                                        <tr>
                                                            <td>Sub Total :</td>
                                                            <td>{{ number_format($order->sub_total) }} Taka</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total :</td>
                                                            <td style="font-weight: 900">{{ number_format($order->total) }} Taka</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="row justify-content-end">
                                                <a target="_blank" href="{{ route('affiliate.order.DownloadOrderPDF', $order->id) }}"
                                                   style="width: 50px; height: 50px; padding:12px; background: #00a4f0; color: #fff; text-align: center; line-height: 50px; border-radius: 5px; margin-right: 10px;">
                                                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M18 3H6v4H4a2 2 0 0 0-2 2v7h4v5h12v-5h4v-7a2 2 0 0 0-2-2h-2V3zm-2 2v2H8V5h8zM8 19v-3h8v3H8zm10-6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                                  </svg>
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                  </div>
            </div>

        </div>

    </section>

@endsection
