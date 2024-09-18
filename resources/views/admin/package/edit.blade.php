@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3> EDIT PACKAGE | {{App\Models\Setting::siteName()}} </h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Package</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.package.update',$package->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Name</label>
                            <input type="name" name="name" class="form-control" placeholder="Package Name" value="{{$package->name}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Price</label>
                            <input type="number" class="form-control" name="price"  placeholder="Package Price" value="{{$package->price}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Package 10 % Sale</label>
                            <input type="text" name="ten_percent_sale" class="form-control" value="{{$package->ten_percent_sale}}" placeholder="Package 10 % Sale">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package 20 % Sale</label>
                            <input type="number" class="form-control" name="twenty_percent_sale" value="{{$package->twenty_percent_sale}}"  placeholder="Package 20 % Sale">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package 30 % Sale</label>
                            <input type="number" class="form-control" name="thirty_percent_sale" value="{{$package->thirty_percent_sale}}" placeholder="Package 30 % Sale">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package 40 % Sale</label>
                            <input type="number" class="form-control" name="fourty_percent_sale" value="{{$package->fourty_percent_sale}}" placeholder="Package 40 % Sale">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package 50 % Sale</label>
                            <input type="number" class="form-control" name="fifty_percent_sale" value="{{$package->fifty_percent_sale}}" placeholder="Package 50 % Sale">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Total Direct Income</label>
                            <input type="number" class="form-control" name="direct_income"  placeholder="Total Direct Income" value="{{$package->direct_income}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Direct Pool Income</label>
                            <input type="number" class="form-control" name="direct_pool_income"  placeholder="Direct Pool Income" value="{{$package->direct_pool_income}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Direct Team Income</label>
                            <input type="number" class="form-control" name="direct_team_income"  placeholder="Direct Team Income" value="{{$package->direct_team_income}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Upline Income</label>
                            <input type="number" class="form-control" name="upline_income"  placeholder="Upline Income" value="{{$package->upline_income}}">
                        </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Down Line Income</label>
                            <input type="number" class="form-control" name="down_line_income"  placeholder="Down Line Income" value="{{$package->down_line_income}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Upline Placement Income</label>
                            <input type="number" class="form-control" name="upline_placement_income"  placeholder="Upline Placement Income" value="{{$package->upline_placement_income}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Down Line Placement Income</label>
                            <input type="number" class="form-control" name="down_line_placement_income"  placeholder="Down Line Placement Income" value="{{$package->down_line_placement_income}}">
                        </div>
                        
                   </div>
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Trade Income</label>
                            <input type="number" class="form-control" name="trade_income"  placeholder="Trade Income" value="{{$package->trade_income}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Company Income</label>
                            <input type="number" class="form-control" name="company_income"  placeholder="Company Income" value="{{$package->company_income}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Self Rebirth</label>
                            <input type="number" class="form-control" name="self_rebirth"  placeholder="Self Rebirth" value="{{$package->self_rebirth}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Self Associate</label>
                            <input type="number" class="form-control" name="self_associate"  placeholder="Self Associate" value="{{$package->self_associate}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Direct Rebirth</label>
                            <input type="number" class="form-control" name="direct_rebirth"  placeholder="Direct Rebirth" value="{{$package->direct_rebirth}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Direct Associate</label>
                            <input type="number" class="form-control" name="direct_associate"  placeholder="Direct Associate" value="{{$package->direct_associate}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Renew Direct Income</label>
                            <input type="number" class="form-control" name="renew_direct_income"  placeholder="Renew Direct Income" value="{{$package->renew_direct_income}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew Direct Pool Income</label>
                            <input type="number" class="form-control" name="renew_direct_pool_income"  placeholder="Direct Pool Income" value="{{$package->renew_direct_pool_income}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew Direct Team Income</label>
                            <input type="number" class="form-control" name="renew_direct_team_income"  placeholder="Renew Direct Team Income" value="{{$package->renew_direct_team_income}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew Upline Income</label>
                            <input type="number" class="form-control" name="renew_upline_income"  placeholder="Renew Upline Income" value="{{$package->renew_upline_income}}">
                        </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Renew Down Line Income</label>
                            <input type="number" class="form-control" name="renew_down_line_income"  placeholder="Renew Down Line Income" value="{{$package->renew_down_line_income}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Upline Placement Income</label>
                            <input type="number" class="form-control" name="renew_upline_placement_income"  placeholder="Renew Upline Placement Income" value="{{$package->renew_upline_placement_income}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Down Line Placement Income</label>
                            <input type="number" class="form-control" name="renew_down_line_placement_income"  placeholder="Renew Down Line Placement Income" value="{{$package->renew_down_line_placement_income}}">
                        </div>
                        
                   </div>
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Renew Trade Income</label>
                            <input type="number" class="form-control" name="renew_trade_income"  placeholder="Renew Trade Income" value="{{$package->renew_trade_income}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew Company Income</label>
                            <input type="number" class="form-control" name="renew_company_income"  placeholder="Renew Company Income" value="{{$package->renew_company_income}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew Self Rebirth</label>
                            <input type="number" class="form-control" name="renew_self_rebirth"  placeholder="Renew Self Rebirth" value="{{$package->renew_self_rebirth}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew Self Associate</label>
                            <input type="number" class="form-control" name="renew_self_associate"  placeholder="Renew Self Associate" value="{{$package->renew_self_associate}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Renew Direct Rebirth</label>
                            <input type="number" class="form-control" name="renew_direct_rebirth"  placeholder="Renew Direct Rebirth" value="{{$package->renew_direct_rebirth}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Renew Direct Associate</label>
                            <input type="number" class="form-control" name="renew_direct_associate"  placeholder="Renew Direct Associate" value="{{$package->renew_direct_associate}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Max Limit</label>
                            <input type="number" class="form-control" name="max_limit"  placeholder="Max Limit" value="{{$package->max_limit}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Min Limit</label>
                            <input type="number" class="form-control" name="min_limit"  placeholder="Min Limit" value="{{$package->min_limit}}">
                        </div>
                   </div>
                   <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Withdraw Limit</label>
                        <input type="number" class="form-control" name="withdraw_limit"  placeholder="Withdraw Limit" value="{{$package->withdraw_limit}}">
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Fund Limit</label>
                        <input type="number" class="form-control" name="fund_limit"  placeholder="Fund Limit" value="{{$package->fund_limit}}">
                    </div>
               </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Product Limit</label>
                            <input type="number" class="form-control" name="product_limit"  placeholder="Product Limit" value="{{$package->product_limit}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image"  >
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-12">
                            <p><strong>Company Related Incomes</strong></p>
                        </div>                        
                        <div class="form-group col-4">
                            <label class="form-label">Starter Package Income</label>
                            <input type="text" name="starter_package_income" class="form-control" value="{{$package->starter_package_income}}" placeholder="Starter Package Income">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Salary Package Income</label>
                            <input type="text" name="salary_package_income" class="form-control" value="{{$package->salary_package_income}}" placeholder="Salary Package Income">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Brand Package Income</label>
                            <input type="text" name="brand_package_income" class="form-control" value="{{$package->brand_package_income}}" placeholder="Brand Package Income">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">New Account Income</label>
                            <input type="text" name="company_new_account_income" class="form-control" value="{{$package->company_new_account_income}}" placeholder="New Account Income">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Employee Account Income</label>
                            <input type="text" name="company_employee_account_income" class="form-control" value="{{$package->company_employee_account_income}}" placeholder="Employee Account Income">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Income</label>
                            <input type="text" name="company_renew_income" class="form-control" value="{{$package->company_renew_income}}" placeholder="Renew Income">
                        </div>
                   </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection