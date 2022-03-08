<div class="form-group">
    <label for="name">Product Name </label>
    <input type="text" name="name" value="{{isset($return_product)?$return_product->Inventory->name:null}}" class="form-control" id="name" placeholder="Enter Area Manager name" >
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Product Quantity </label>
    <input type="number" name="quantity" value="{{isset($return_product)?$return_product->quantity:null}}" class="form-control" id="name" placeholder="Enter quantity" >
    @error('quantity')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Reason of Returning</label>
    <textarea class="form-control" style="resize:none" name="details"  rows="3" placeholder="Enter ..."> {{isset($return_product)?$return_product->reason:null}}</textarea>
    @error('details')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>


