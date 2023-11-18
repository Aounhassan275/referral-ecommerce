<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name','value','image','description'
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveProductImage($value,'/uploaded_images/products/');
    }
    
    public static function fundFee(){
        return (new static)::where('name','Fund Transfer Fee')->first()->value;
    }
    public static function phone(){
        $value = (new static)::where('name','Phone')->first()->value ?? null;
        if($value)
            return $value;
        else    
            return '(+84) 4567 421 978';
    }
    public static function email(){
        $value = (new static)::where('name','Email')->first()->value ?? null;
        if($value)
            return $value;
        else    
            return 'contact@buyebazar.com';
    }
    public static function productFee(){
        return (new static)::where('name','Product Fee')->first()->value;
    }
    public static function orderFee(){
        $value = (new static)::where('name','Order Fee')->first()->value;
        if($value)
            return $value;
        else 
            return 0;
    }
    public static function sliderOneImage(){
        $image = (new static)::where('name','Slider 1')->first();
        if($image)
            return $image->image;
        else 
            return 'revo_template/s-3zqjz60dg3/content/site/banner/home1/2.jpg';
    }
    public static function sliderTwoImage(){
        $image = (new static)::where('name','Slider 2')->first();
        if($image)
            return $image->image;
        else 
            return 'revo_template/s-3zqjz60dg3/content/site/banner/home1/1.jpg';
    }
    public static function sliderThreeImage(){
        $image = (new static)::where('name','Slider 3')->first();
        if($image)
            return $image->image;
        else 
            return 'revo_template/s-3zqjz60dg3/content/site/banner/home1/3.jpg';
    }
    public static function siteName(){
        return (new static)::where('name','Site Name')->first()->value;
    }
    public static function siteEmail(){
        return (new static)::where('name','Site Email Slug')->first()->value;
    }
    public static function facebook(){
        return (new static)::where('name','Facebook')->first()->value;
    }
    public static function twitter(){
        return (new static)::where('name','Twitter')->first()->value;
    }
    public static function linkedin(){
        return (new static)::where('name','Linkedin')->first()->value;
    }
    public static function youtube(){
        return (new static)::where('name','Youtube')->first()->value;
    }
    public static function whatsapp(){
        return (new static)::where('name','Whatsapp')->first()->value;
    }
    public static function tiktok(){
        return (new static)::where('name','tiktok')->first()->value;
    }
    public static function snack(){
        return (new static)::where('name','snack')->first()->value;
    }
    public static function instagram(){
        return (new static)::where('name','Instagram')->first()->value;
    }
    public static function companyReferralLink(){
        return (new static)::where('name','Company Referral Link')->first()->value;
    }
    public static function enablepurchase(){
        return (new static)::where('name','Enable Pruchase')->first()->value;
    }
    public static function productCategory(){
        return (new static)::where('name','Product Category')->first()->value;
    }
    public static function serviceCategory(){
        return (new static)::where('name','Service Category')->first()->value;
    }
    public static function postCategory(){
        return (new static)::where('name','Post Category')->first()->value;
    }
    public static function logo(){
        return (new static)::where('name','Logo')->first()->value ?? 'buy_e_buzar_logo';
    }
    public static function enablePostSection(){
        return (new static)::where('name','Enable Post Section')->first()->value ?? '1';
    }
    public static function enableCountryCityOnHome(){
        return (new static)::where('name','Enable Country & City on Home')->first()->value ?? '1';
    }
    public static function enableCategoryOnHome(){
        return (new static)::where('name','Enable Category on Home')->first()->value ?? '1';
    }
    public static function aboutUsImage(){
        return (new static)::where('name','About Us Image')->first()->image ?? '';
    }
    public static function aboutUsContent(){
        return (new static)::where('name','About Us Content')->first()->description ?? '';
    }
    public static function privacyPolicyContent(){
        return (new static)::where('name','Privacy Policy Content')->first()->description ?? '';
    }
    public static function termAndConditionContent(){
        return (new static)::where('name','Term And Condition Content')->first()->description ?? '';
    }
    public static function termAndConditionImage(){
        return (new static)::where('name','Term And Condition Image')->first()->image ?? '';
    }
    public static function privacyPolicyImage(){
        return (new static)::where('name','Privacy Policy Image')->first()->image ?? '';
    }
}
