<div class="form-group">
    <label for="name">Name </label>
    <input type="text" name="name" value="{{old('name',isset($expense)?$expense->name:null)}}" class="form-control" id="name" placeholder="Enter Area Manager name" >
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Expense Details</label>
    <textarea class="form-control" style="resize:none" name="details"  rows="3" placeholder="Enter ..."> {{old('details',isset($expense)?$expense->details:null)}}</textarea>
    @error('details')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Expense Amount</label>
    <input type="number" min="0" name="amount" value="{{old('amount',isset($expense)?$expense->amount:null)}}" class="form-control" id="salary" placeholder="Enter Amount" >
    @error('amount')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>





