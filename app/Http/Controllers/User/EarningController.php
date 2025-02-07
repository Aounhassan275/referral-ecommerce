<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EarningController extends Controller
{
    private $months;
    private $timeFormat;
    private $DateFormat;

    public $directory;
    public function __construct() {
        $this->months = [
                "January", "February", "March",
                "April", "May", "June", "July",
                "August", "September", "October",
                "November", "December"
        ];

        $this->timeFormat = 'Y-m-d H:i:s';
        $this->DateFormat = 'Y-m-d';
        $this->directory = Helper::dashboard();
    }
    public function trade_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->tradeIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";
        return view($this->directory.'.earning.trade_income')->with('data', $data);
    } 
    public function direct_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->directIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";
        return view($this->directory.'.earning.direct_income')->with('data', $data);
    } 
    public function direct_team_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->directTeamIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";
        return view($this->directory.'.earning.direct_team_income')->with('data', $data);
    } 
    public function upline_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->uplineIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";         
        return view($this->directory.'.earning.upline_income')->with('data', $data);
    }
    public function down_line_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->downlineIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";         
        return view($this->directory.'.earning.down_line_income')->with('data', $data);
    }
    public function upline_placement_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->uplinePlacementIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";         
        return view($this->directory.'.earning.upline_placement_income')->with('data', $data);
    }
    public function down_line_placement_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->downlinePlacementIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";         
        return view($this->directory.'.earning.down_line_placement_income')->with('data', $data);
    }
    public function ranking_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->rankingIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";         
        return view($this->directory.'.earning.ranking_income')->with('data', $data);
    }
    public function pool_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->poolIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";         
        return view($this->directory.'.earning.pool_income')->with('data', $data);
    }
    public function reward_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->rewardIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";         
        return view($this->directory.'.earning.reward_income')->with('data', $data);
    }
    public function associated_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));
        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->associatedIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";         
        return view($this->directory.'.earning.associated_income')->with('data', $data);
    }
    public function overall_earning(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            Session::flash('error', 'From cannot a be a date after To date');
            return back()->withInput();
        }

        $labelsArray   = [
            "Direct Income (".Auth::user()->directIncome->whereBetween('created_at',[$from, $to])->sum('price').")", 
            "Direct Team Income (".Auth::user()->directTeamIncome->whereBetween('created_at',[$from, $to])->sum('price').")", 
            "Upline Income (".Auth::user()->uplineIncome->whereBetween('created_at',[$from, $to])->sum('price').")", 
            "Downline Income (".Auth::user()->downlineIncome->whereBetween('created_at',[$from, $to])->sum('price').")", 
            "Upline Placement Income (".Auth::user()->uplinePlacementIncome->whereBetween('created_at',[$from, $to])->sum('price').")",
            "Downline Placement Income (".Auth::user()->downlinePlacementIncome->whereBetween('created_at',[$from, $to])->sum('price').")",
            "Trade Income (".Auth::user()->tradeIncome->whereBetween('created_at',[$from, $to])->sum('price').")",
            "Ranking Income (".Auth::user()->rankingIncome->whereBetween('created_at',[$from, $to])->sum('price').")",
            "Reward Income (".Auth::user()->rewardIncome->whereBetween('created_at',[$from, $to])->sum('price').")",
            "Pool Income (".Auth::user()->poolIncome->whereBetween('created_at',[$from, $to])->sum('price').")",
            "Assoicated Income (".Auth::user()->associatedIncome->whereBetween('created_at',[$from, $to])->sum('price').")"
        ];
        $packagesData   = [
            Auth::user()->directIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->directTeamIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->uplineIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->downlineIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->uplinePlacementIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->downlinePlacementIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->tradeIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->rankingIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->rewardIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->poolIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->associatedIncome->whereBetween('created_at',[$from, $to])->sum('price'),

        ];

        $data['packages']       = "'".implode("', '", $packagesData)."'";
        $data['packagesCount']  = 7;
        $data['labels']         = "'".implode("', '", $labelsArray)."'";
        $data['labelsArray']    = $labelsArray;  
        return view($this->directory.'.report.over_all_earning')->with('data', $data);
    }
    public function user_overall_earning(Request $request,$id)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));
        $user = User::find($id);
        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            Session::flash('error', 'From cannot a be a date after To date');
            return back()->withInput();
        }

        $labelsArray   = [
            "Direct Income (".$user->directIncome->whereBetween('created_at',[$from, $to])->sum('price').")", 
            "Direct Team Income (".$user->directTeamIncome->whereBetween('created_at',[$from, $to])->sum('price').")", 
            "Upline Income (".$user->uplineIncome->whereBetween('created_at',[$from, $to])->sum('price').")", 
            "Downline Income (".$user->downlineIncome->whereBetween('created_at',[$from, $to])->sum('price').")", 
            "Upline Placement Income (".$user->uplinePlacementIncome->whereBetween('created_at',[$from, $to])->sum('price').")",
            "Downline Placement Income (".$user->downlinePlacementIncome->whereBetween('created_at',[$from, $to])->sum('price').")",
            "Trade Income (".$user->tradeIncome->whereBetween('created_at',[$from, $to])->sum('price').")",
            "Ranking Income (".$user->rankingIncome->whereBetween('created_at',[$from, $to])->sum('price').")",
            "Ranking Income (".$user->rewardIncome->whereBetween('created_at',[$from, $to])->sum('price').")",
            "Assoicated Income (".$user->associatedIncome->whereBetween('created_at',[$from, $to])->sum('price').")"
        ];
        $packagesData   = [
            $user->directIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            $user->directTeamIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            $user->uplineIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            $user->downlineIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            $user->uplinePlacementIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            $user->downlinePlacementIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            $user->tradeIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            $user->rankingIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            $user->rewardIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            $user->associatedIncome->whereBetween('created_at',[$from, $to])->sum('price'),

        ];

        $data['packages']       = "'".implode("', '", $packagesData)."'";
        $data['packagesCount']  = 7;
        $data['labels']         = "'".implode("', '", $labelsArray)."'";
        $data['labelsArray']    = $labelsArray;  
        return view($this->directory.'.report.user_overall_earning')->with('data', $data)->with('user',$user);
    }
    public function userStatusUpdate(Request $request)
    {
        $user = User::find($request->user_id);
        $user->update([
            'type' => $request->type
        ]);
        toastr()->success('Status Updated Successfully!');
        return back();
    }
}
