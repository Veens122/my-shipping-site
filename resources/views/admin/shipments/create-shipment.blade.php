@extends('admin_layouts.app')
@section('content')

<!-- Main Content -->


<div class="card">
    <div class="card-header">
        <h2 class="card-title">Package Information</h2>
    </div>

    <form id="packageForm" action="{{ route('shipment.store') }}" method="POST">
        @csrf

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="senderName">Sender Name</label>
                <input type="text" name="sender_name" placeholder="Enter the sender's name"
                    value="{{ old('sender_name') }}" class="form-control" id="senderName" required>
                @error('sender_name')
                <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="senderPhone">Sender Phone</label>
                <input type="tel" name="sender_phone" placeholder="Enter the sender's number"
                    value="{{ old('sender_phone') }}" class="form-control" id="senderPhone">
                @error('sender_phone')
                <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="senderAddress">Sender Address</label>
                <input type="text" value="{{ old('sender_address') }}" name="sender_address"
                    placeholder="Enter the address of the receiver" class="form-control" id="senderAddress" required>
                @error('sender_address')
                <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="senderCity">Sender City</label>
                <input type="text" value="{{ old('sender_city') }}" name="sender_city"
                    placeholder="Enter the receiver's city" class="form-control" id="senderCity" required>
                @error('sender_city')
                <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="recipientName">Recipient Name</label>
                <input type="text" value="{{ old('recipient_name') }}" name="recipient_name"
                    placeholder="Enter the name of the receiver" class="form-control" id="recipientName" required>
                @error('recipient_name')
                <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="recipientPhone">Recipient Phone</label>
                <input type="tel" value="{{ old('recipient_phone') }}" name="recipient_phone"
                    placeholder="Enter the receiver's phone number" class="form-control" id="recipientPhone" required>
                @error('recipient_phone')
                <span class="text-danger"> {{ $message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="recipientAddress">Recipient Address</label>
                <input type="text" value="{{ old('recipient_address') }}" name="recipient_address"
                    placeholder="Enter receiver's address" class="form-control" id="recipientAddress" required>
                @error('recipient_address')
                <span class="text-danger"> {{ $message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="recipientCity">Recipient City</label>
                <input type="text" value="{{ old('recipient_city') }}" name="recipient_city"
                    placeholder="Enter the recever's city" class="form-control" id="recipientCity" required>
                @error('recipient_city')
                <span class="text-danger"> {{ $message}}</span>
                @enderror
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="packageType">Package Type</label>
                <select class="form-select" name="package_type" id="packageType" required>
                    <option value="">Select package type</option>
                    <option value="document">Document</option>
                    <option value="parcel">Parcel</option>
                    <option value="box">Box</option>
                    <option value="pallet">Pallet</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="packageWeight">Weight (kg)</label>
                <input type="number" class="form-control" id="packageWeight" min="0.1" step="0.1">
            </div>

            <div class="form-group">
                <label class="form-label" for="packageDimensions">Dimensions (L×W×H in cm)</label>
                <input type="text" class="form-control" id="packageDimensions" placeholder="e.g., 30×20×10">
            </div>

            <div class="form-group">
                <label class="form-label" for="serviceType">Service Type</label>
                <select class="form-select" id="serviceType" required>
                    <option value="">Select service type</option>
                    <option value="standard">Standard Delivery</option>
                    <option value="express">Express Delivery</option>
                    <option value="priority">Priority Delivery</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="packageDescription">Package Description</label>
            <textarea class="form-control" id="packageDescription" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="insurance">Insurance Value ($)</label>
            <input type="number" class="form-control" id="insurance" min="0" value="0">
        </div>

        <div class="form-group">
            <button type="submit" class="btn-primary">Register Package</button>
        </div>
    </form>
</div>
</div>

<!-- Success Modal -->
<!-- <div class="modal-overlay" id="successModal" @if(session('success')) style="display:block;" @else style="display:none;"
    @endif>
    <div class="modal">
        <div class="modal-header">
            <h2 class="modal-title">Package Registered Successfully!</h2>
            <button class="modal-close" id="modalClose">&times;</button>
        </div>

        @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>

        <p>Your package has been registered successfully. Please note your tracking number:</p>

        <div class="tracking-number" id="generatedTrackingNumber">
            {{ session('tracking') }}
        </div>

        <p>You can use this tracking number to monitor your package's status.</p>
        @endif

        <div class="modal-actions">
            <button class="btn-secondary" id="printReceipt">Print Receipt</button>
            <button class="btn-primary" id="trackPackage">Track This Package</button>
            <button class="btn-secondary" id="registerAnother">Register Another Package</button>
        </div>
    </div>
</div> -->




@endsection