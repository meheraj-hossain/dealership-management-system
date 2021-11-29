<input type="hidden" name="inventory_type" value="Snacks" >
<div class="form-group">
    <label for="name">Category</label>
    <div class="form-group">
        <select class="form-control" name="category">
            <option value="">Select Category</option>
            @foreach($snackscategories as $snackscategory)
            <option @if(old('category',isset($inventory)?$inventory->category:null)==$snackscategory->name) selected @endif value="{{$snackscategory->id}}">{{$snackscategory->name}}</option>
            @endforeach
        </select>
        @error('category')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

</div>

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{old('name',isset($inventory)?$inventory->name:null)}}" class="form-control" id="name" placeholder="Enter Snacks name" >
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Details</label>
    <textarea class="form-control" style="resize:none" name="details"  rows="3" placeholder="Enter ...">{{old('details',isset($inventory)?$inventory->details:null)}}</textarea>
    @error('details')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Size</label>
    <div class="form-group">
        <select class="form-control" name="size">
            <option> Select Size</option>
            @foreach($snackssizes as $snackssize)
                <option @if(old('size',isset($inventory)?$inventory->size:null)==$snackssize->name) selected @endif  value="{{$snackssize->id}}">{{$snackssize->name}}</option>
            @endforeach
        </select>
    </div>
    @error('size')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="image">Upload Image</label><br>
    <input type="file" name="image" >
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="name"> Type</label>
    <div class="form-group">
        <select class="form-control" name="type">
            <option>Select Type</option>
            @foreach($snackstypes as $snackstype)
                <option @if(old('type',isset($inventory)?$inventory->type_id:null)==$snackstype->id) selected @endif  value="{{$snackstype->id}}">{{$snackstype->name}}</option>
            @endforeach
        </select>
    </div>
    @error('type')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name"> Flavor</label>
    <div class="form-group">
        <select class="form-control" name="flavor">
            <option>Select Flavor</option>
            @foreach($snacksflavors as $snacksflavor)
                <option @if(old('flavor',isset($inventory)?$inventory->flavor:null)==$snacksflavor->name) selected @endif value="{{$snacksflavor->id}}">{{$snacksflavor->name}}</option>
            @endforeach
        </select>
    </div>
    @error('flavor')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Purchased price per pack</label>
    <input type="number" name="purchased_price" value="{{old('purchased_price',isset($inventory)?$inventory->purchased_price:null)}}" class="form-control" id="name" placeholder="Enter Purchased price" >
    @error('purchased_price')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Price per pack to sell</label>
    <input type="number" name="price_per_carton" value="{{old('price_per_carton',isset($inventory)?$inventory->price_per_carton:null)}}" class="form-control" id="name" placeholder="Enter Price Per Carton" >
    @error('price_per_carton')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Quantity</label>
    <input type="number" name="quantity" value="{{old('quantity',isset($inventory)?$inventory->quantity:null)}}" class="form-control" id="name" placeholder="Enter Quantity" >
    @error('quantity')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>



<div class="form-group">
    <label for="status">Status</label>
    <br>
    <input type="radio" name="status" @if(old('status',isset($inventory)?$inventory->status:null)=='Active') checked @endif value="Active" id="active">
    <label for="active">Active</label>
    <input type="radio" name="status"  @if(old('status',isset($inventory)?$inventory->status:null)=='Inactive') checked @endif value="Inactive" id="inactive">
    <label for="inactive">Inactive</label>
@error('status')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
