<div class="form-group">
    <label for="name">Shopkeeper Name</label>
    <input type="text" name="name" value="{{old('name',isset($shopkeeper)?$shopkeeper->name:null)}}" class="form-control" id="name" placeholder="Enter Shopkeeper name" >
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Shopkeeper Date of Birth</label>
    <input type="date" name="date" value="{{old('date',isset($shopkeeper)?$shopkeeper->date:null)}}" class="form-control" id="date" placeholder="Enter Shop ID" >
    @error('date')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Shopkeeper NID</label>
    <input type="number"  name="nid" value="{{old('nid',isset($shopkeeper)?$shopkeeper->nid:null)}}" class="form-control" id="nid" placeholder="Enter NID number" >
    @error('nid')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Shopkeeper email</label>
    <input type="email" name="email" value="{{old('email',isset($shopkeeper)?$shopkeeper->email:null)}}" class="form-control" id="email" placeholder="Enter email" >
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Shopkeeper Phone Number</label>
    <input type="number"  name="phone" value="{{old('phone',isset($shopkeeper)?$shopkeeper->phone:null)}}" class="form-control" id="phone" placeholder="Enter Phone number" >
    @error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="image">Upload Shopkeeper Image</label><br>
    <input type="file" name="image" >
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Shopkeeper Address</label>
    <textarea class="form-control" style="resize:none" name="address"  rows="3" placeholder="Enter ...">{{old('address',isset($shopkeeper)?$shopkeeper->address:null)}}</textarea>
    @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>







