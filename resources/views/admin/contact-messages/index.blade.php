@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-semibold mb-0">Contact Messages</h5>
    <span class="badge bg-primary">{{ $messages->total() }} Pesan</span>
</div>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>HP</th>
                        <th>Perusahaan</th>
                        <th>Subjek</th>
                        <th>Tanggal</th>
                        <th width="140">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>{{ $message->company ?? '-' }}</td>
                        <td>{{ Str::limit($message->subject, 40) }}</td>
                        <td>{{ $message->created_at->format('d M Y, H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.contact-messages.show', $message) }}"
                                class="btn btn-sm btn-outline-primary">Detail</a>

                            <form method="POST"
                                action="{{ route('admin.contact-messages.destroy', $message) }}"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Hapus pesan ini?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            Belum ada pesan masuk.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- PAGINATION --}}
@if ($messages->hasPages())
<div class="mt-3 d-flex justify-content-end">
    {{ $messages->links() }}
</div>
@endif

@endsection