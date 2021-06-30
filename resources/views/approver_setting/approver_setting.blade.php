@extends('layouts.app')

@section('content')
    <h4>Approver Setting Page</h4>
    <form method="POST" action="{{route('approval_edit_post')}}">
        @csrf
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Approver Rule</h5>
                <div class="form-group row">
                    <label class="col-md-3 mt-3">Item Type</label>
                    <div class="col-md-9">
                        <select required name="item_type" class="select2 form-select shadow-none col-md-9"
                                style=" height:36px;">
                            <option value="">Select Item Type</option>
                            @foreach($item_types as $item_type)
                                <option value={{$item_type->STID}}>{{$item_type->Type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">Quantity</label>
                    <div class="col-md-9">
                        <input type="number" id="quantity" name="quantity" class="form-control col-md-9"
                               placeholder="Quantity of the item type to be notified about">
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>


    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-0">List of Setting Rules</h5>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class='thead-light'>
                <tr>
                    <th scope="col">Item Type</th>
                    <th scope="col">User Role</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody class="customtable">
                @foreach($rules as $rule)
                    <form action="{{route('edit_user_approver_setting',['approver_setting_id'=>$rule->id])}}"
                          method="POST">
                        <tr>
                            <td>{{\App\Models\Stock_category::query()->find($rule->stock_category_id)->Type}}</td>
                            <td>
                                <div class="chip">
                                    <div>Approver Two</div>
                                </div>
                            </td>
                            <td>
                                <input type="number" id="update_quantity" name="update_quantity" required
                                       class="form-control col-md-9"
                                       placeholder="Current Quantity: {{$rule->amount}}" value="{{$rule->amount}}">
                            </td>
                            <td>
                                @csrf
                                <button type="submit"
                                        class="btn btn-info">Update
                                </button>
                            </td>
                        </tr>
                    </form>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
