@extends('layouts.shop')
@section('content')
{{$errors}}
<table class="table table-bordered">
    <tbody>
        <tr>
            <td>CHECKOUT</td>
        </tr>
        <tr>
            <td>
                <form class="form-horizontal" action='/do-checkout' method='post'>
                    {{csrf_field()}}
                    <div class="control-group">
                        <label class="span2 control-label" for="name">Name</label>
                        <div class="controls">
                            <input type="text" disabled placeholder="Name" name='name' value={{$user->name}}>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="span2 control-label" for="email">Email</label>
                        <div class="controls">
                            <input type="email" placeholder="Email" disabled name='email' value={{$user->email}}>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="span2 control-label" for="address">Address</label>
                        <div class="controls">
                            <input type="text" placeholder="Address" name='address' value={{$user->address}}>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="span2 control-label" for="phone">Phone</label>
                        <div class="controls">
                            <input type="text" placeholder="Phone" name='phone' value={{$user->phone}}>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="span2 control-label" for="note">Note</label>
                        <div class="controls">
                            <textarea name='note' cols=50 rows=5> </textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="shopBtn">Checkout</button>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
    </tbody>
</table>
@endsection