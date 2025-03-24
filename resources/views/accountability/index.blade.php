@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4 p-4">
        <h2 class="text-primary fw-bold text-center mb-4">BRO Entry Page</h2>

        @if(session('success'))
        @endif

        <!-- Add Record Button -->
        <button class="btn btn-primary w-100 py-2 rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#addRecordForm">
            + Add New Record
        </button>

        <!-- Collapsible Form -->
        <div class="collapse mt-4" id="addRecordForm">
            <div class="card p-4 shadow-sm border-0 rounded-3">
                <form action="{{ route('accountability.store') }}" method="POST">
                    @csrf
                    <div id="recordContainer">
                        <div class="row g-3 record-group">
                            <div class="col-md-4">
                                <input type="text" name="id_number[]" class="form-control rounded-3" placeholder="Position" required>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="name[]" class="form-control rounded-3" placeholder="Name" required>
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="date[]" class="form-control rounded-3" required>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="quantity[]" class="form-control rounded-3" placeholder="Quantity">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="description[]" class="form-control rounded-3" placeholder="Description">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="ser_no[]" class="form-control rounded-3" placeholder="Serial No.">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="status[]" class="form-control rounded-3" placeholder="Status">
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-danger remove-entry">Remove</button>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons Container -->
                    <div class="mt-3">
                        <button type="button" id="addMore" class="btn btn-primary">Add More</button>
                        <button type="submit" id="saveRecord" class="btn btn-success" disabled>Save Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .record-group {
        border: 2px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 10px;
        background: #f6f3fa;
    }
    .record-group input {
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .remove-entry {
        background-color: #dc3545;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        color: white;
        font-size: 14px;
    }
    .remove-entry:hover {
        background-color: #c82333;
    }
</style>

<script>
    document.getElementById('addMore').addEventListener('click', function() {
        let container = document.getElementById('recordContainer');
        let lastGroup = document.querySelector('.record-group:last-of-type');
        let newGroup = lastGroup.cloneNode(true);

        // Copy existing input values
        newGroup.querySelectorAll('input').forEach((input, index) => {
            input.value = lastGroup.querySelectorAll('input')[index].value;
        });

        newGroup.querySelector('.remove-entry').addEventListener('click', function() {
            this.closest('.record-group').remove();
            checkIfEmpty();
        });

        container.appendChild(newGroup);
        checkIfEmpty();
    });

    function checkIfEmpty() {
        let container = document.getElementById('recordContainer');
        let saveButton = document.getElementById('saveRecord');
        saveButton.disabled = container.querySelectorAll('.record-group').length === 0;
    }

    checkIfEmpty();
</script>
@endsection
