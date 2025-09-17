@extends('admin_layouts.app')
@section('content')

<!-- Shipment Registration Modal -->
<div class="p-4" id="shipment" tabindex="" aria-hidden="true">

    <!-- Modal Header -->
    <div class="header border-secondary d-flex justify-content-center position-relative">
        <h3 class="title mb-4">Register New Shipment</h3>
        <button type="button" class="btn-close btn-close-white position-absolute end-0 me-3"
            data-bs-dismiss="modal"></button>
    </div>




    <div class="body">
        <form action="{{ route('shipments.store')}}" method="POST">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger p-3 mb-3 rounded">
                <strong>Something went wrong:</strong>
                <ul class="mt-2 mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row g-3">

                <!-- Carrier -->
                <div class="col-md-6">
                    <label class="form-label">Carrier *</label>
                    <select name="carrier" class="form-select" required>
                        <option value="{{ old('carrier')}}">Select carrier</option>
                        <option>Veenstech Logistics</option>

                    </select>
                </div>

                <!-- Sender Name -->
                <div class="col-md-6">
                    <label class="form-label">Sender Name *</label>
                    <input type="text" name="sender_name" value="{{ old('sender_name')}}" class="form-control"
                        placeholder="Full name" required>
                    @error('sender_name')
                    <small class="danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Sender Address -->
                <div class="col-md-6">
                    <label class="form-label">Sender Address *</label>
                    <input type="text" name="sender_address" value="{{ old('sender_address')}}" class="form-control"
                        placeholder="City, Country">
                    @error('sender_address')
                    <small class="danger"> {{ $message }}</small>
                    @enderror
                </div>

                <!-- Receiver Name -->
                <div class="col-md-6">
                    <label class="form-label">Receiver Name *</label>
                    <input type="text" name="receiver_name" value="{{ old('receiver_name')}}" class="form-control"
                        placeholder="Full name" required>
                    @error('receiver_name')
                    <small class="danger"> {{ $message }}</small>
                    @enderror
                </div>

                <!-- Receiver Address -->
                <div class="col-md-6">
                    <label class="form-label">Receiver Address *</label>
                    <input type="text" name="receiver_address" value="{{ old('receiver_address') }}"
                        class="form-control" placeholder="City, Country" required>
                    @error('receiver_address')
                    <small class="danger"> {{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Receiver Emai *</label>
                    <input type="email" name="receiver_email" value="{{ old('receiver_email') }}" class="form-control"
                        placeholder="Receiver email">
                    @error('receiver_email')
                    <small class="danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Current Location *</label>
                    <input type="text" name="current_location" value="{{ old('current_location') }}"
                        class="form-control" placeholder="current location of the package">
                    @error('current_location')
                    <small class="danger"> {{ $message }}</small>
                    @enderror
                </div>


                <!-- Shipment Type -->
                <div class="col-md-6">
                    <label class="form-label">Shipment Type *</label>
                    <select name="shipment_type" value="{{ old('shipment_type') }}" class="form-select">
                        <option value="">Select type</option>
                        <option>Standard</option>
                        <option>Express</option>
                        <option>Overnight</option>
                    </select>
                </div>

                <!-- Priority -->
                <div class="col-md-6">
                    <label class="form-label">Priority *</label>
                    <select name="priority" value="{{ old('priority') }}" class="form-select">
                        <option value="">Select priority</option>
                        <option>Low</option>
                        <option>Medium</option>
                        <option>High</option>
                    </select>
                </div>

                <!-- Weight -->
                <div class="col-md-4">
                    <label class="form-label">Weight (kg) *</label>
                    <input type="number" name="weight" value="{{ old('weight') }}" class="form-control" step="0.01">
                    @error('weight')
                    <small class="danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Dimensions -->
                <div class="col-md-8">
                    <label class="form-label">Dimensions (L x W x H in cm) *</label>
                    <div class="input-group">
                        <input type="number" name="length" value="{{ old('lenght') }}" class="form-control"
                            placeholder="Length" step="0.01">
                        <input type="number" name="width" value="{{ old('width') }}" class="form-control"
                            placeholder="Width" step="0.01">
                        <input type="number" name="height" value="{{ old('height') }}" class="form-control"
                            placeholder="Height" step="0.01">
                        @error('dimensions')
                        <small class="danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Items Count -->
                <div class="col-md-4">
                    <label class="form-label">Items *</label>
                    <input type="number" name="items" value="{{ old('items') }}" class="form-control" min="1">
                    @error('items')
                    <small class="danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Value -->
                <div class="col-md-4">
                    <label class="form-label">Value ($) *</label>
                    <input type="number" name="value" value="{{ old('value') }}" class="form-control" step="0.01">
                    @error('value')
                    <small class="danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Status -->
                <div class="col-md-4">
                    <label class="form-label">Status *</label>
                    <select name="status" id="status" value="{{ old('status') }}" class="form-select">
                        <option value="">Select status</option>
                        <option>Waiting for customs clearance</option>
                        <option>At the airport</option>
                        <option>Pending</option>
                        <option>In Transit</option>
                        <option>Delivered</option>
                        <option>Cancelled</option>
                        <option>Shipped</option>
                    </select>
                </div>

                <!-- Airport Name (only visible if "At the airport") -->
                <div class="col-md-6 d-none" id="airport-field">
                    <label class="form-label">Airport Name</label>
                    <input type="text" name="airport_name" value="{{ old('airport_name') }}" class="form-control"
                        placeholder="Enter airport name">
                </div>

                <!-- City Name (only visible if "At the airport") -->
                <div class="col-md-6 d-none" id="city-field">
                    <label class="form-label">City</label>
                    <input type="text" name="city_name" value="{{ old('city_name') }}" class="form-control"
                        placeholder="Enter city name">
                </div>

                <!-- Payment Options -->
                <div class="col-md-12">
                    <label class="form-label">Payment Options *</label>
                    <select name="payment_option" value="{{ old('payment_option') }}" class="form-select">
                        <option value="">Select payment option</option>
                        <option value="1000">₦1,000 - 7 days delivery</option>
                        <option value="1500">₦1,500 - 24 hours delivery</option>
                        <option value="500">₦500 - 14 days delivery</option>
                    </select>
                </div>

            </div>

            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary me-2 cancel-btn text-white">
                    Cancel
                </a>
                <button type="submit" class="btn btn-light reg-btn">Register Shipment</button>

            </div>
        </form>
    </div>

    <script>
    document.getElementById('status').addEventListener('change', function() {
        let airportField = document.getElementById('airport-field');
        let cityField = document.getElementById('city-field');
        if (this.value === 'At the airport') {
            airportField.classList.remove('d-none');
            cityField.classList.remove('d-none');
        } else {
            airportField.classList.add('d-none');
            cityField.classList.add('d-none');
        }
    });
    </script>



</div>



</div>

@endsection