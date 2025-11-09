@extends('layouts.app')
@section('content')


<!-- Page Header -->
<header class="page-header">
    <div class="container">
        <h1>TRACK YOUR ORDER</h1>

    </div>
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --info-color: #17a2b8;
            --light-bg: #f8f9fa;
        }




        .page-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
            color: white;
            padding: 4rem 0;
            text-align: center;
            margin-bottom: 2rem;

            background-image: url('../assets/images/tracking.jpg');


            .page-header h1 {
                font-weight: 700;
                margin-bottom: 1rem;
            }

            .tracking-card {
                background: white;
                border-radius: 12px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
                overflow: hidden;
                margin-bottom: 2rem;
            }

            .card-header {
                background-color: var(--light-bg);
                padding: 1.5rem;
                border-bottom: 1px solid #eaeaea;
            }

            .status-badge {
                padding: 0.5rem 1rem;
                border-radius: 50px;
                font-weight: 600;
                font-size: 0.9rem;
            }

            .progress {
                height: 8px;
                border-radius: 4px;
                margin: 1rem 0;
            }

            .delivery-estimate {
                background-color: #f0f7ff;
                border-top: 1px solid #e1e8f0;
                border-bottom: 1px solid #e1e8f0;
            }

            .timeline {
                position: relative;
                padding-left: 2rem;
            }

            .timeline::before {
                content: "";
                position: absolute;
                left: 15px;
                top: 0;
                bottom: 0;
                width: 2px;
                background-color: #e9ecef;
            }

            .timeline-item {
                position: relative;
                margin-bottom: 2rem;
            }

            .timeline-icon {
                position: absolute;
                left: -2rem;
                top: 0;
                width: 32px;
                height: 32px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 0.9rem;
                transform: translateX(-50%);
            }

            .timeline-content {
                padding: 0.5rem 0 0 1.5rem;
            }

            .info-card {
                border-radius: 10px;
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
                height: 100%;
            }

            .utility-links a {
                color: var(--primary-color);
                text-decoration: none;
                padding: 0.5rem 0;
                transition: all 0.3s;
                border-bottom: 1px solid #f0f0f0;
                display: flex;
                align-items: center;
            }

            .utility-links a:hover {
                color: var(--secondary-color);
                padding-left: 0.5rem;
            }

            .utility-links a:last-child {
                border-bottom: none;
            }

            #map {
                height: 400px;
                min-height: 300px;
                background-color: #e9ecef;
            }

            .no-map-data {
                height: 300px;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }

            .map-loading {
                height: 300px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            @media (max-width: 768px) {
                .timeline {
                    padding-left: 1.5rem;
                }

                .timeline-icon {
                    left: -1.5rem;
                }

                .card-header {
                    flex-direction: column;
                    text-align: center;
                }

                .status-badge {
                    margin-top: 1rem;
                    align-self: center;
                }
            }

            .share-tracking {
                background-color: #f8f9fa;
                border-radius: 8px;
                padding: 1rem;
                margin-top: 1rem;
            }

            .copy-btn {
                cursor: pointer;
                transition: all 0.3s;
            }

            .copy-btn:hover {
                background-color: #e9ecef;
            }

            .notification-options {
                background-color: #f8f9fa;
                border-radius: 8px;
                padding: 1rem;
                margin-top: 1rem;
            }
    </style>
</header>

<!-- Main Content -->
<div class="container mb-5">
    <!-- Tracking Info Card -->
    <div class="tracking-card">
        <!-- Header -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">Shipment Status</h4>
                <p class="mb-0 text-muted">Tracking #: <strong
                        id="tracking-number">{{ $shipment->tracking_number }}</strong></p>
            </div>
            <span class="status-badge 
                    @if($shipment->status == 'Delivered') bg-success 
                    @elseif($shipment->status == 'In Transit') bg-info 
                    @elseif($shipment->status == 'Out for Delivery') bg-warning 
                    @else bg-secondary @endif" id="status-badge">
                {{ $shipment->status }}
            </span>
        </div>

        <!-- Progress Bar -->
        <div class="px-4 pt-3">
            <div class="d-flex justify-content-between">
                <small>Order Placed</small>
                <small>Out for Delivery</small>
                <small>Delivered</small>
            </div>
            <div class="progress" role="progressbar"
                aria-valuenow="@if($shipment->status == 'Delivered') 100 @elseif($shipment->status == 'Out for Delivery') 75 @elseif($shipment->status == 'In Transit') 50 @else 25 @endif"
                aria-valuemin="0" aria-valuemax="100" aria-label="Shipment progress">
                <div class="progress-bar 
                        @if($shipment->status == 'Delivered') bg-success w-100
                        @elseif($shipment->status == 'Out for Delivery') bg-warning w-75
                        @elseif($shipment->status == 'In Transit') bg-info w-50
                        @else bg-secondary w-25 @endif" id="progress-bar">
                </div>
            </div>
        </div>

        <!-- Delivery Estimate -->
        <div class="p-4 delivery-estimate">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="mb-1">Estimated Delivery</h6>
                    <p class="mb-0 fw-bold" id="estimated-delivery">
                        @if($shipment->arrival_date)
                        {{ \Carbon\Carbon::parse($shipment->arrival_date)->format('l, F j, Y') }}
                        @else
                        N/A
                        @endif
                    </p>
                    <small class="text-muted">
                        Note: The package may arrive earlier or later than the estimated date.
                    </small>
                </div>

                @php
                $lastUpdate = $shipment->updates->last();
                $lastUpdatedDate = $lastUpdate
                ? ($lastUpdate->update_time ?? $lastUpdate->created_at)
                : $shipment->created_at;
                @endphp

                <div class="col-md-6 text-md-end">
                    <h6 class="mb-1">Last Updated</h6>
                    <p class="mb-0" id="last-updated">
                        {{ \Carbon\Carbon::parse($lastUpdatedDate)->format('F j, Y \a\t g:i A') }}
                    </p>

                    @if($shipment->transit_date)
                    <p>Placed on Transit:
                        {{ \Carbon\Carbon::parse($shipment->in_transit_date)->format('F j, Y \a\t g:i A') }}
                    </p>
                    @endif

                    @if($shipment->delivered_date)
                    <p>Delivered: {{ \Carbon\Carbon::parse($shipment->delivered_date)->format('F j, Y \a\t g:i A') }}
                    </p>
                    @endif
                </div>

            </div>
        </div>

        <!-- Share Tracking -->
        <div class="share-tracking mx-4 mt-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-1">Share Tracking</h6>
                    <p class="mb-0 text-muted small">Share this tracking number with others</p>
                </div>
                <button class="btn btn-outline-primary btn-sm copy-btn" id="copy-tracking">
                    <i class="fas fa-copy me-1"></i> Copy
                </button>
            </div>
        </div>

        <!-- Timeline -->
        <div class="p-4">
            <h5 class="mb-4">Tracking History</h5>

            <!-- Status Dates -->
            @if($shipment->transit_date)
            <p>Placed on Transit: {{ \Carbon\Carbon::parse($shipment->in_transit_date)->format('F j, Y') }}</p>
            @endif

            @if($shipment->delivered_date)
            <p>Delivered: {{ \Carbon\Carbon::parse($shipment->delivered_date)->format('F j, Y') }}</p>
            @endif

            @if($shipment->received_date)
            <p>Received: {{ \Carbon\Carbon::parse($shipment->received_date)->format('F j, Y') }}</p>
            @endif

            <div class="timeline" id="timeline">
                @foreach($shipment->updates as $update)
                @php
                // Use admin-set status_date if available, otherwise fallback to created_at
                $displayDate = $update->status_date ?? $update->created_at;
                @endphp
                <div class="timeline-item">
                    <div class="timeline-icon
        @if($loop->first) bg-primary
        @elseif($update->status == 'Delivered') bg-success
        @elseif($update->status == 'Out for Delivery') bg-warning
        @elseif($update->status == 'In Transit') bg-info
        @else bg-secondary @endif">
                        @if($update->status == 'Delivered')
                        <i class="fas fa-home"></i>
                        @elseif($update->status == 'Out for Delivery')
                        <i class="fas fa-truck"></i>
                        @elseif($update->status == 'In Transit')
                        <i class="fas fa-plane"></i>
                        @else
                        <i class="fas fa-box"></i>
                        @endif
                    </div>
                    <div class="timeline-content">
                        <h6 class="fw-bold mb-1">{{ $update->status }}</h6>
                        <p class="mb-1 text-muted">{{ $update->description }}</p>
                        <small class="text-secondary">
                            {{ $update->location ? $update->location . ' • ' : '' }}
                            {{ \Carbon\Carbon::parse($displayDate)->format('M j, Y \a\t g:i A') }}
                        </small>
                    </div>
                </div>
                @endforeach


                <!-- Fallback for shipping label creation -->
                <div class="timeline-item">
                    <div class="timeline-icon bg-secondary">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <div class="timeline-content">
                        <h6 class="fw-bold mb-1">Order Created</h6>
                        <p class="mb-1 text-muted">Shipping label has been created</p>
                        <small class="text-secondary">
                            {{ $shipment->sender_city }} •
                            {{ \Carbon\Carbon::parse($shipment->registered_date)->format('M j, Y \a\t g:i A') }}
                        </small>
                    </div>
                </div>
            </div>

        </div>



        <!-- Map -->
        <div id="map" class="map-loading">
            <div class="text-center p-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading map...</span>
                </div>
                <p class="mt-2">Loading shipment route...</p>
            </div>
        </div>

        <!-- Details -->
        <div class="card-body border-top">
            <h5 class="mb-4">Shipment Details</h5>
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <span class="text-muted">Tracking Number</span>
                    <p class="fw-semibold" id="detail-tracking">{{ $shipment->tracking_number }}</p>
                </div>
                <div class="col-md-3 col-6">
                    <span class="text-muted">Origin</span>
                    <p class="fw-semibold" id="detail-origin">{{ $shipment->sender_city }}</p>
                </div>
                <div class="col-md-3 col-6">
                    <span class="text-muted">Destination</span>
                    <p class="fw-semibold" id="detail-destination">{{ $shipment->recipient_city }}</p>
                </div>
                <div class="col-md-3 col-6">
                    <span class="text-muted">Current Location</span>
                    <p class="fw-semibold" id="detail-current">{{ $shipment->current_location ?? 'In transit' }}</p>
                </div>
                <div class="col-md-3 col-6">
                    <span class="text-muted">Weight</span>
                    <p class="fw-semibold" id="detail-weight">{{ $shipment->weight ?? 'N/A' }} kg</p>
                </div>
                <div class="col-md-3 col-6">
                    <span class="text-muted">Service Type</span>
                    <p class="fw-semibold" id="detail-service">{{ $shipment->package_type }}</p>
                </div>
                <div class="col-md-3 col-6">
                    <span class="text-muted">Reference</span>
                    <p class="fw-semibold" id="detail-reference">{{ $shipment->id }}</p>
                </div>
                <div class="col-md-3 col-6">
                    <span class="text-muted">Description</span>
                    <p class="fw-semibold" id="detail-description">{{ $shipment->package_description }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Information -->
    <div class="row mt-4">
        <!-- Delivery Information -->
        <div class="col-lg-6">
            <div class="info-card p-4 bg-white">
                <h5 class="mb-4">Delivery Information</h5>
                <div class="row">
                    <div class="col-md-6">
                        <h6>Sender</h6>
                        <p class="mb-1"><strong id="sender-name">{{ $shipment->sender_name }}</strong></p>
                        <p class="mb-1" id="sender-address">{{ $shipment->sender_address }}</p>
                        <p class="mb-1" id="sender-city">{{ $shipment->sender_city }}</p>
                        <p class="mb-0" id="sender-phone">
                            {{ substr($shipment->sender_phone, 0, 3) . '****' . substr($shipment->sender_phone, -3) }}
                        </p>
                    </div>
                    <div class="col-md-6 mt-3 mt-md-0">
                        <h6>Recipient</h6>
                        <p class="mb-1"><strong id="recipient-name">{{ $shipment->recipient_name }}</strong></p>
                        <p class="mb-1" id="recipient-address">{{ $shipment->recipient_address }}</p>
                        <p class="mb-1" id="recipient-city">{{ $shipment->recipient_city }}</p>
                        <p class="mb-0" id="recipient-phone">
                            {{ substr($shipment->recipient_phone, 0, 3) . '****' . substr($shipment->recipient_phone, -3) }}
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Utility Links -->
        <div class="col-lg-6">
            <div class="info-card p-4 bg-white h-100">
                <h5 class="mb-4">Need Help?</h5>
                <div class="utility-links">
                    <a href="{{ route('shipments.download-receipt', $shipment->id) }}" id="download-receipt"
                        class="d-block mb-3">
                        <i class="fas fa-receipt me-2"></i> View Invoice
                    </a>
                    <a href="{{ route('shipments.label.download', $shipment->id) }}" id="download-label"
                        class="d-block mb-3">
                        <i class="fas fa-edit me-2"></i> View Label
                    </a>
                    <a href="mailto:support@paxrutalogistics.com" class="d-block mb-3">
                        <i class="fas fa-question-circle me-2"></i> Delivery Help
                    </a>
                    <a href="mailto:support@paxrutalogistics.com" class="d-block">
                        <i class="fas fa-headset me-2"></i> Contact Support
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // Format date function
    function formatDate(dateString) {
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        return new Date(dateString).toLocaleDateString('en-US', options);
    }

    function formatDateTime(dateString) {
        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric'
        };
        return new Date(dateString).toLocaleDateString('en-US', options);
    }

    // Initialize the page with shipment data
    document.addEventListener("DOMContentLoaded", function() {
        // Copy tracking number functionality
        document.getElementById('copy-tracking').addEventListener('click', function() {
            const trackingNumber = document.getElementById('tracking-number').textContent;
            navigator.clipboard.writeText(trackingNumber).then(() => {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check me-1"></i> Copied!';
                this.classList.remove('btn-outline-primary');
                this.classList.add('btn-success');

                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('btn-success');
                    this.classList.add('btn-outline-primary');
                }, 2000);
            });
        });

        // Initialize map when it comes into view
        const mapElement = document.getElementById('map');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    initializeMap();
                    observer.unobserve(mapElement);
                }
            });
        });
        observer.observe(mapElement);
    });


    // auto relaod page after download receipt or label
    const downloadLinks = ['download-receipt', 'download-label'];

    downloadLinks.forEach(id => {
        const link = document.getElementById(id);
        if (link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Create hidden iframe to trigger download silently
                const iframe = document.createElement('iframe');
                iframe.style.display = 'none';
                iframe.src = this.href;
                document.body.appendChild(iframe);

                // Reload after 4 seconds (enough for download to start)
                setTimeout(() => {
                    location.reload();
                }, 2000);
            });
        }
    });



    // Initialize the map
    function initializeMap() {
        if (typeof L === 'undefined') {
            document.getElementById('map').innerHTML = `
            <div class="no-map-data">
                <div class="text-center text-muted p-4">
                    <i class="fas fa-exclamation-triangle fa-3x mb-3"></i>
                    <p>Map library failed to load</p>
                    <small>Please check your internet connection</small>
                </div>
            </div>
        `;
            return;
        }

        let updates = @json($updatesWithCoords);

        if (!updates || updates.length === 0) {
            document.getElementById('map').innerHTML = `
            <div class="no-map-data">
                <div class="text-center text-muted p-4">
                    <i class="fas fa-map-marker-alt fa-3x mb-3"></i>
                    <p>Location tracking data not available yet</p>
                    <small>Check back later for updates on your package's location</small>
                </div>
            </div>
        `;
            return;
        }

        // Sort updates by date so latest update is last
        updates.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));

        const colorMap = {
            'bg-success': getComputedStyle(document.documentElement).getPropertyValue('--success-color'),
            'bg-info': getComputedStyle(document.documentElement).getPropertyValue('--info-color'),
            'bg-warning': getComputedStyle(document.documentElement).getPropertyValue('--warning-color'),
            'bg-primary': getComputedStyle(document.documentElement).getPropertyValue('--primary-color'),
            'bg-secondary': getComputedStyle(document.documentElement).getPropertyValue('--secondary-color'),
        };

        const statusConfig = {
            'Delivered': {
                badgeClass: 'bg-success',
                icon: 'fa-home'
            },
            'Out for Delivery': {
                badgeClass: 'bg-warning',
                icon: 'fa-truck'
            },
            'In Transit': {
                badgeClass: 'bg-info',
                icon: 'fa-plane'
            },
            'Package Handed to Carrier': {
                badgeClass: 'bg-primary',
                icon: 'fa-shipping-fast'
            },
            'Order Processed': {
                badgeClass: 'bg-secondary',
                icon: 'fa-box'
            },
            'default': {
                badgeClass: 'bg-secondary',
                icon: 'fa-box'
            }
        };

        let map = L.map('map').setView([updates[0].latitude, updates[0].longitude], 4);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        let markers = [];
        let polylinePoints = [];

        updates.forEach((update, index) => {
            const config = statusConfig[update.status] || statusConfig['default'];

            const iconHtml = `
            <div style="background-color: ${colorMap[config.badgeClass] || '#3498db'}; 
                width: 22px; height: 22px; border-radius: 50%; 
                display: flex; align-items: center; justify-content: center; 
                color: white; font-size: 12px; border: 2px solid white;">
                <i class="fas ${config.icon}"></i>
            </div>
        `;

            const customIcon = L.divIcon({
                html: iconHtml,
                className: 'custom-marker',
                iconSize: [22, 22],
                iconAnchor: [11, 11]
            });

            const lat = parseFloat(update.latitude);
            const lng = parseFloat(update.longitude);

            let marker = L.marker([lat, lng], {
                icon: customIcon
            }).addTo(map);


            const displayDate = update.status_date || update.created_at;
            const popupContent = `
<div class="p-2">
    <strong>${update.status}</strong><br>
    ${update.location || ''}<br>
    <small>${new Date(displayDate).toLocaleString()}</small>
</div>
`;


            marker.bindPopup(popupContent);
            markers.push(marker);
            polylinePoints.push([lat, lng]);

            // Show status label near each marker
            L.tooltip({
                    permanent: true,
                    direction: 'top',
                    offset: [0, -15]
                })
                .setContent(update.status)
                .setLatLng([lat, lng])
                .addTo(map);

            // Open popup for most recent update
            if (index === updates.length - 1) {
                setTimeout(() => marker.openPopup(), 500);
            }
        });

        // Draw connecting line showing movement
        L.polyline(polylinePoints, {
            color: '#007bff',
            weight: 4,
            opacity: 0.8,
            dashArray: '6, 8'
        }).addTo(map);

        let group = new L.featureGroup(markers);
        map.fitBounds(group.getBounds().pad(0.2));

        // Focus on latest update
        const last = updates[updates.length - 1];
        map.setView([last.latitude, last.longitude], 8);



    }
</script>


@endsection