@if(isset($user))

    <div class="form-group">
        <label for="name">User Name</label>
        <input type="text" name="name" value="{{old('name',isset($user)?$user->name:null)}}" class="form-control" id="name" placeholder="Enter User name" disabled>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="name">User Email</label>
        <input type="text" name="name" value="{{old('email',isset($user)?$user->email:null)}}" class="form-control" id="name" placeholder="Enter User Email" disabled>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="name">User Role</label>
        <input type="text" name="action_table" value="{{old('action_table',isset($user)?($user->action_table == 'App\Shopkeeper')?'Shopkeeper':'Area Manager':null)}}" class="form-control" id="name" placeholder="Enter User Email" disabled >
        @error('action_table')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <br>
        <input type="radio" name="status" @if(old('status',isset($user)?$user->status:null)=='Active') checked @endif value="Active" id="active">
        <label for="active">Active</label>
        <input type="radio" name="status"  @if(old('status',isset($user)?$user->status:null)=='Inactive') checked @endif value="Inactive" id="inactive">
        <label for="inactive">Inactive</label>
        @error('status')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
@else


<div class="form-group">
    <label for="name"> User Role</label>
    <div class="form-group">
        <select class="form-control select2 user" id="user" name="action_table">
            <option value="">Select User Role</option>
            <option value="App\AreaManager">Area Manager</option>
            <option value="App\Shopkeeper">Shopkeeper</option>
        </select>
    </div>
    @error('user_role')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Assign User</label>
    <div class="form-group">
        <select class="form-control select2" name="assigned_user" id="htmlAppend">

        </select>
    </div>
    @error('assigned_user')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Password</label>
    <input type="password" name="password" value="{{old('password',isset($user)?$user->password:null)}}" class="form-control " id="password" placeholder="Enter password" >
    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
@endif
