@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-semibold mb-0">Detail Pesan</h5>
    <a href="{{ route('admin.contact-messages.index') }}"
        class="btn btn-sm btn-outline-secondary">← Kembali</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <table class="table table-borderless">
            <tr>
                <th width="150">Nama</th>
                <td>{{ $contactMessage->name }}</td>
            </tr>
            <tr>
                <th>HP</th>
                <td>{{ $contactMessage->phone }}</td>
            </tr>
            <tr>
                <th>Perusahaan</th>
                <td>{{ $contactMessage->company ?? '-' }}</td>
            </tr>
            <tr>
                <th>Subjek</th>
                <td>{{ $contactMessage->subject }}</td>
            </tr>
            <tr>
                <th>Pesan</th>
                <td>{{ $contactMessage->message }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{ $contactMessage->created_at->format('d M Y, H:i') }}</td>
            </tr>
        </table>

        <div class="mt-3 d-flex gap-2">
            <form method="POST"
                action="{{ route('admin.contact-messages.destroy', $contactMessage) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger btn-sm"
                    onclick="return confirm('Hapus pesan ini?')">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>

@endsection