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
                             <label class="form-label">Renewal Package</label><br>
                             <input type="radio" name="is_renew" {{$package->is_renew ? 'checked' : ''}}  value="1"> Yes
                             <input type="radio" name="is_renew" {{!$package->is_renew ? 'checked' : ''}}  value="0"> No
                         </div>
                         <div class="form-group col-6">
                             <label class="form-label">Associate Package</label><br>
                             <input type="radio" name="is_associate" {{$package->is_associate ? 'checked' : ''}} value="1"> Yes
                             <input type="radio" name="is_associate" {{!$package->is_associate ? 'checked' : ''}} value="0"> No
                         </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Package Name</label>
                            <input type="name" name="name" class="form-control" placeholder="Package Name" value="{{$package->name}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package Price</label>
                            <input type="number" class="form-control" name="price"  placeholder="Package Price" value="{{$package->price}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package Fake Price</label>
                            <input type="number" class="form-control" name="fake_price"  value="{{$package->fake_price}}" placeholder="Package Fake Price">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Distribution</label>
                            <input type="number" name="distribution" class="form-control" placeholder="Package Distribution" value="{{$package->distribution}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Flush Income</label>
                            <input type="number" class="form-control" name="flush_income"  placeholder="Package Flush Income" value="{{$package->flush_income}}">
                        </div>
                   </div>
                   {{-- <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Package 5 % Sale</label>
                            <input type="text" name="five_percent_sale" class="form-control" value="{{$package->five_percent_sale}}" placeholder="Package 5 % Sale">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">5 % Sale Limit</label>
                            <input type="text" name="five_percent_sale_limit" class="form-control" value="{{$package->five_percent_sale_limit}}" placeholder="Package 5 % Sale Limit">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package 10 % Sale</label>
                            <input type="text" name="ten_percent_sale" class="form-control" value="{{$package->ten_percent_sale}}" placeholder="Package 10 % Sale">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">10 % Sale Limit</label>
                            <input type="text" name="ten_percent_sale_limit" class="form-control" value="{{$package->ten_percent_sale_limit}}" placeholder="Package 10 % Sale Limit">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package 15 % Sale</label>
                            <input type="text" name="fifteen_percent_sale" class="form-control" value="{{$package->fifteen_percent_sale}}" placeholder="Package 15 % Sale">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">15 % Sale Limit</label>
                            <input type="text" name="fifteen_percent_sale_limit" class="form-control" value="{{$package->fifteen_percent_sale_limit}}" placeholder="Package 15 % Sale Limit">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package 20 % Sale</label>
                            <input type="number" class="form-control" name="twenty_percent_sale" value="{{$package->twenty_percent_sale}}"  placeholder="Package 20 % Sale">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">20 % Sale Limit</label>
                            <input type="text" name="twenty_percent_sale_limit" class="form-control" value="{{$package->twenty_percent_sale_limit}}" placeholder="Package 20 % Sale Limit">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package 25 % Sale</label>
                            <input type="number" class="form-control" name="twenty_five_percent_sale" value="{{$package->twenty_five_percent_sale}}"  placeholder="Package 25 % Sale">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">25 % Sale Limit</label>
                            <input type="text" name="twenty_five_percent_sale_limit" class="form-control" value="{{$package->twenty_five_percent_sale_limit}}" placeholder="Package 25 % Sale Limit">
                        </div>
                   </div> --}}
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Direct Income Level 1</label>
                            <input type="number" class="form-control" name="direct_income"  placeholder="Direct Income Level 1" value="{{$package->direct_income}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Direct Income Level 2</label>
                            <input type="number" class="form-control" name="direct_income_2"  placeholder="Direct Income Level 2" value="{{$package->direct_income_2}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Direct Income Level 3</label>
                            <input type="number" class="form-control" name="direct_income_3"  placeholder="Direct Income Level 3" value="{{$package->direct_income_3}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Direct Income Level 4</label>
                            <input type="number" class="form-control" name="direct_income_4"  placeholder="Direct Income Level 4" value="{{$package->direct_income_4}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Direct Income Level 5</label>
                            <input type="number" class="form-control" name="direct_income_5"  placeholder="Direct Income Level 5" value="{{$package->direct_income_5}}">
                        </div>
                   </div>
                   <div class="row">
                        {{-- <div class="form-group col-4">
                            <label class="form-label">Direct Pool Income</label>
                            <input type="number" class="form-control" name="direct_pool_income"  placeholder="Direct Pool Income" value="{{$package->direct_pool_income}}">
                        </div> --}}
                        <div class="form-group col-4">
                            <label class="form-label">Direct Team Income</label>
                            <input type="number" class="form-control" name="direct_team_income"  placeholder="Direct Team Income" value="{{$package->direct_team_income}}">
                        </div>
                        <div class="form-group col-4">
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
                        <div class="form-group col-4">
                            <label class="form-label">Self Renew</label>
                            <input type="number" class="form-control" name="self_rebirth"  placeholder="Self Renew" value="{{$package->self_rebirth}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Direct Renew</label>
                            <input type="number" class="form-control" name="direct_rebirth"  placeholder="Direct Renew" value="{{$package->direct_rebirth}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Self Associate</label>
                            <input type="number" class="form-control" name="self_associate"  placeholder="Self Associate" value="{{$package->self_associate}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Direct Associate</label>
                            <input type="number" class="form-control" name="direct_associate"  placeholder="Direct Associate" value="{{$package->direct_associate}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Self Loan Limit</label>
                            <input type="number" class="form-control" name="self_loan_limit"  placeholder="Self Loan Limit" value="{{$package->self_loan_limit}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Direct Loan Limit</label>
                            <input type="number" class="form-control" name="direct_loan_limit"  placeholder="Direct Loan Limit" value="{{$package->direct_loan_limit}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">For Stock</label>
                            <input type="number" class="form-control" name="for_stock"  placeholder="For Stock" value="{{$package->for_stock}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Direct For Stock</label>
                            <input type="number" class="form-control" name="direct_for_stock"  placeholder="For Stock" value="{{$package->direct_for_stock}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Health Limit</label>
                            <input type="number" class="form-control" name="health_limit"  placeholder="Health Limit" value="{{$package->health_limit}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Direct Health Limit</label>
                            <input type="number" class="form-control" name="direct_health_limit"  placeholder="Direct Health Limit" value="{{$package->direct_health_limit}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Purchase Limit</label>
                            <input type="number" class="form-control" name="purchase_limit"  placeholder="Purchase Limit" value="{{$package->purchase_limit}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Direct For Purchase</label>
                            <input type="number" class="form-control" name="direct_purchase_limit"  placeholder="Direct Purchase Limit" value="{{$package->direct_purchase_limit}}">
                        </div>
                   </div>
                   <hr>
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
                            <label class="form-label">Trade Income</label>
                            <input type="number" class="form-control" name="trade_income"  placeholder="Trade Income" value="{{$package->trade_income}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Company Income</label>
                            <input type="number" class="form-control" name="company_income"  placeholder="Company Income" value="{{$package->company_income}}">
                        </div>          
                        {{-- <div class="form-group col-4">
                            <label class="form-label">Starter Package Income</label>
                            <input type="text" name="starter_package_income" class="form-control" value="{{$package->starter_package_income}}" placeholder="Starter Package Income">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Seller Package Income</label>
                            <input type="text" name="seller_package_income" class="form-control" value="{{$package->seller_package_income}}" placeholder="Seller Package Income">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Salary Package Income</label>
                            <input type="text" name="salary_package_income" class="form-control" value="{{$package->salary_package_income}}" placeholder="Salary Package Income">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Brand Package Income</label>
                            <input type="text" name="brand_package_income" class="form-control" value="{{$package->brand_package_income}}" placeholder="Brand Package Income">
                        </div> --}}
                        <div class="form-group col-3">
                            <label class="form-label">New Account Income</label>
                            <input type="text" name="company_new_account_income" class="form-control" value="{{$package->company_new_account_income}}" placeholder="New Account Income">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Employee Account Income</label>
                            <input type="text" name="company_employee_account_income" class="form-control" value="{{$package->company_employee_account_income}}" placeholder="Employee Account Income">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew Income</label>
                            <input type="text" name="company_renew_income" class="form-control" value="{{$package->company_renew_income}}" placeholder="Renew Income">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew All Accounts</label>
                            <input type="text" name="renew_all_accounts" class="form-control" value="{{$package->renew_all_accounts}}" placeholder="Renew All Accounts">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">All Associate</label>
                            <input type="text" name="all_assoicate" class="form-control" value="{{$package->all_assoicate}}" placeholder="All Assoicates">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Company Associate</label>
                            <input type="text" name="company_assoicate" class="form-control" value="{{$package->company_assoicate}}" placeholder="Company Assoicates">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">For Medicine</label>
                            <input type="text" name="for_medicine" class="form-control" value="{{$package->for_medicine}}" placeholder="For Medicine">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">For Purchase All</label>
                            <input type="text" name="for_purchase_all" class="form-control" value="{{$package->for_purchase_all}}" placeholder="For Purchase All">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Monthly Draw</label>
                            <input type="text" name="monthly_draw" class="form-control" value="{{$package->monthly_draw}}" placeholder="Monthly Draw">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Company Products</label>
                            <input type="text" name="company_products" class="form-control" value="{{$package->company_products}}" placeholder="Company Products">
                        </div>
                   </div>
                   <hr>
                   {{-- <div class="row">
                        <div class="col-12">
                            <p><strong>Renew Fields</strong></p>
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Direct Income Level 1</label>
                            <input type="number" class="form-control" name="renew_direct_income"  placeholder="Renew Direct Income Level 1" value="{{$package->renew_direct_income}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Direct Income Level 2</label>
                            <input type="number" class="form-control" name="renew_direct_income_2"  placeholder="Renew Direct Income Level 2" value="{{$package->renew_direct_income_2}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Direct Income Level 3</label>
                            <input type="number" class="form-control" name="renew_direct_income_3"  placeholder="Renew Direct Income Level 3" value="{{$package->renew_direct_income_3}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Renew Direct Income Level 4</label>
                            <input type="number" class="form-control" name="renew_direct_income_4"  placeholder="Renew Direct Income Level 4" value="{{$package->renew_direct_income_4}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Renew Direct Income Level 5</label>
                            <input type="number" class="form-control" name="renew_direct_income_5"  placeholder="Renew Direct Income Level 5" value="{{$package->renew_direct_income_5}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Renew Direct Pool Income</label>
                            <input type="number" class="form-control" name="renew_direct_pool_income"  placeholder="Direct Pool Income" value="{{$package->renew_direct_pool_income}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Direct Team Income</label>
                            <input type="number" class="form-control" name="renew_direct_team_income"  placeholder="Renew Direct Team Income" value="{{$package->renew_direct_team_income}}">
                        </div>
                        <div class="form-group col-4">
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
                            <label class="form-label">Renew Self Rebirth</label>
                            <input type="number" class="form-control" name="renew_self_rebirth"  placeholder="Renew Self Rebirth" value="{{$package->renew_self_rebirth}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew Self Associate</label>
                            <input type="number" class="form-control" name="renew_self_associate"  placeholder="Renew Self Associate" value="{{$package->renew_self_associate}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Direct Rebirth</label>
                            <input type="number" class="form-control" name="renew_direct_rebirth"  placeholder="Renew Direct Rebirth" value="{{$package->renew_direct_rebirth}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Direct Associate</label>
                            <input type="number" class="form-control" name="renew_direct_associate"  placeholder="Renew Direct Associate" value="{{$package->renew_direct_associate}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Self Loan Limit</label>
                            <input type="number" class="form-control" name="renew_self_loan_limit"  placeholder="Renew Self Loan Limit" value="{{$package->renew_self_loan_limit}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-12">
                            <p><strong>Company Related Incomes For Renew</strong></p>
                        </div>       
                        <div class="form-group col-3">
                            <label class="form-label">Renew Trade Income</label>
                            <input type="number" class="form-control" name="renew_trade_income"  placeholder="Renew Trade Income" value="{{$package->renew_trade_income}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew Company Income</label>
                            <input type="number" class="form-control" name="renew_company_income"  placeholder="Renew Company Income" value="{{$package->renew_company_income}}">
                        </div>       
                        <div class="form-group col-3">
                            <label class="form-label">New Account Income</label>
                            <input type="text" name="renew_company_new_account_income" class="form-control" value="{{$package->renew_company_new_account_income}}" placeholder="New Account Income">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Employee Account Income</label>
                            <input type="text" name="renew_company_employee_account_income" class="form-control" value="{{$package->renew_company_employee_account_income}}" placeholder="Employee Account Income">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew Income</label>
                            <input type="text" name="renew_company_renew_income" class="form-control" value="{{$package->renew_company_renew_income}}" placeholder="Renew Income">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew All Accounts</label>
                            <input type="text" name="renew_renew_all_accounts" class="form-control" value="{{$package->renew_renew_all_accounts}}" placeholder="Renew All Accounts">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">All Associate</label>
                            <input type="text" name="renew_all_assoicate" class="form-control" value="{{$package->renew_all_assoicate}}" placeholder="All Assoicates">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Company Associate</label>
                            <input type="text" name="renew_company_assoicate" class="form-control" value="{{$package->renew_company_assoicate}}" placeholder="Company Assoicates">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">For Medicine</label>
                            <input type="text" name="renew_for_medicine" class="form-control" value="{{$package->renew_for_medicine}}" placeholder="For Medicine">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">For Purchase All</label>
                            <input type="text" name="renew_for_purchase_all" class="form-control" value="{{$package->renew_for_purchase_all}}" placeholder="For Purchase All">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Monthly Draw</label>
                            <input type="text" name="renew_monthly_draw" class="form-control" value="{{$package->renew_monthly_draw}}" placeholder="Monthly Draw">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Company Products</label>
                            <input type="text" name="renew_company_products" class="form-control" value="{{$package->renew_company_products}}" placeholder="Company Products">
                        </div>
                   </div> --}}
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection