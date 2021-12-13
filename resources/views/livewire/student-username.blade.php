<div class="row">
    <div class="col-sm-6 py-1">
        <input type="text" name="name" wire:model="name" required id="name" autofocus class="form-control" required placeholder="Enter Name">
    </div>
    <div class="col-sm-6 py-1">
        <input type="text" name="username" wire:model="username"  required id="username" class="form-control" required placeholder="Enter Username">
    </div>
    <div class="col-sm-6 py-1">
        <input type="email" name="email" wire:model="email" required id="email" class="form-control" required placeholder="Enter Email">
    </div>
    <div class="col-sm-6 py-1">
        <input type="text" name="phone_no" required id="phone_no" class="form-control" required placeholder="Enter Phone Number">
    </div>
    <div class="col-sm-6 py-1">
        <select name="visa_category"  id="visa_category" class="form-control" required>
            <option value="">Select Visa Category</option>
            <option value="Tourist Visa">Tourist Visa</option>
            <option value="Visitor Visa">Visitor Visa</option>
            <option value="PR">PR</option>
            <option value="Work Visa">Work Visa</option>
        </select>
    </div>
    <div class="col-sm-6 py-1">
        <button type="submit" class="btn btn-primary btn-block">Add New Student</button>
    </div>
</div>