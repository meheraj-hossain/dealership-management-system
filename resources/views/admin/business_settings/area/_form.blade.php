<div class="form-group">
    <label for="name">Area Name</label>
    <input type="text" name="name" value="{{old('name',isset($area)?$area->name:null)}}" class="form-control" id="name" placeholder="Enter Area name" >
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="status">Status</label>
    <br>
    <input type="radio" name="status" @if(old('status',isset($area)?$area->status:null)=='Active') checked @endif value="Active" id="active">
    <label for="active">Active</label>
    <input type="radio" name="status" @if(old('status',isset($area)?$area->status:null)=='Inactive') checked @endif value="Inactive" id="inactive">
    <label for="inactive">Inactive</label>
</div>
@error('status')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

