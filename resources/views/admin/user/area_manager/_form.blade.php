<div class="form-group">
    <label for="name">Area Manager Name</label>
    <input type="text" name="name" value="{{old('name',isset($area_manager)?$area_manager->name:null)}}" class="form-control" id="name" placeholder="Enter Area Manager name" >
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Area Manager Date of Birth</label>
    <input type="date" name="date" value="{{old('date',isset($area_manager)?$area_manager->date:null)}}" class="form-control" id="date" placeholder="Enter Shop ID" >
    @error('date')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Area Manager NID</label>
    <input type="number" min="0" name="nid" value="{{old('nid',isset($area_manager)?$area_manager->nid:null)}}" class="form-control" id="nid" placeholder="Enter NID number" >
    @error('nid')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Area Manager email</label>
    <input type="email" name="email" value="{{old('email',isset($area_manager)?$area_manager->email:null)}}" class="form-control" id="email" placeholder="Enter email" >
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Area Manager Phone Number</label>
    <input type="number" min="0" name="phone" value="{{old('phone',isset($area_manager)?$area_manager->phone:null)}}" class="form-control" id="phone" placeholder="Enter Phone number" >
    @error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="image">Upload Area Manager Image</label><br>
    <input type="file" name="image" >
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Area</label>
    <div class="form-group">
        <select class="form-control select2  " name="area">
            <option value="">Select Area</option>
            @foreach($areas as $area)
                <option @if(old('area',isset($area_manager)?$area_manager->area_id:null)==$area->id) selected @endif value="{{$area->id}}">{{$area->name}}</option>
            @endforeach
        </select>
        @error('area')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group">
    <label>Area Manager Address</label>
    <textarea class="form-control" style="resize:none" name="address"  rows="3" placeholder="Enter ...">{{old('address',isset($area_manager)?$area_manager->address:null)}}</textarea>
    @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Area Manager Salary</label>
    <input type="number" min="0" name="salary" value="{{old('salary',isset($area_manager)?$area_manager->salary:null)}}" class="form-control" id="salary" placeholder="Enter Amount" >
    @error('salary')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>






