<div>

    <input wire:model="search" list="mylist" class="search-form" id="search" type="text" placeholder="Search here.." />
    @if(!empty($query))
    <datalist id="mylist">
        @foreach($datalist as $rs)
            <option value="{{$rs->title}}">{{$rs->category->title}}</option>
        @endforeach
    </datalist>
    @endif


</div>
