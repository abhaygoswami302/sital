<div>
    <input type="text" name="search" wire:model="searchTerm" style="width: 500px" class="SrchHdr form-control" placeholder="Search Students Here" />

    @if (count($students) > 0)

    <ul style="position :absolute;z-index:99999;width:500px;box-shadow: #b3c0e7 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 5px 5px;">
        
        <li style="background:white; ">
            <p style="padding: 2%"><b>{{ count($students) }} Results</b></p>
        </li>

        @foreach ($students as $student)
        <li style="">
            <a href="{{ route('admin_fee.show', $student->username) }}" style="color: black;text-decoration:none;">
                <div class="row" style="background: white;padding:0px;margin:0px">
                    <div class="col-sm-8">
                        <b>{{ $student->name }} | {{ $student->username }}</b>
                    </div>
                    <div class="col-sm-4">
                        {{ $student->created_at->diffForHumans() }}
                    </div>
                    <div class="col-sm-12">
                        {{ $student->email }} 
                    </div>
                    <div class="col-sm-12">
                        {{ $student->status }}
                        <hr>
                    </div>
                </div> 
            </a>
        </li>

        @endforeach
    
    </ul>

    @endif
</div>
