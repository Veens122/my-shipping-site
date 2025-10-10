@extends('admin_layouts.app')
@section('content')

<div class="package-container">
    <div class="package-card">
        <div class="card-header">
            <h1 class="card-title">
                <i class="fas fa-box-open"></i> Package Information
            </h1>
        </div>

        <div class="card-body">
            <form id="packageForm" action="{{ route('shipment.store') }}" method="POST">
                @csrf

                <!-- Sender & Recipient Information -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-users"></i> Contact Information
                    </h3>

                    <div class="form-grid">
                        <!-- Sender Details -->
                        <div class="form-group">
                            <label class="form-label required" for="senderName">
                                <i class="fas fa-user"></i> Sender Name
                            </label>
                            <input type="text" name="sender_name" value="{{ old('sender_name') }}"
                                placeholder="Enter the sender's name" class="form-control" id="senderName" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="senderPhone">
                                <i class="fas fa-phone"></i> Sender Phone
                            </label>
                            <input type="tel" name="sender_phone" value="{{ old('sender_phone') }}"
                                placeholder="Enter the sender's number" class="form-control" id="senderPhone">
                        </div>

                        <div class="form-group">
                            <label class="form-label required" for="senderAddress">
                                <i class="fas fa-map-marker-alt"></i> Sender Address
                            </label>
                            <input type="text" value="{{ old('sender_address') }}" name="sender_address"
                                placeholder="Enter the sender's address" class="form-control" id="senderAddress"
                                required>
                        </div>

                        <div class="form-group">
                            <label class="form-label required" for="senderCity">
                                <i class="fas fa-city"></i> Sender City
                            </label>
                            <input type="text" value="{{ old('sender_city') }}" name="sender_city"
                                placeholder="Enter the sender's city" class="form-control" id="senderCity" required>
                        </div>

                        <!-- Recipient Details -->
                        <div class="form-group">
                            <label class="form-label required" for="recipientName">
                                <i class="fas fa-user-check"></i> Recipient Name
                            </label>
                            <input type="text" value="{{ old('recipient_name') }}" name="recipient_name"
                                placeholder="Enter the name of the receiver" class="form-control" id="recipientName"
                                required>
                        </div>

                        <div class="form-group">
                            <label class="form-label required" for="recipientPhone">
                                <i class="fas fa-mobile-alt"></i> Recipient Phone
                            </label>
                            <input type="tel" value="{{ old('recipient_phone') }}" name="recipient_phone"
                                placeholder="Enter the receiver's phone number" class="form-control" id="recipientPhone"
                                required>
                        </div>

                        <div class="form-group">
                            <label class="form-label required" for="recipientAddress">
                                <i class="fas fa-map-pin"></i> Recipient Address
                            </label>
                            <input type="text" value="{{ old('recipient_address') }}" name="recipient_address"
                                placeholder="Enter receiver's address" class="form-control" id="recipientAddress"
                                required>
                        </div>

                        <div class="form-group">
                            <label class="form-label required" for="recipientCity">
                                <i class="fas fa-building"></i> Recipient City
                            </label>
                            <input type="text" value="{{ old('recipient_city') }}" name="recipient_city"
                                placeholder="Enter the receiver's city" class="form-control" id="recipientCity"
                                required>
                        </div>
                    </div>
                </div>

                <!-- Package Details -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-box"></i> Package Details
                    </h3>

                    <div class="row g-3">
                        <!-- Package Type -->
                        <div class="col-md-6">
                            <label class="form-label required">
                                <i class="fas fa-cube"></i> Package Type
                            </label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check border rounded p-2">
                                        <input class="form-check-input" type="radio" name="package_type"
                                            id="typeDocument" value="document">
                                        <label class="form-check-label w-100" for="typeDocument">
                                            <i class="fas fa-file-alt me-2 text-primary"></i> Document
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check border rounded p-2">
                                        <input class="form-check-input" type="radio" name="package_type" id="typeParcel"
                                            value="parcel">
                                        <label class="form-check-label w-100" for="typeParcel">
                                            <i class="fas fa-box me-2 text-success"></i> Parcel
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-check border rounded p-2">
                                        <input class="form-check-input" type="radio" name="package_type" id="typeBox"
                                            value="box">
                                        <label class="form-check-label w-100" for="typeBox">
                                            <i class="fas fa-archive me-2 text-warning"></i> Box
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-check border rounded p-2">
                                        <input class="form-check-input" type="radio" name="package_type" id="typePallet"
                                            value="pallet">
                                        <label class="form-check-label w-100" for="typePallet">
                                            <i class="fas fa-pallet me-2 text-danger"></i> Pallet
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Weight -->
                        <div class="col-md-6">
                            <label class="form-label" for="packageWeight">
                                <i class="fas fa-weight-hanging"></i> Weight (kg)
                            </label>
                            <input type="number" class="form-control" name="weight" id="packageWeight" min="0.1"
                                step="0.1" placeholder="0.00">
                        </div>

                        <!-- Dimensions -->
                        <div class="col-md-12">
                            <label class="form-label required">
                                <i class="fas fa-ruler-combined"></i> Dimensions (L×W×H in cm)
                            </label>
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input type="number" name="length" class="form-control" placeholder="Length"
                                        step="0.01">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="width" class="form-control" placeholder="Width"
                                        step="0.01">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="height" class="form-control" placeholder="Height"
                                        step="0.01">
                                </div>
                            </div>
                        </div>

                        <!-- Service Type -->
                        <div class="col-md-12">
                            <label class="form-label required">
                                <i class="fas fa-shipping-fast"></i> Service Type
                            </label>
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <div class="form-check border rounded p-2">
                                        <input class="form-check-input" type="radio" name="service_type"
                                            id="serviceStandard" value="standard">
                                        <label class="form-check-label w-100" for="serviceStandard">
                                            <strong>Standard</strong>
                                            <div class="small text-muted">5-7 business days</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check border rounded p-2">
                                        <input class="form-check-input" type="radio" name="service_type"
                                            id="serviceExpress" value="express">
                                        <label class="form-check-label w-100" for="serviceExpress">
                                            <strong>Express</strong>
                                            <div class="small text-muted">2-3 business days</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check border rounded p-2">
                                        <input class="form-check-input" type="radio" name="service_type"
                                            id="servicePriority" value="priority">
                                        <label class="form-check-label w-100" for="servicePriority">
                                            <strong>Priority</strong>
                                            <div class="small text-muted">24 hours</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Package Description -->
                    <div class="form-group">
                        <label class="form-label" for="packageDescription">
                            <i class="fas fa-file-alt"></i> Package Description
                        </label>
                        <textarea class="form-control" name="description" id="packageDescription" rows="3"
                            placeholder="Describe the package contents and any special instructions"></textarea>
                    </div>

                    <!-- Insurance -->
                    <div class="form-group">
                        <label class="form-label" for="insurance">
                            <i class="fas fa-shield-alt"></i> Insurance Value ($)
                        </label>
                        <input type="number" class="form-control" name="insurance_value" id="insurance" min="0"
                            value="0" placeholder="0">
                    </div>

                    <!-- Initial Location with Lat/Lng -->
                    <div class="form-group">
                        <label class="form-label" for="initialLocation">
                            <i class="fas fa-map-pin"></i> Initial Location
                        </label>
                        <input type="text" name="location" id="initialLocation" class="form-control"
                            placeholder="Enter starting location" required>
                    </div>

                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary-custom">
                        <i class="fas fa-shipping-fast"></i> Register Package
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Auto fetch latitude/longitude for location input
document.getElementById('initialLocation').addEventListener('blur', function() {
    let address = this.value;
    if (address.length > 3) {
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${address}`)
            .then(res => res.json())
            .then(data => {
                if (data.length > 0) {
                    document.getElementById('latitude').value = data[0].lat;
                    document.getElementById('longitude').value = data[0].lon;
                }
            })
            .catch(err => console.error(err));
    }
});
</script>

@endsection