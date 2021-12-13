<div class="row">
    <div class="col-sm-4 py-1">
        <input type="hidden" name="counsellor" value="Admin">
        <input type="text" class="form-control" name="username" placeholder="enter username" value="{{ $student->username }}" readonly>
    </div>
    <div class="col-sm-4 py-1">
        <input type="email" class="form-control" name="email" placeholder="enter email" value="{{ $student->email }}" readonly>
    </div>
    <div class="col-sm-4 py-1">
        <select name="fee_type" id="fee_type" wire:model="SelectedFee" class="form-control" wire:model="selectedFee" required>
            <option value="" selected>Select Fee Type</option>
            <option value="Procesing Fees">Procesing Fees</option>
            <option value="Application Fees">Application Fees</option>
            <option value="College Fees">College Fees</option>
            <option value="University Fees">University Fees</option>
            <option value="School Fees">School Fees</option>
            <option value="Embassy Fees">Embassy Fees</option>
           

        </select>
    </div>
    <div class="col-sm-4 py-1">
        <input type="text" name="amount" wire:model="amount" id="amount"
        class="form-control" required placeholder="Enter Amount">
    </div>
    <div class="col-sm-4 py-1">
        <input type="text" name="total" wire:model="total" id="total"
        class="form-control" required placeholder="Enter Total" readonly>
    </div>
    <div class="col-sm-4 py-1">
        <input type="text" name="created_at" id="created_at" class="form-control"
        value="{{ Carbon\Carbon::now()->toDateString() }}"
        required placeholder="Date" readonly>
    </div>
</div>