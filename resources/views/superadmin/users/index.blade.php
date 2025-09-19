@extends('super_admin_layouts.app')

@section('content')

<div class="mb-3">
    <form action="{{ route('superadmin.dashboard') }}" method="GET" class="d-inline">
        <select name="filter" class="form-select w-auto d-inline" onchange="this.form.submit()">
            <option value="">All Users</option>
            <option value="pending" {{ request('filter') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="approved" {{ request('filter') == 'approved' ? 'selected' : '' }}>Approved</option>
            <option value="banned" {{ request('filter') == 'banned' ? 'selected' : '' }}>Banned</option>
        </select>
    </form>
</div>

<table class="table table-bordered align-middle">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Registered On</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at->format('d M Y H:i') }}</td>
            <td>
                @if(!$user->is_approved)
                <span class="badge bg-warning">Pending</span>
                @elseif($user->banned_until && $user->banned_until->isFuture())
                <span class="badge bg-danger">Banned (until {{ $user->banned_until->format('d M Y') }})</span>
                @else
                <span class="badge bg-success">Active</span>
                @endif
            </td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Actions
                    </button>
                    <ul class="dropdown-menu">

                        {{-- Approve --}}
                        @if(!$user->is_approved)
                        <li>
                            <form action="{{ route('superadmin.approveUser', $user->id) }}" method="POST">
                                @csrf @method('PATCH')
                                <button class="dropdown-item">Approve</button>
                            </form>
                        </li>
                        @endif

                        {{-- Ban --}}
                        @if(!$user->banned_until || $user->banned_until->isPast())
                        <li>
                            <form action="{{ route('superadmin.banUser', $user->id) }}" method="POST" class="px-3 py-2">
                                @csrf @method('PATCH')
                                <input type="number" name="days" min="1" placeholder="Ban Days" required
                                    class="form-control form-control-sm mb-2">
                                <button class="btn btn-danger btn-sm w-100">Ban</button>
                            </form>
                        </li>
                        @endif

                        {{-- Unban --}}
                        @if($user->banned_until && $user->banned_until->isFuture())
                        <li>
                            <form action="{{ route('superadmin.unbanUser', $user->id) }}" method="POST">
                                @csrf @method('PATCH')
                                <button class="dropdown-item text-warning">Unban</button>
                            </form>
                        </li>
                        @endif

                        {{-- Set Active Days --}}
                        <li>
                            <form action="{{ route('superadmin.setActiveDays', $user->id) }}" method="POST"
                                class="px-3 py-2">
                                @csrf @method('PATCH')
                                <input type="number" name="days" min="1" placeholder="Active Days" required
                                    class="form-control form-control-sm mb-2">
                                <button class="btn btn-primary btn-sm w-100">Set Active</button>
                            </form>
                        </li>

                        {{-- Delete --}}
                        <li>
                            <form action="{{ route('superadmin.deleteUser', $user->id) }}" method="POST"
                                onsubmit="return confirm('Delete this user permanently?');">
                                @csrf @method('DELETE')
                                <button class="dropdown-item text-danger">Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center text-muted">No users found</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection