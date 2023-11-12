@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>DASHBOARD | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">

    <div class="col-12 col-sm-12 col-xl  d-xxl-flex">

        <div class="card flex-fill">

            <div class="card-body py-4">

                <div class="media">

                    <div class="d-inline-block mt-2 mr-3">

                        <i class="feather-lg text-info" data-feather="dollar-sign"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">$ {{number_format(Auth::user()->balance, 2)}}</h3>

                        <div class="mb-0">Available Balance</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<div class="row">
    <div class="col-lg-12">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-4">
                    {{-- <a href="{{route('admin.package.index')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-primary float-right">All</span>
                                <h5 class="card-title mb-0">Total Packages</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\Package::count()}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
                <div class="col-sm-4">
                    {{-- <a href="{{route('admin.messages.index')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-info float-right">All</span>
                                <h5 class="card-title mb-0">Total Messages</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\Message::count()}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
                <div class="col-sm-4">
                    {{-- <a href="{{route('admin.user.email_verification')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-success float-right">All</span>
                                <h5 class="card-title mb-0">Email Verification Pending</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\User::where('email_verified',0)->where('associated_with',null)->where('type','!=','fake')->count()}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    {{-- <a href="{{route('admin.user.index')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-warning float-right">All</span>
                                <h5 class="card-title mb-0">Total User</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\User::count()}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
                <div class="col-sm-4">
                    {{-- <a href="{{route('admin.user.pendings')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-success float-right">All</span>
                                <h5 class="card-title mb-0">Total Pending User</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\User::pending()->count()}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
                <div class="col-sm-4">
                    {{-- <a href="{{route('admin.user.actives')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-primary float-right">All</span>
                                <h5 class="card-title mb-0">Active User</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\User::active()->count()}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    {{-- <a href="{{route('admin.deposit.show')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-info float-right">{{App\Models\Deposit::count()}}</span>
                                <h5 class="card-title mb-0">Total Deposit</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            <h3 class="mb-0">{{App\Models\Deposit::sum('amount')}}</h3>
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
                <div class="col-sm-3">
                    {{-- <a href="{{route('admin.deposit.PerfectMoney')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-info float-right">{{App\Models\Deposit::PerfectMoney()->count()}}</span>
                                <h5 class="card-title mb-0">By Binance</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            <h3 class="mb-0">{{App\Models\Deposit::PerfectMoney()->sum('amount')}}</h3>
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
                <div class="col-sm-3">
                    {{-- <a href="{{route('admin.deposit.ownBalance')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-info float-right">{{App\Models\Deposit::ownBalance()->count()}}</span>
                                <h5 class="card-title mb-0">By Balance</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            <h3 class="mb-0">{{App\Models\Deposit::ownBalance()->sum('amount')}}</h3>
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
                <div class="col-sm-3">
                    {{-- <a href="{{route('admin.deposit.index')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-info float-right">{{App\Models\Deposit::new()->count()}}</span>
                                <h5 class="card-title mb-0">Total Deposit Pending</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            <h3 class="mb-0">{{App\Models\Deposit::new()->sum('amount')}}</h3>
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    {{-- <a href="{{route('admin.deposit.TodayPerfectMoney')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-info float-right">{{App\Models\Deposit::TodayPerfectMoney()->count()}}</span>
                                <h5 class="card-title mb-0">Today Deposit By Binance</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            <h3 class="mb-0">{{App\Models\Deposit::TodayPerfectMoney()->sum('amount')}}</h3>
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
                <div class="col-sm-6">
                    {{-- <a href="{{route('admin.deposit.TodayownBalance')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-info float-right">{{App\Models\Deposit::TodayownBalance()->count()}}</span>
                                <h5 class="card-title mb-0">Today Deposit By Balance</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            <h3 class="mb-0">{{App\Models\Deposit::TodayownBalance()->sum('amount')}}</h3>
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    {{-- <a href="{{route('admin.withdraw.complete')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-success float-right">All</span>
                                <h5 class="card-title mb-0">Total Withdraw</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\Withdraw::all()->sum('payment')}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
                <div class="col-sm-4">
                    {{-- <a href="{{route('admin.withdraw.complete')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-success float-right">All</span>
                                <h5 class="card-title mb-0">Total Complete Withdraw</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\Withdraw::completed()->sum('payment')}}

                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
                <div class="col-sm-4">
                    {{-- <a href="{{route('admin.withdraw.index')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-success float-right">All</span>
                                <h5 class="card-title mb-0">Total Pending Withdraw</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\Withdraw::process()->sum('payment')}}

                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
               
            </div>
            <div class="row">
                <div class="col-sm-6">
                    {{-- <a href="{{route('admin.withdraw.holds')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-warning float-right">All</span>
                                <h5 class="card-title mb-0">Total OnHold Withdraw</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\Withdraw::hold()->sum('payment')}}

                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
                <div class="col-sm-6">
                    {{-- <a href="{{route('admin.admin.index')}}"> --}}
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-warning float-right">All</span>
                                <h5 class="card-title mb-0">Total Employee</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\Admin::employee()->count()}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection