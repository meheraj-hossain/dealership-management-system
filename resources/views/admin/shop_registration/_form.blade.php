<div class="form-group">
    <label for="name">Shop Name</label>
    <input type="text" name="name" value="{{old('name',isset($shop)?$shop->name:null)}}" class="form-control" id="name" placeholder="Enter Shop name" >
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

{{--<div class="form-group">--}}
{{--    <label for="name">Shop ID</label>--}}
{{--    <input type="number" name="uniqueId" value="{{old('uniqueId',isset($shop)?$shop->uniqueId:null)}}" class="form-control" id="number" placeholder="Enter Shop ID" >--}}
{{--    @error('uniqueId')--}}
{{--    <div class="alert alert-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}


<div class="form-group">
    <label for="name"> Owner Id</label>
    <div class="form-group">
        <select class="form-control select2" name="ownerId">
            <option>Select Owner ID</option>
            @foreach($shopkeepers as $shopkeeper)
                <option @if(old('ownerId',isset($shop)?$shop->ownerId:null)==$shopkeeper->id) selected @endif value="{{$shopkeeper->id}}">{{$shopkeeper->name}}</option>
            @endforeach
        </select>
    </div>
    @error('ownerId')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>



{{--<div class="form-group">--}}
{{--    <label for="name">Area</label>--}}
{{--    <div class="form-group">--}}
{{--        <select class="form-control select2  " name="area">--}}
{{--            <option value="">Select Area</option>--}}
{{--            @foreach($areas as $area)--}}
{{--                <option @if(old('area',isset($shop)?$shop->area_id:null)==$area->id) selected @endif value="{{$area->id}}">{{$area->name}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--        @error('area')--}}
{{--        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--        @enderror--}}
{{--    </div>--}}

{{--</div>--}}



<div class="form-group">
    <label>Shop Address</label>
    <textarea class="form-control" style="resize:none" name="address"  rows="3" placeholder="Enter ...">{{old('address',isset($shop)?$shop->address:null)}}</textarea>
    @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>


<div class="form-group">
    <label for="image">Upload Shop Image</label><br>
    <input type="file" name="image" >
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>



