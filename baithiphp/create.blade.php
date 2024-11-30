@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Item</h1>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="item_code">Item Code</label>
            <input type="text" name="item_code" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="item_name">Item Name</label>
            <input type="text" name="item_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="expried_date">Expired Date</label>
            <input type="date" name="expried_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="note">Note</label>
            <input type="text" name="note" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
</div>
@endsection
