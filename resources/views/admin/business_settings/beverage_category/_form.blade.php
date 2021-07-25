<div class="form-group">
    <label for="name">Category Name</label>
    <input type="text" name="name" value="{{old('name',isset($beverage_category)?$beverage_category->name:null)}}" class="form-control" id="name" placeholder="Enter User name" >
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="name">Category Details</label>
    <input type="text" name="details" value="{{old('details',isset($beverage_category)?$beverage_category->details:null)}}" class="form-control" id="name" placeholder="Enter Category details" >
    @error('details')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="status">Status</label>
    <br>
    <input type="radio" name="status" @if(old('status',isset($beverage_category)?$beverage_category->status:null)=='Active') checked @endif value="Active" id="active">
    <label for="active">Active</label>
    <input type="radio" name="status" @if(old('status',isset($beverage_category)?$beverage_category->status:null)=='Inactive') checked @endif value="Inactive" id="inactive">
    <label for="inactive">Inactive</label>
</div>
@error('status')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

