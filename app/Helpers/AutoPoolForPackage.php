<?php

namespace App\Helpers;

use App\Models\SuperPool;
use App\Models\SuperPoolTree;
use App\Models\User;
use App\Models\Earning;
use App\Models\CompanyAccount;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Exception;

class AutoPoolForPackage
{

    public static function createUserForRebirth($user,$main_user,$super_pool)
    {
        $totalCount = User::where('rebirth_id',$user->id)->count();
        $rebirthUser = User::create([
            'name' => $user->name.'r'.$totalCount+1,
            'email' => $user->email.'r'.$totalCount+1,
            'password' => Hash::make('1234'),
            'temp_password' =>'1234',
            'email_verified' => true,
            'rebirth_id' => $user->id,
            'status' => 'active',
            'image' => '/profile/311639246735.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        AutoPoolForPackage::addUserInTree($user,$main_user,$super_pool,$rebirthUser);
    } 
    public static function addUserInTree($user,$main_user,$super_pool,$rebirth = null)
    {
        try{
            if(count(AutoPoolForPackage::autoPoolLevel1($main_user,$super_pool)) < config('services.levels.1'))
            {
                AutoPoolForPackage::addUserinLevel_1($user,$main_user,$super_pool,$rebirth);
            }else if(count(AutoPoolForPackage::autoPoolLevel2($main_user,$super_pool)) < config('services.levels.2'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel1($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
            }else if(count(AutoPoolForPackage::autoPoolLevel3($main_user,$super_pool)) < config('services.levels.3'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel2($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
    
            }else if(count(AutoPoolForPackage::autoPoolLevel4($main_user,$super_pool)) < config('services.levels.4'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel3($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
    
            }else if(count(AutoPoolForPackage::autoPoolLevel5($main_user,$super_pool)) < config('services.levels.5'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel4($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
    
            }else if(count(AutoPoolForPackage::autoPoolLevel6($main_user,$super_pool)) < config('services.levels.6'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel5($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
    
            }else if(count(AutoPoolForPackage::autoPoolLevel7($main_user,$super_pool)) < config('services.levels.7'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel6($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
    
            }else if(count(AutoPoolForPackage::autoPoolLevel8($main_user,$super_pool)) < config('services.levels.8'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel7($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
                
            }else if(count(AutoPoolForPackage::autoPoolLevel9($main_user,$super_pool)) < config('services.levels.9'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel8($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
                
            }else if(count(AutoPoolForPackage::autoPoolLevel10($main_user,$super_pool)) < config('services.levels.10'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel9($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
                
            }else if(count(AutoPoolForPackage::autoPoolLevel11($main_user,$super_pool)) < config('services.levels.11'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel10($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
                
            }else if(count(AutoPoolForPackage::autoPoolLevel12($main_user,$super_pool)) < config('services.levels.12'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel11($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
                
            }else if(count(AutoPoolForPackage::autoPoolLevel13($main_user,$super_pool)) < config('services.levels.13'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel12($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
                
            }else if(count(AutoPoolForPackage::autoPoolLevel14($main_user,$super_pool)) < config('services.levels.14'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel13($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
                
            }else if(count(AutoPoolForPackage::autoPoolLevel15($main_user,$super_pool)) < config('services.levels.15'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel14($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
                
            }else if(count(AutoPoolForPackage::autoPoolLevel16($main_user,$super_pool)) < config('services.levels.16'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel15($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
                
            }else if(count(AutoPoolForPackage::autoPoolLevel17($main_user,$super_pool)) < config('services.levels.17'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel16($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
                
            }else if(count(AutoPoolForPackage::autoPoolLevel18($main_user,$super_pool)) < config('services.levels.18'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel17($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool);
                
            }else if(count(AutoPoolForPackage::autoPoolLevel19($main_user,$super_pool,$rebirth)) < config('services.levels.19'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel18($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
                
            }else if(count(AutoPoolForPackage::autoPoolLevel20($main_user,$super_pool)) < config('services.levels.20'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel19($main_user,$super_pool))->get();
                AutoPoolForPackage::addUserinLevels($user,$old_users,$super_pool,$rebirth);
                
            }
            else{
                return false;
            }

            return true;
        }catch(Exception $e)
        {
            info("Add User In Tree : ".$e->getMessage());
            return false;
        }
    } 
    public static function addUserinLevel_1($user,$main_user,$super_pool,$rebirthUser)
    {
        $newUser = $rebirthUser ? $rebirthUser : $user;
        $total_price = $super_pool->price - $super_pool->price / 2;
        $total = $total_price / 3;
        $rebirth = $total/ 100 * 15;
        $revenue = $total/ 100 * 70;
        $pool_account= CompanyAccount::where('name','Pool Income')->first();
        $company_fee = $total/ 100 * 10;
        $direct_pool_income = $total/ 100 * 2;
        $direct_income = $total/ 100 * 3;
        $divideBytwo = $super_pool->price / 2;
        $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$main_user->id)->first();
        if($refferral)
        {
            if(!$refferral->left_refferral)
            {
                $refferral->update([
                    'left_refferral' => $newUser->id, 
                    'downline_income' => $refferral->downline_income + $divideBytwo, 
                    'rebirth' => $refferral->rebirth + $rebirth, 
                    'next_pool_income' => $refferral->next_pool_income + $total, 
                ]);
                
                $user->update([
                    'for_pool' =>  $user->for_pool + $rebirth
                ]);
                $pool_account->update([
                    'balance'=>$pool_account->balance + $divideBytwo
                ]);
                $refer_by = User::find($user->refer_by);
                if($refer_by)
                {
                    if($refer_by->package && $refer_by->package->price > 2)
                    {
                        $refer_by->update([
                            'for_pool' => $refer_by->for_pool + $direct_pool_income,
                            'pool_income' => $refer_by->pool_income + $direct_income
                        ]);
                    }else{     
                        $refer_by->update([
                            'total_income' => $refer_by->total_income + $direct_pool_income + $direct_income,
                        ]);
                    }

                    Earning::create([
                        'price' => $direct_pool_income,
                        'user_id' => $refer_by->id,
                        'due_to' => $user->id,
                        'type' => 'pool_income'
                    ]);

                }else{
                    $pool_account->update([
                        'balance'=>$pool_account->balance + $direct_pool_income + $direct_income
                    ]);
                }
            }else{
                $refferral->update([
                    'right_refferral' => $newUser->id, 
                    'downline_income' => $refferral->downline_income + $divideBytwo, 
                    'rebirth' => $refferral->rebirth + $rebirth, 
                    'next_pool_income' => $refferral->next_pool_income + $total, 
                ]);  
                
                $user->update([
                    'for_pool' =>  $user->for_pool + $rebirth
                ]);
                $pool_account->update([
                    'balance'=>$pool_account->balance + $divideBytwo
                ]);
                $refer_by = User::find($user->refer_by);
                if($refer_by)
                {
                    if($refer_by->package && $refer_by->package->price > 2)
                    {
                        $refer_by->update([
                            'for_pool' => $refer_by->for_pool + $direct_pool_income,
                            'pool_income' => $refer_by->pool_income + $direct_income
                        ]);
                    }else{     
                        $refer_by->update([
                            'total_income' => $refer_by->total_income + $direct_pool_income + $direct_income,
                        ]);
                    }

                    Earning::create([
                        'price' => $direct_pool_income,
                        'user_id' => $refer_by->id,
                        'due_to' => $user->id,
                        'type' => 'pool_income'
                    ]);

                }else{
                    $pool_account->update([
                        'balance'=>$pool_account->balance + $direct_pool_income + $direct_income
                    ]);
                }
            }
        }else{
            SuperPoolTree::create([
                'super_pool_id' => $super_pool->id,
                'user_id' => $main_user->id,
                'downline_income' => $divideBytwo,
                'rebirth' => $rebirth, 
                'next_pool_income' => $total,  
                'left_refferral' => $newUser->id,
            ]);
            
            $user->update([
                'for_pool' =>  $user->for_pool + $rebirth
            ]);
            $pool_account->update([
                'balance'=>$pool_account->balance + $divideBytwo
            ]);
            $refer_by = User::find($user->refer_by);
            if($refer_by)
            {
                if($refer_by->package && $refer_by->package->price > 2)
                {
                    $refer_by->update([
                        'for_pool' => $refer_by->for_pool + $direct_pool_income,
                        'pool_income' => $refer_by->pool_income + $direct_income
                    ]);
                }else{     
                    $refer_by->update([
                        'total_income' => $refer_by->total_income + $direct_pool_income + $direct_income,
                    ]);
                }
                Earning::create([
                    'price' => $direct_pool_income,
                    'user_id' => $refer_by->id,
                    'due_to' => $user->id,
                    'type' => 'pool_income'
                ]);

            }else{
                $pool_account->update([
                    'balance'=>$pool_account->balance + $direct_pool_income + $direct_income
                ]);
            }
        }
        if($rebirthUser)
        {
            $rebirthUser->update([
                'super_pool_'.$super_pool->id => 1,
            ]);
            $tree = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$user->id)->first();
            $user->update([
                'pool_income' => $user->pool_income + $revenue,
                'for_pool' =>  $user->for_pool - 3
            ]);
            // $tree->update([
            //     'rebirth' => $tree->rebirth - 3,
            // ]);

        }else{
            $user->update([
                'super_pool_'.$super_pool->id => 1,
                'pool_income' => $user->pool_income + $revenue,
                'for_pool' =>  $user->for_pool - $super_pool->price
            ]);
        }
        Earning::create([
            'price' => $revenue,
            'user_id' => $user->id,
            'due_to' => $newUser->id,
            'type' => 'pool_income'
        ]);
        $pool_account->update([
            'balance'=>$pool_account->balance + $company_fee
        ]);
    }
    public static function addUserinLevels($user,$old_users,$super_pool,$rebirthUser)
    {
        $newUser = $rebirthUser ? $rebirthUser : $user;
        $total_price = $super_pool->price - $super_pool->price / 2;
        $total = $total_price / 3;
        $rebirth = $total/ 100 * 15;
        $revenue = $total/ 100 * 70;
        $pool_account= CompanyAccount::where('name','Pool Income')->first();
        $company_fee = $total/ 100 * 10;
        $direct_pool_income = $total/ 100 * 2;
        $direct_income = $total/ 100 * 3;
        $divideBytwo = $super_pool->price / 2;
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            $ownerRefferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('left_refferral',$old_user->id)->orWhere('right_refferral',$newUser->id)->first();
            if($refferral)
            {
                if(!$refferral->left_refferral)
                {
                    $refferral->update([
                        'left_refferral' => $newUser->id, 
                        'downline_income' => $refferral->downline_income + $divideBytwo, 
                        'rebirth' => $refferral->rebirth + $rebirth, 
                        'next_pool_income' => $refferral->next_pool_income + $total, 
                    ]);
                    $user->update([
                        'for_pool' =>  $user->for_pool + $rebirth
                    ]);
                    if($ownerRefferral)
                    {
                        $ownerRefferral->update([
                            'downline_income' => $refferral->downline_income + $divideBytwo, 
                        ]);
                    }
                    $refer_by = User::find($user->refer_by);
                    if($refer_by)
                    {
                        if($refer_by->package && $refer_by->package->price > 2)
                        {
                            $refer_by->update([
                                'for_pool' => $refer_by->for_pool + $direct_pool_income,
                                'pool_income' => $refer_by->pool_income + $direct_income
                            ]);
                        }else{     
                            $refer_by->update([
                                'total_income' => $refer_by->total_income + $direct_pool_income + $direct_income,
                            ]);
                        }

                        Earning::create([
                            'price' => $direct_pool_income,
                            'user_id' => $refer_by->id,
                            'due_to' => $user->id,
                            'type' => 'pool_income'
                        ]);

                    }else{
                        $pool_account->update([
                            'balance'=>$pool_account->balance + $direct_pool_income + $direct_income
                        ]);
                    }
                    break;
                }else if((!$refferral->right_refferral)){
                    $refferral->update([
                        'right_refferral' => $newUser->id, 
                        'downline_income' => $refferral->downline_income + $divideBytwo, 
                        'rebirth' => $refferral->rebirth + $rebirth, 
                        'next_pool_income' => $refferral->next_pool_income + $total, 
                    ]);
                    $user->update([
                        'for_pool' =>  $user->for_pool + $rebirth
                    ]);
                    if($ownerRefferral)
                    {
                        $ownerRefferral->update([
                            'downline_income' => $ownerRefferral->downline_income + $divideBytwo, 
                        ]);
                    }
                    $refer_by = User::find($user->refer_by);
                    if($refer_by)
                    {
                        if($refer_by->package && $refer_by->package->price > 2)
                        {
                            $refer_by->update([
                                'for_pool' => $refer_by->for_pool + $direct_pool_income,
                                'pool_income' => $refer_by->pool_income + $direct_income
                            ]);
                        }else{     
                            $refer_by->update([
                                'total_income' => $refer_by->total_income + $direct_pool_income + $direct_income,
                            ]);
                        }
                        Earning::create([
                            'price' => $direct_pool_income,
                            'user_id' => $refer_by->id,
                            'due_to' => $user->id,
                            'type' => 'pool_income'
                        ]);

                    }else{
                        $pool_account->update([
                            'balance'=>$pool_account->balance + $direct_pool_income + $direct_income
                        ]);
                    }
                    break;
                }
            }else{
                SuperPoolTree::create([
                    'super_pool_id' => $super_pool->id,
                    'user_id' => $old_user->id,
                    'downline_income' => $divideBytwo,
                    'rebirth' => $rebirth, 
                    'next_pool_income' => $total,  
                    'left_refferral' => $newUser->id,
                ]);
                $user->update([
                    'for_pool' =>  $user->for_pool + $rebirth
                ]);
                if($ownerRefferral)
                {
                    $ownerRefferral->update([
                        'downline_income' => $ownerRefferral->downline_income + $divideBytwo, 
                    ]);
                }
                $refer_by = User::find($user->refer_by);
                if($refer_by)
                {
                    if($refer_by->package && $refer_by->package->price > 2)
                    {
                        $refer_by->update([
                            'for_pool' => $refer_by->for_pool + $direct_pool_income,
                            'pool_income' => $refer_by->pool_income + $direct_income
                        ]);
                    }else{     
                        $refer_by->update([
                            'total_income' => $refer_by->total_income + $direct_pool_income + $direct_income,
                        ]);
                    }
                    Earning::create([
                        'price' => $direct_pool_income,
                        'user_id' => $refer_by->id,
                        'due_to' => $user->id,
                        'type' => 'pool_income'
                    ]);

                }else{
                    $pool_account->update([
                        'balance'=>$pool_account->balance + $direct_pool_income + $direct_income
                    ]);
                }
                break;
            }

        }
        if($rebirthUser)
        {
            $rebirthUser->update([
                'super_pool_'.$super_pool->id => 1,
            ]);
            // $tree = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$user->id)->first();
            $user->update([
                'pool_income' => $user->pool_income + $revenue ,
                'for_pool' =>  $user->for_pool - 3
            ]); 
            // $tree->update([
            //     'rebirth' => $tree->rebirth - 3,
            // ]);

        }else{   
            $user->update([
                'super_pool_'.$super_pool->id => 1,
                'pool_income' => $user->pool_income + $revenue,
                'for_pool' =>  $user->for_pool - $super_pool->price
            ]);
        }
        Earning::create([
            'price' => $revenue,
            'user_id' => $user->id,
            'due_to' => $newUser->id,
            'type' => 'pool_income'
        ]);
        $pool_account->update([
            'balance'=>$pool_account->balance + $company_fee
        ]);

    }
    public static function autoPoolLevel1($user,$super_pool)
    {
        $users = [];
        $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$user->id)->first();
        if($refferral)
        {
            if($refferral->left_refferral)
                $users[] = $refferral->left_refferral;
            if($refferral->right_refferral)
                $users[] = $refferral->right_refferral;
        }
        return $users;
    }
    public static function autoPoolLevel2($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel1($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel3($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel2($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel4($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel3($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel5($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel4($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel6($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel5($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel7($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel6($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel8($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel7($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel9($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel8($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel10($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel9($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel11($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel10($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel12($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel11($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel13($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel12($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel14($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel13($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel15($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel14($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel16($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel15($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel17($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel16($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel18($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel17($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel19($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel18($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function autoPoolLevel20($user,$super_pool)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage::autoPoolLevel19($user,$super_pool))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            $refferral = SuperPoolTree::where('super_pool_id',$super_pool->id)->where('user_id',$old_user->id)->first();
            if($refferral)
            {
                if($refferral->left_refferral)
                    $users[] = $refferral->left_refferral;
                if($refferral->right_refferral)
                    $users[] = $refferral->right_refferral;
            }
        }
        return $users;
    }
    public static function getLevelStatus($level,$user,$super_pool)
    {
        if($level == 1)
            return AutoPoolForPackage::autoPoolLevel1($user,$super_pool);
        else if($level == 2)
        return AutoPoolForPackage::autoPoolLevel2($user,$super_pool);
        else if($level == 3)
        return AutoPoolForPackage::autoPoolLevel3($user,$super_pool);
        else if($level == 4)
        return AutoPoolForPackage::autoPoolLevel4($user,$super_pool);
        else if($level == 5)
        return AutoPoolForPackage::autoPoolLevel5($user,$super_pool);
        else if($level == 6)
        return AutoPoolForPackage::autoPoolLevel6($user,$super_pool);
        else if($level == 7)
        return AutoPoolForPackage::autoPoolLevel7($user,$super_pool);
        else if($level == 8)
        return AutoPoolForPackage::autoPoolLevel8($user,$super_pool);
        else if($level == 9)
        return AutoPoolForPackage::autoPoolLevel9($user,$super_pool);
        else if($level == 10)
        return AutoPoolForPackage::autoPoolLevel10($user,$super_pool);
        else if($level == 11)
        return AutoPoolForPackage::autoPoolLevel11($user,$super_pool);
        else if($level == 12)
        return AutoPoolForPackage::autoPoolLevel12($user,$super_pool);
        else if($level == 13)
        return AutoPoolForPackage::autoPoolLevel13($user,$super_pool);
        else if($level == 14)
        return AutoPoolForPackage::autoPoolLevel14($user,$super_pool);
        else if($level == 15)
        return AutoPoolForPackage::autoPoolLevel15($user,$super_pool);
        else if($level == 16)
        return AutoPoolForPackage::autoPoolLevel16($user,$super_pool);
        else if($level == 17)
        return AutoPoolForPackage::autoPoolLevel17($user,$super_pool);
        else if($level == 18)
        return AutoPoolForPackage::autoPoolLevel18($user,$super_pool);
        else if($level == 19)
        return AutoPoolForPackage::autoPoolLevel19($user,$super_pool);
        else if($level == 20)
        return AutoPoolForPackage::autoPoolLevel20($user,$super_pool);
        return [];
    }
    public static function getUserAccounts($user,$super_pool_id)
    {
        $super_pool = SuperPool::find($super_pool_id);
        $users = [];
        for($level = 1;$level <= 20;$level++)
        {
            if($level == 1)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel1($user,$super_pool),$users);
            else if($level == 2)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel2($user,$super_pool),$users);
            else if($level == 3)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel3($user,$super_pool),$users);
            else if($level == 4)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel4($user,$super_pool),$users);
            else if($level == 5)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel5($user,$super_pool),$users);
            else if($level == 6)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel6($user,$super_pool),$users);
            else if($level == 7)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel7($user,$super_pool),$users);
            else if($level == 8)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel8($user,$super_pool),$users);
            else if($level == 9)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel9($user,$super_pool),$users);
            else if($level == 10)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel10($user,$super_pool),$users);
            else if($level == 11)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel11($user,$super_pool),$users);
            else if($level == 12)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel12($user,$super_pool),$users);
            else if($level == 13)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel13($user,$super_pool),$users);
            else if($level == 14)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel14($user,$super_pool),$users);
            else if($level == 15)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel15($user,$super_pool),$users);
            else if($level == 16)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel16($user,$super_pool),$users);
            else if($level == 17)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel17($user,$super_pool),$users);
            else if($level == 18)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel18($user,$super_pool),$users);
            else if($level == 19)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel19($user,$super_pool),$users);
            else if($level == 20)
                $users = array_merge(AutoPoolForPackage::autoPoolLevel20($user,$super_pool),$users);
        }
        return $users;
    }
}