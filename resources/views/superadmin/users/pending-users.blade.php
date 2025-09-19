@extends('super_admin_layouts.app')

@section('content')


<!-- Pending Approvals Table -->
<div class="card mt-4">
    <div class="card-header bg-white border-bottom-0">
        <h3 class="h5 mb-0 d-flex align-items-center">
            <i class="fas fa-user-check text-primary me-2"></i> Pending User Approvals
        </h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registered At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pendingUsers ?? [] as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                    <td class="d-flex gap-2">
                        <form action="{{ route('superadmin.approveUser', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success btn-sm">Approve</button>
                        </form>
                        <form action="{{ route('superadmin.rejectUser', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Reject</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No pending approvals</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection