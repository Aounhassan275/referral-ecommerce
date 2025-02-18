<?php
namespace App\Helpers;

class Helper
{
    public  static function to_date($date_in_any_format, $with_time = false)
    {
        if ($date_in_any_format) {
            if ($with_time) {
                return date('M d, Y h:i a', strtotime($date_in_any_format));
            } else {
                return date('M d, Y', strtotime($date_in_any_format));
            }
        } else {
            return "-";
        }
    }
    public  static function registerFields()
    {
        return [
            'country',
            'city',
            'phone',
            // 'date_of_birth',
            'service',
            'service_type',
            // 'gender',
        ];
    }
    public static function dashboard(){
        return 'adminty-user';
    }
}
