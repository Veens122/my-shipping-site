@extends('admin_layouts.app')
@section('content')
<div class="form-container">
    <div class="form-card">
        <div class="card-header">
            <h1 class="card-title">
                <i class="fas fa-edit"></i> Edit Shipment
            </h1>
        </div>

        <form id="packageForm" action="{{ route('shipments.update-shipment-edit', $shipment->id) }}" method="POST"
            class="card-body">
            @csrf
            @method('PUT')

            <!-- Tracking Number (Read-only) -->
            <div class="tracking-number-group">
                <div class="tracking-label">
                    <i class="fas fa-barcode"></i> Tracking Number
                </div>
                <div class="tracking-value">{{ $shipment->tracking_number }}</div>
            </div>

            <!-- Sender & Recipient Information -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-users"></i> Contact Information
                </h3>

                <div class="form-grid">
                    <!-- Sender Details -->
                    <div class="form-group">
                        <label class="form-label" for="senderName">
                            <i class="fas fa-user"></i> Sender Name
                        </label>
                        <input type="text" name="sender_name" value="{{ old('sender_name', $shipment->sender_name) }}"
                            class="form-control" id="senderName" required>
                        @error('sender_name')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="senderPhone">
                            <i class="fas fa-phone"></i> Sender Phone
                        </label>
                        <input type="tel" name="sender_phone" value="{{ old('sender_phone', $shipment->sender_phone) }}"
                            class="form-control" id="senderPhone">
                        @error('sender_phone')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="senderAddress">
                            <i class="fas fa-map-marker-alt"></i> Sender Address
                        </label>
                        <input type="text" name="sender_address"
                            value="{{ old('sender_address', $shipment->sender_address) }}" class="form-control"
                            id="senderAddress" required>
                        @error('sender_address')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="senderCity">
                            <i class="fas fa-city"></i> Sender City
                        </label>
                        <input type="text" name="sender_city" value="{{ old('sender_city', $shipment->sender_city) }}"
                            class="form-control" id="senderCity" required>
                        @error('sender_city')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Recipient Details -->
                    <div class="form-group">
                        <label class="form-label" for="recipientName">
                            <i class="fas fa-user-check"></i> Recipient Name
                        </label>
                        <input type="text" name="recipient_name"
                            value="{{ old('recipient_name', $shipment->recipient_name) }}" class="form-control"
                            id="recipientName" required>
                        @error('recipient_name')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="recipientPhone">
                            <i class="fas fa-mobile-alt"></i> Recipient Phone
                        </label>
                        <input type="tel" name="recipient_phone"
                            value="{{ old('recipient_phone', $shipment->recipient_phone) }}" class="form-control"
                            id="recipientPhone" required>
                        @error('recipient_phone')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="recipientAddress">
                            <i class="fas fa-map-pin"></i> Recipient Address
                        </label>
                        <input type="text" name="recipient_address"
                            value="{{ old('recipient_address', $shipment->recipient_address) }}" class="form-control"
                            id="recipientAddress" required>
                        @error('recipient_address')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="recipientCity">
                            <i class="fas fa-building"></i> Recipient City
                        </label>
                        <input type="text" name="recipient_city"
                            value="{{ old('recipient_city', $shipment->recipient_city) }}" class="form-control"
                            id="recipientCity" required>
                        @error('recipient_city')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Package Details -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-box"></i> Package Details
                </h3>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="packageType">
                            <i class="fas fa-cube"></i> Package Type
                        </label>
                        <select class="form-select" name="package_type" id="packageType" required>
                            <option value="">Select package type</option>
                            <option value="document" {{ $shipment->package_type == 'document' ? 'selected' : '' }}>
                                Document</option>
                            <option value="parcel" {{ $shipment->package_type == 'parcel' ? 'selected' : '' }}>
                                Parcel</option>
                            <option value="box" {{ $shipment->package_type == 'box' ? 'selected' : '' }}>Box
                            </option>
                            <option value="pallet" {{ $shipment->package_type == 'pallet' ? 'selected' : '' }}>
                                Pallet</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="packageWeight">
                            <i class="fas fa-weight-hanging"></i> Weight (kg)
                        </label>
                        <div class="input-with-icon">
                            <input type="number" class="form-control" name="weight" id="packageWeight" min="0.1"
                                step="0.1" value="{{ old('weight', $shipment->weight) }}">
                            <span class="input-icon">kg</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="packageDimensions">
                            <i class="fas fa-ruler-combined"></i> Dimensions (L×W×H in cm)
                        </label>
                        <input type="text" class="form-control" name="dimensions" id="packageDimensions"
                            value="{{ old('dimensions', $shipment->dimensions) }}" placeholder="e.g., 30×20×10">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="serviceType">
                            <i class="fas fa-shipping-fast"></i> Service Type
                        </label>
                        <select class="form-select" name="service_type" id="serviceType" required>
                            <option value="">Select service type</option>
                            <option value="standard" {{ $shipment->service_type == 'standard' ? 'selected' : '' }}>
                                Standard Delivery</option>
                            <option value="express" {{ $shipment->service_type == 'express' ? 'selected' : '' }}>
                                Express Delivery</option>
                            <option value="priority" {{ $shipment->service_type == 'priority' ? 'selected' : '' }}>
                                Priority Delivery</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="packageDescription">
                        <i class="fas fa-file-alt"></i> Package Description
                    </label>
                    <textarea class="form-control" name="description" id="packageDescription" rows="3"
                        placeholder="Enter package contents and special instructions">{{ old('description', $shipment->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="insurance">
                        <i class="fas fa-shield-alt"></i> Insurance Value ($)
                    </label>
                    <div class="input-with-icon">
                        <input type="number" class="form-control" name="insurance_value" id="insurance" min="0"
                            value="{{ old('insurance_value', $shipment->insurance_value ?? 0) }}">
                        <span class="input-icon">$</span>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <button type="submit" class="btn-primary-custom">
                    <i class="fas fa-save"></i> Update Shipment
                </button>

                <button type="button" class="btn-secondary-custom" onclick="window.history.back();">
                    <i class="fas fa-times"></i> Cancel
                </button>
            </div>
        </form>
    </div>
</div>

@endsection