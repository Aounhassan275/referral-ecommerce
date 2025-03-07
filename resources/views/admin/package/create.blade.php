@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>ADD PACKAGE | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Package</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.package.store')}}" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Package Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Package Name">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package Price</label>
                            <input type="number" class="form-control" name="price"  placeholder="Package Price">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package Fake Price</label>
                            <input type="number" class="form-control" name="fake_price"  placeholder="Package Fake Price">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Distribution</label>
                            <input type="number" name="distribution" class="form-control" placeholder="Package Distribution" >
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Flush Income</label>
                            <input type="number" class="form-control" name="flush_income"  placeholder="Package Flush Income">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Package 5 % Sale</label>
                            <input type="text" name="five_percent_sale" class="form-control" placeholder="Package 5 % Sale">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">5 % Sale Limit</label>
                            <input type="text" name="five_percent_sale_limit" class="form-control" placeholder="Package 5 % Sale Limit">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package 10 % Sale</label>
                            <input type="text" name="ten_percent_sale" class="form-control" placeholder="Package 10 % Sale">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">10 % Sale Limit</label>
                            <input type="text" name="ten_percent_sale_limit" class="form-control" placeholder="Package 10 % Sale Limit">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package 15 % Sale</label>
                            <input type="text" name="fifteen_percent_sale" class="form-control" placeholder="Package 15 % Sale">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">15 % Sale Limit</label>
                            <input type="text" name="fifteen_percent_sale_limit" class="form-control" placeholder="Package 15 % Sale Limit">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package 20 % Sale</label>
                            <input type="number" class="form-control" name="twenty_percent_sale" placeholder="Package 20 % Sale">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">20 % Sale Limit</label>
                            <input type="text" name="twenty_percent_sale_limit" class="form-control" placeholder="Package 20 % Sale Limit">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package 25 % Sale</label>
                            <input type="number" class="form-control" name="twenty_five_percent_sale" placeholder="Package 25 % Sale">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">25 % Sale Limit</label>
                            <input type="text" name="twenty_five_percent_sale_limit" class="form-control" placeholder="Package 25 % Sale Limit">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Direct Income Level 1</label>
                            <input type="number" class="form-control" name="direct_income"  placeholder="Direct Income Level 1">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Direct Income Level 2</label>
                            <input type="number" class="form-control" name="direct_income_2"  placeholder="Direct Income Level 2">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Direct Income Level 3</label>
                            <input type="number" class="form-control" name="direct_income_3"  placeholder="Direct Income Level 3">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Direct Income Level 4</label>
                            <input type="number" class="form-control" name="direct_income_4"  placeholder="Direct Income Level 4">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Direct Income Level 5</label>
                            <input type="number" class="form-control" name="direct_income_5"  placeholder="Direct Income Level 5">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Direct Team Income</label>
                            <input type="number" class="form-control" name="direct_team_income"  placeholder="Direct Team Income" value="">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Upline Income</label>
                            <input type="number" class="form-control" name="upline_income"  placeholder="Upline Income" value="">
                        </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Down Line Income</label>
                            <input type="number" class="form-control" name="down_line_income"  placeholder="Down Line Income" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Upline Placement Income</label>
                            <input type="number" class="form-control" name="upline_placement_income"  placeholder="Upline Placement Income" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Down Line Placement Income</label>
                            <input type="number" class="form-control" name="down_line_placement_income"  placeholder="Down Line Placement Income" value="">
                        </div>
                        
                   </div>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Self Renew</label>
                            <input type="number" class="form-control" name="self_rebirth"  placeholder="Self Renew" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Self Associate</label>
                            <input type="number" class="form-control" name="self_associate"  placeholder="Self Associate" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Direct Renew</label>
                            <input type="number" class="form-control" name="direct_rebirth"  placeholder="Direct Renew" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Direct Associate</label>
                            <input type="number" class="form-control" name="direct_associate"  placeholder="Direct Associate" value="">
                        </div>
                   </div>
                   <hr>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Max Limit</label>
                            <input type="number" class="form-control" name="max_limit"  placeholder="Max Limit" value="">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Min Limit</label>
                            <input type="number" class="form-control" name="min_limit"  placeholder="Min Limit" value="">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Withdraw Limit</label>
                            <input type="number" class="form-control" name="withdraw_limit"  placeholder="Withdraw Limit" value="">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Fund Limit</label>
                            <input type="number" class="form-control" name="fund_limit"  placeholder="Fund Limit" value="">
                        </div>
                   </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Product Limit</label>
                            <input type="number" class="form-control" name="product_limit"  placeholder="Product Limit" value="">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" >
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-12">
                            <p><strong>Company Related Incomes</strong></p>
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Company Income</label>
                            <input type="number" class="form-control" name="company_income"  placeholder="Company Income" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Trade Income</label>
                            <input type="number" class="form-control" name="trade_income"  placeholder="Trade Income" value="">
                        </div>
                        {{-- <div class="form-group col-4">
                            <label class="form-label">Starter Package Income</label>
                            <input type="text" name="starter_package_income" class="form-control" placeholder="Starter Package Income">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Seller Package Income</label>
                            <input type="text" name="seller_package_income" class="form-control" placeholder="Seller Package Income">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Salary Package Income</label>
                            <input type="text" name="salary_package_income" class="form-control" placeholder="Salary Package Income">
                        </div> --}}
                        {{-- <div class="form-group col-3">
                            <label class="form-label">Brand Package Income</label>
                            <input type="text" name="brand_package_income" class="form-control" placeholder="Brand Package Income">
                        </div> --}}
                        <div class="form-group col-3">
                            <label class="form-label">New Account Income</label>
                            <input type="text" name="company_new_account_income" class="form-control" placeholder="New Account Income">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Employee Account Income</label>
                            <input type="text" name="company_employee_account_income" class="form-control"  placeholder="Employee Account Income">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew Income</label>
                            <input type="text" name="company_renew_income" class="form-control"  placeholder="Renew Income">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew All Accounts</label>
                            <input type="text" name="renew_all_accounts" class="form-control" placeholder="Renew All Accounts">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">All Associate</label>
                            <input type="text" name="all_assoicate" class="form-control" placeholder="All Assoicates">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Company Associate</label>
                            <input type="text" name="company_assoicate" class="form-control" placeholder="Company Assoicates">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">For Medicine</label>
                            <input type="text" name="for_medicine" class="form-control" placeholder="For Medicine">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">For Purchase All</label>
                            <input type="text" name="for_purchase_all" class="form-control" placeholder="For Purchase All">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Monthly Draw</label>
                            <input type="text" name="monthly_draw" class="form-control" placeholder="Monthly Draw">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Company Products</label>
                            <input type="text" name="company_products" class="form-control" placeholder="Company Products">
                        </div>
                   </div>
                   <hr>
                   <div class="row">
                        <div class="col-12">
                            <p><strong>Renew Fields</strong></p>
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Direct Income Level 1</label>
                            <input type="number" class="form-control" name="renew_direct_income"  placeholder="Renew Direct Income Level 1" >
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Direct Income Level 2</label>
                            <input type="number" class="form-control" name="renew_direct_income_2"  placeholder="Renew Direct Income Level 2">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Direct Income Level 3</label>
                            <input type="number" class="form-control" name="renew_direct_income_3"  placeholder="Renew Direct Income Level 3">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Renew Direct Income Level 4</label>
                            <input type="number" class="form-control" name="renew_direct_income_4"  placeholder="Renew Direct Income Level 4">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Renew Direct Income Level 5</label>
                            <input type="number" class="form-control" name="renew_direct_income_5"  placeholder="Renew Direct Income Level 5">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Direct Team Income</label>
                            <input type="number" class="form-control" name="renew_direct_team_income"  placeholder="Renew Direct Team Income" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Upline Income</label>
                            <input type="number" class="form-control" name="renew_upline_income"  placeholder="Renew Upline Income" value="">
                        </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Renew Down Line Income</label>
                            <input type="number" class="form-control" name="renew_down_line_income"  placeholder="Renew Down Line Income" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Upline Placement Income</label>
                            <input type="number" class="form-control" name="renew_upline_placement_income"  placeholder="Renew Upline Placement Income" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Down Line Placement Income</label>
                            <input type="number" class="form-control" name="renew_down_line_placement_income"  placeholder="Renew Down Line Placement Income" value="">
                        </div>
                        
                   </div>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Renew Self Renew</label>
                            <input type="number" class="form-control" name="renew_self_rebirth"  placeholder="Renew Self Renew" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Self Associate</label>
                            <input type="number" class="form-control" name="renew_self_associate"  placeholder="Renew Self Associate" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Direct Renew</label>
                            <input type="number" class="form-control" name="renew_direct_rebirth"  placeholder="Renew Direct Renew" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Direct Associate</label>
                            <input type="number" class="form-control" name="renew_direct_associate"  placeholder="Renew Direct Associate" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Self Loan Limit</label>
                            <input type="number" class="form-control" name="renew_self_loan_limit"  placeholder="Renew Self Loan Limit">
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-12">
                            <p><strong>Company Related Incomes For Renew</strong></p>
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew Company Income</label>
                            <input type="number" class="form-control" name="renew_company_income"  placeholder="Renew Company Income" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Renew Trade Income</label>
                            <input type="number" class="form-control" name="renew_trade_income"  placeholder="Renew Trade Income" value="">
                        </div>
                        {{-- <div class="form-group col-4">
                            <label class="form-label">Starter Package Income</label>
                            <input type="text" name="renew_starter_package_income" class="form-control" placeholder="Starter Package Income">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Seller Package Income</label>
                            <input type="text" name="renew_seller_package_income" class="form-control" placeholder="Seller Package Income">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Salary Package Income</label>
                            <input type="text" name="renew_salary_package_income" class="form-control" placeholder="Salary Package Income">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Brand Package Income</label>
                            <input type="text" name="renew_brand_package_income" class="form-control" placeholder="Brand Package Income">
                        </div> --}}
                        <div class="form-group col-3">
                            <label class="form-label">New Account Income</label>
                            <input type="text" name="renew_company_new_account_income" class="form-control" placeholder="New Account Income">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Employee Account Income</label>
                            <input type="text" name="renew_company_employee_account_income" class="form-control"  placeholder="Employee Account Income">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew Income</label>
                            <input type="text" name="renew_company_renew_income" class="form-control"  placeholder="Renew Income">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Renew All Accounts</label>
                            <input type="text" name="renew_renew_all_accounts" class="form-control" placeholder="Renew All Accounts">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">All Associate</label>
                            <input type="text" name="renew_all_assoicate" class="form-control" placeholder="All Assoicates">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Company Associate</label>
                            <input type="text" name="renew_company_assoicate" class="form-control" placeholder="Company Assoicates">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">For Medicine</label>
                            <input type="text" name="renew_for_medicine" class="form-control" placeholder="For Medicine">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">For Purchase All</label>
                            <input type="text" name="renew_for_purchase_all" class="form-control" placeholder="For Purchase All">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Monthly Draw</label>
                            <input type="text" name="renew_monthly_draw" class="form-control" placeholder="Monthly Draw">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Company Products</label>
                            <input type="text" name="renew_company_products" class="form-control" placeholder="Company Products">
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