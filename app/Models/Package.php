<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name','price','direct_income','direct_team_income','upline_income','down_line_income',
        'upline_placement_income','down_line_placement_income','trade_income',
        'company_income','max_limit','min_limit','image','withdraw_limit','fund_limit','product_limit',
        'direct_pool_income',
        'renew_direct_income',
        'renew_direct_team_income',
        'renew_upline_income',
        'renew_down_line_income',
        'renew_upline_placement_income',
        'renew_down_line_placement_income',
        'renew_trade_income',
        'renew_company_income',
        'renew_direct_pool_income',
        'self_rebirth',
        'self_associate',
        'direct_rebirth',
        'direct_associate',
        'renew_self_rebirth',
        'renew_self_associate',
        'renew_direct_rebirth',
        'renew_direct_associate',
        'ten_percent_sale',
        'twenty_percent_sale',
        'thirty_percent_sale',
        'fourty_percent_sale',
        'fifty_percent_sale',
        'starter_package_income',
        'salary_package_income',
        'brand_package_income',
        'company_new_account_income',
        'company_employee_account_income',
        'company_renew_income',
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveAImage($value,'/package/');
    }
}
