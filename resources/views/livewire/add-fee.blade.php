<div class="row">
    <div class="col-sm-4 py-1">
        <input type="hidden" name="counsellor" value="Admin">
        <select name="username" id="username" class="form-control" wire:model="selectedState" required>
            <option value="" selected>Select Username</option>
            @foreach ($students as $student)
                <option value="{{ $student->username }}">{{ $student->username }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-4 py-1">
        <input type="email" name="email" id="email" class="form-control" value="
        @if (!is_null($selectedState))
        {{ $student123->email }}
        @else
        Enter Email
        @endif
        " readonly required placeholder="Enter Email">
    </div>
    <div class="col-sm-4 py-1">
        <select name="fee_type" id="fee_type" class="form-control" wire:model="selectedFee" required>
            <option value="" selected>Select Fee Type</option>
            @if (!is_null($selectedState))
            <option value="Procesing Fees">Procesing Fees</option>
            <option value="Application Fees">Application Fees</option>
            <option value="College Fees">College Fees</option>
            <option value="University Fees">University Fees</option>
            <option value="School Fees">School Fees</option>
            <option value="Embassy Fees">Embassy Fees</option>
            @endif
           
        
        </select>
    </div>
    <div class="col-sm-4 py-1">
        <input type="text" name="amount" wire:model.debounce.500ms="amount" id="amount"
        class="form-control" required placeholder="Enter Amount">
        @error('amount') <span class="alert alert-danger" style="padding:2px;margin:5px">{{ $message }}</span> @enderror

    </div>
    <div class="col-sm-4 py-1">
        <input type="text" name="total" id="total" class="form-control" value="
        @if (!is_null($selectedFee))
        {{ $fee123 }}
        @else
        Total
        @endif"
        required placeholder="Total" readonly>
    </div>
    <div class="col-sm-4 py-1">
        <input type="text" name="created_at" id="created_at" class="form-control"
        value="{{ Carbon\Carbon::now()->toDateString() }}"
        required placeholder="Date" readonly>
    </div>
    <div class="col-sm-12">
        <textarea name="note" id="note" cols="30" rows="2" required class="form-control" placeholder="Enter Note"></textarea>
    </div>

    

    <div class="col-sm-12 py-1">
        <button type="submit" class="btn btn-primary btn-block">Add Fee Details</button>
    </div>

    <div class="col-sm-12">
        <hr>
    </div>

    <div class="col-sm-12 table-responsive">
        @if (!is_null($selectedState))
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <td>Fees Type</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Amount</td>
                    <td>Total</td>
                    <td>Counsellor</td>
                    <td>Note</td>
                    <td>Created At</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($mystudent as $student)
                    <tr>
                        <td class="active"><b>{{ $student->fee_type }}</b></td>
                        <td>{{ $student->username }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->amount }}</td>
                        <td>{{ $student->total }}</td>
                        <td>{{ $student->counsellor }}</td>
                        <td>{{ $student->note }}</td>                    
                        <td>{{ $student->created_at->diffForHumans() }}</td>                    
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>