@extends('admin.layouts.app')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <h5 class="fw-semibold mb-4">Edit Product</h5>

        <form method="POST"
            action="{{ route('admin.products.update', $product) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">

                {{-- CATEGORY --}}
                <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                        @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}"
                            @selected($product->category_id == $cat->id)>
                            {{ $cat->name_en }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- FEATURED --}}
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-check">
                        <input class="form-check-input"
                            type="checkbox"
                            name="is_featured"
                            value="1"
                            @checked($product->is_featured)>
                        <label class="form-check-label">
                            Featured Product
                        </label>
                    </div>
                </div>

                {{-- NAME --}}
                <div class="col-md-6">
                    <label class="form-label">Name (ID)</label>
                    <input class="form-control"
                        name="name_id"
                        value="{{ $product->name_id }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Name (EN)</label>
                    <input class="form-control"
                        name="name_en"
                        value="{{ $product->name_en }}">
                </div>

                {{-- SHORT DESC --}}
                <div class="col-md-6">
                    <label class="form-label">Short Desc (ID)</label>
                    <textarea class="form-control" rows="2"
                        name="short_desc_id">{{ $product->short_desc_id }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Short Desc (EN)</label>
                    <textarea class="form-control" rows="2"
                        name="short_desc_en">{{ $product->short_desc_en }}</textarea>
                </div>

                {{-- SPECS --}}
                <div class="col-md-12">
                    <label class="form-label">Specifications</label>

                    <div id="spec-wrapper">
                        @foreach ($product->specs ?? [] as $spec)
                        <input class="form-control mb-2"
                            name="specs[]"
                            value="{{ $spec }}">
                        @endforeach
                    </div>

                    <button type="button"
                        class="btn btn-sm btn-outline-secondary"
                        onclick="addSpec()">+ Add Spec</button>
                </div>

                {{-- IMAGE --}}
                <div class="col-md-6">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">

                    <img src="{{ asset('storage/'.$product->image) }}"
                        class="mt-2 rounded"
                        height="80">
                </div>

            </div>

            <div class="mt-4 text-end">
                <button class="btn btn-primary">
                    Update Product
                </button>
            </div>

        </form>
    </div>
</div>

<script>
    function addSpec() {
        const wrapper = document.getElementById('spec-wrapper');
        const input = document.createElement('input');
        input.className = 'form-control mb-2';
        input.name = 'specs[]';
        input.placeholder = 'e.g. Capacity: 10–50 Ton/H';
        wrapper.appendChild(input);
    }
</script>

@endsection