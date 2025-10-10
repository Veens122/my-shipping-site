@extends('admin_layouts.app')
@section('content')

<!-- Success Message -->
<div class="alert alert-success" role="alert" id="successAlert" style="display: none;">
    <i class="fas fa-check-circle me-2"></i>
    <span id="successMessage">Profile updated successfully!</span>
</div>

<!-- Profile Header -->
<div class="profile-header">
    <h1 class="profile-title">My Profile</h1>
    <p class="profile-subtitle">Manage your account information and preferences</p>
</div>

<!-- Profile Card -->
<div class="profile-card">
    <div class="profile-card-header">
        <div class="profile-avatar" id="profileAvatar">A</div>
        <h2 class="profile-name" id="profileName">Admin User</h2>
        <p class="profile-role">Administrator</p>
    </div>

    <div class="profile-card-body">
        <div class="info-grid">
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="info-content">
                    <h3>Full Name</h3>
                    <p id="infoName">{{ auth()->user()->name }}</p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="info-content">
                    <h3>Email Address</h3>
                    <p id="infoEmail">{{ auth()->user()->email }}</p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="info-content">
                    <h3>Member Since</h3>
                    <p id="infoJoinDate">{{ auth()->user()->created_at->format('F d, Y') }}</p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="info-content">
                    <h3>Account Status</h3>
                    <p id="infoStatus">
                        {{ auth()->user()->status ?? 'Active' }}
                    </p>
                </div>
            </div>
        </div>


        <div class="action-buttons">
            <button class="btn btn-primary-custom " id="editProfileBtn">
                <a href="{{ route('admin.profile.profile-edit') }}" class="text-white "><i class="fas fa-edit"></i> Edit
                    Profile</a>

            </button>
            <button class="btn btn-danger-custom" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="fas fa-trash-alt"></i> Delete Account
            </button>
        </div>
    </div>
</div>

<!-- Stats Section -->
<!-- <div class="stats-section">
    <h3 class="stats-title">Account Statistics</h3>
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon shipments">
                <i class="fas fa-truck"></i>
            </div>
            <div class="stat-value">1,247</div>
            <div class="stat-label">Total Shipments</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon delivered">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-value">984</div>
            <div class="stat-label">Delivered</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon pending">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-value">156</div>
            <div class="stat-label">Pending</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon shipments">
                <i class="fas fa-percentage"></i>
            </div>
            <div class="stat-value">78.9%</div>
            <div class="stat-label">Success Rate</div>
        </div>
    </div>
</div> -->
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteAccountForm">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Account Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>This action cannot be undone. This will permanently delete your account and remove all data
                        associated with it.</p>
                    <div class="mb-3">
                        <label for="password" class="form-label">Please enter your password to confirm:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        <div class="invalid-feedback" id="passwordError"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger-custom">
                        <i class="fas fa-trash-alt me-1"></i> Delete Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editProfileForm">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Full Name</label>
                        <input type="text" name="name" id="editName" class="form-control" value="Admin User" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email Address</label>
                        <input type="email" name="email" id="editEmail" class="form-control" value="admin@example.com"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="editAvatar" class="form-label">Avatar Initial</label>
                        <input type="text" name="avatar" id="editAvatar" class="form-control" maxlength="1" value="A">
                        <div class="form-text">Enter a single character for your avatar</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-custom">
                        <i class="fas fa-save me-1"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection