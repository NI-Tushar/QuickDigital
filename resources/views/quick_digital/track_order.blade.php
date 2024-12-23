@extends('quick_digital.layout.layout')

@section('content')
    <main>
        <section class="container max-width custom-padding mb-5">
            @if (count($orderStatus) == 0)
                <div class="row">
                    <div class="col-12 col-md-6">
                        <img class="img-fluid" src="{{ asset('front/assets/images/Mention-bro.svg') }}" alt="">
                    </div>
                    <div class="col-12 col-md-6 py-5">
                        <h4>আপনার অর্ডার সংক্রান্ত তথ্য জানতে আপনার অর্ডার আইডি দিয়ে সার্চ করুন। </h4>
                        <div class="d-flex justify-content-center flex-column">
                            <form method="post" action="{{ route('track.order') }}"
                                class="bg-light d-flex justify-content-center flex-column align-items-center gap-3 py-5">
                                @csrf
                                <div class="col-8">
                                    <label class="form-label fs-5" for="id">
                                        অর্ডার আইডি
                                    </label>
                                    <input class="form-control" type="text" name="id" id="id">
                                </div>
                                <button class="btn order__search__button col-4" type="submit">সার্চ করুন</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

            @if ($orderStatus != null && count($orderStatus) != 0)
                @foreach ($orderStatus as $orderId => $statuses)
                    <div class="root col-12 col-md-10 col-lg-5 shadow p-3">
                        @php
                            $latestStatus = $statuses->last();
                            $customerInfo = json_decode($latestStatus->order->customer_info);
                        @endphp
                        <div class="d-flex justify-content-between align-items-center py-3">
                            <span class="fs-5">অর্ডারের বর্তমান স্টেটাস</span>
                            <span
                                class="fs-6 bg-success text-white fw-bold rounded-5 px-3 py-1">{{ $latestStatus->status ?? 'Status not available' }}</span>
                        </div>

                        <div class="p-3">
                            <h6>কাস্টমারের তথ্য</h6>
                            <table class="table table-borderless ">
                                <tbody>
                                    <tr>
                                        <td class="text-right">নাম:</td>
                                        <td>{{ $customerInfo->name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">ইমেইল:</td>
                                        <td>{{ $customerInfo->email ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">ফোন নম্বর:</td>
                                        <td>{{ $customerInfo->phone ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">জেলা:</td>
                                        <td>{{ $customerInfo->district ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">থানা:</td>
                                        <td>{{ $customerInfo->police_station ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">ঠিকানা:</td>
                                        <td>{{ $customerInfo->address ?? 'N/A' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="py-3">
                            <p class="px-3 fs-5 fw-bold">Timeline</p>
                            <ul class="progress-steps">
                                @php
                                    $statusesArray = $statuses->toArray();
                                    $statusesReversed = array_reverse(array_keys($statusesArray));
                                @endphp

                                @foreach ($statusesReversed as $statusKey)
                                    @php
                                        $status = $statusesArray[$statusKey];
                                        $customerInfo = json_decode($status['order']['customer_info']);
                                    @endphp
                                    <li class="step">
                                        <span>
                                            <svg class="text-white p-1" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z">
                                                </path>
                                            </svg>
                                        </span>
                                        <p class="status">
                                            {{ $status['status'] ?? 'Status not available' }}
                                            <br>
                                            <span class="date">
                                                {{ \Carbon\Carbon::parse($status['created_at'])->format('jS F, Y') }}
                                            </span>
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            @endif
        </section>
    </main>
@endsection
