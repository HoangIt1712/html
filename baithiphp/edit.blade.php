@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Item</h1>
    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="item_code">Item Code</label>
            <input type="text" name="item_code" class="form-control" value="{{ $item->item_code }}" required>
        </div>
        <div class="form-group">
            <label for="item_name">Item Name</label>
            <input type="text" name="item_name" class="form-control" value="{{ $item->item_name }}" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $item->quantity }}" required>
        </div>
        <div class="form-group">
            <label for="expried_date">Expired Date</label>
            <input type="date" name="expried_date" class="form-control" value="{{ $item->expried_date }}" required>
        </div>
        <div class="form-group">
            <label for="note">Note</label>
            <input type="text" name="note" class="form-control" value="{{ $item->note }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
</div>
@endsection
