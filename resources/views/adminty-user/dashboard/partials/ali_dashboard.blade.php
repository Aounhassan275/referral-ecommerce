
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-blue-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{App\Models\Setting::currency()}} {{Auth::user()->cash_wallet}}</h3>
                    <span class="text-uppercase font-size-xs">Cash Wallet</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-users2 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-danger-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{App\Models\Setting::currency()}} {{Auth::user()->directIncome->sum('price')}}</h3>
                    <span class="text-uppercase font-size-xs">Direct Reward</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-collaboration icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-success-400 has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-lan icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="mb-0">{{App\Models\Setting::currency()}} {{Auth::user()->tradeRankReward->sum('price')}}</h3>
                    <span class="text-uppercase font-size-xs">Trade Rank Reward</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-indigo-400 has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-cart2 icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="mb-0">{{Auth::user()->products->count()}}</h3>
                    <span class="text-uppercase font-size-xs">Products</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mb-3 pt-2">
    <h6 class="mb-0 font-weight-semibold">
        Progress of this Month (30 Days)
    </h6>
</div>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-pink-400 has-bg-image">
            <div class="media mb-3">
                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">Referrals</h6>
                    <span class="opacity-75">{{Auth::user()->getReferralsInlast30Days()}}</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-cog3 icon-2x"></i>
                </div>
            </div>

            <div class="progress bg-pink mb-2" style="height: 0.125rem;">
                <div class="progress-bar bg-white" style="width: 67%">
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-info-400 has-bg-image">
            <div class="media mb-3">
                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">F.M Reward</h6>
                    <span class="opacity-75">{{App\Models\Setting::currency()}} {{Auth::user()->getdirectRewardOflast30Days()}}</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-pulse2 icon-2x"></i>
                </div>
            </div>

            <div class="progress bg-info-600 mb-2" style="height: 0.125rem;">
                <div class="progress-bar bg-white" style="width: 80%">
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-warning-400 has-bg-image">
            <div class="media mb-3 ">
                <div class="mr-3 align-self-center">
                    <i class="icon-coins icon-2x"></i>
                </div>

                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0 blink">Flash Reward</h6>
                    <span class="opacity-75 blink">{{App\Models\Setting::currency()}} {{Auth::user()->getLast16LevelsDirectTeamIncome()}}</span>
                </div>
            </div>

            <div class="progress bg-warning mb-2" style="height: 0.125rem;">
                <div class="progress-bar bg-white" style="width: 67%">
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-teal-400 has-bg-image">
            <div class="media mb-3">
                <div class="mr-3 align-self-center">
                    <i class="icon-coin-dollar icon-2x"></i>
                </div>

                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">Company Reward</h6>
                    <span class="opacity-75">{{App\Models\Setting::currency()}} {{Auth::user()->getTradeIncomeOflast30Days()}}</span>
                </div>
            </div>

            <div class="progress bg-teal mb-2" style="height: 0.125rem;">
                <div class="progress-bar bg-white" style="width: 80%">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media mb-3">
                <div class="mr-3 align-self-center">
                    <i class="icon-coin-euro icon-2x text-blue-400 opacity-75"></i>
                </div>

                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">A.M Reward</h6>
                    <span class="text-muted">{{App\Models\Setting::currency()}} {{Auth::user()->getAMDirectTeamIncome()}}</span>
                </div>
            </div>

            <div class="progress mb-2" style="height: 0.125rem;">
                <div class="progress-bar bg-blue" style="width: 67%">
                </div>
            </div>
            
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media mb-3">
                <div class="mr-3 align-self-center">
                    <i class="icon-coin-pound icon-2x text-success-400 opacity-75"></i>
                </div>

                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">Z.M Reward</h6>
                    <span class="text-muted">{{App\Models\Setting::currency()}} {{Auth::user()->getZMDirectTeamIncome()}}</span>
                </div>
            </div>

            <div class="progress mb-2" style="height: 0.125rem;">
                <div class="progress-bar bg-success-400" style="width: 80%">
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media mb-3">
                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">R.M Reward</h6>
                    <span class="text-muted">{{App\Models\Setting::currency()}} {{Auth::user()->getRMDirectTeamIncome()}}</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-coin-yen icon-2x text-indigo-400 opacity-75"></i>
                </div>
            </div>

            <div class="progress mb-2" style="height: 0.125rem;">
                <div class="progress-bar bg-indigo-400" style="width: 67%">
                </div>
            </div>

        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media mb-3">
                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">M.D Reward</h6>
                    <span class="text-muted">{{App\Models\Setting::currency()}} {{Auth::user()->getMDDirectTeamIncome()}}</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-wallet icon-2x text-danger-400 opacity-75"></i>
                </div>
            </div>

            <div class="progress mb-2" style="height: 0.125rem;">
                <div class="progress-bar bg-danger-400" style="width: 80%">
                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-orange-400 has-bg-image">
            <div class="media mb-3">
                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">Starter Package Reward</h6>
                    <span class="opacity-75">{{App\Models\Setting::currency()}} {{Auth::user()->getStarterPackageReward()}}</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-cash icon-2x"></i>
                </div>
            </div>

            <div class="progress bg-orange mb-2" style="height: 0.125rem;">
                <div class="progress-bar bg-white" style="width: 67%">
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-purple-400 has-bg-image">
            <div class="media mb-3">
                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">Seller Package Reward</h6>
                    <span class="opacity-75">{{App\Models\Setting::currency()}} {{Auth::user()->getSellerPackageReward()}}</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-cash3 icon-2x"></i>
                </div>
            </div>

            <div class="progress bg-purple-600 mb-2" style="height: 0.125rem;">
                <div class="progress-bar bg-white" style="width: 80%">
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-violet-400 has-bg-image">
            <div class="media mb-3">
                <div class="mr-3 align-self-center">
                    <i class="icon-cash2 icon-2x"></i>
                </div>

                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">Brand Package Reward</h6>
                    <span class="opacity-75">{{App\Models\Setting::currency()}} {{Auth::user()->getBrandPackageReward()}}</span>
                </div>
            </div>

            <div class="progress bg-violet mb-2" style="height: 0.125rem;">
                <div class="progress-bar bg-white" style="width: 67%">
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-brown-400 has-bg-image">
            <div class="media mb-3">
                <div class="mr-3 align-self-center">
                    <i class="icon-cash4 icon-2x"></i>
                </div>

                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">Total Trade Reward</h6>
                    <span class="opacity-75">{{App\Models\Setting::currency()}} {{Auth::user()->tradeIncome->sum('price')}}</span>
                </div>
            </div>

            <div class="progress bg-brown mb-2" style="height: 0.125rem;">
                <div class="progress-bar bg-white" style="width: 80%">
                </div>
            </div>
        </div>
    </div>
</div>
