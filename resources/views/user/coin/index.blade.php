@extends('user.layout.index')
@section('title')
COIN MARKET PLACE
@endsection
@section('contents')

<div class="row">
    @foreach (App\Models\Payment::where('type',1)->get() as $payment)
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-img-actions">
                @if($payment->image)
                <img class="card-img-top img-fluid" src="{{asset($payment->image)}}" alt="">
                @else
                <img class="card-img-top img-fluid" src="{{asset('user_asset/global_assets/images/placeholders/placeholder.jpg')}}" alt="">
                @endif
            </div>

            <div class="card-body text-center">
                <h6 class="font-weight-semibold mb-0">{{$payment->method}}</h6>
                <span class="d-block text-muted">{{$payment->name}}</span>

                <div class="list-icons list-icons-extended mt-3">
                    <button type="button" class="copy-button btn btn-info  btn-xs" data-clipboard-action="copy" data-clipboard-target="#link_area_{{$payment->id}}">Copy to clipboard</button>
                    {{-- <input id="link_area"  class="form-control" value="{{$payment->number}}" >
                    <p hidden="" class="text-success" id="coppied">Copied!</p> --}}
                 </div>
                  <div class="list-icons list-icons-extended mt-3" >
                    <input id="link_area_{{$payment->id}}"  class="form-control" value="{{$payment->number}}" >
                    <p hidden="" style="color:black;" id="coppied">Copied!</p>
                 </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Coins Market Place</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table datatable-basic datatable-row-basic">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Name
                </th>
                <th>
                    Price
                </th>
                <th>
                    Market Cap
                </th>
                <th>
                    24H Volume
                </th>
                <th>
                    24H Change
                </th>
            </tr> 
        </thead>
        <tbody>
            @foreach($currencies as $key => $currency)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        @if (file_exists( public_path() . '/images/icon_set/' . $currency['symbol'] . '.png'))
                            <img src="{{asset('images/icon_set')}}/{{$currency['symbol']}}.png" alt="{{$currency['name']}}">
                        @else
                            <img src="{{asset('images/icon_set')}}/default.png" alt="{{$currency['name']}}">
                        @endif
                        {{$currency['name']}} ({{$currency['symbol']}})
                    </td>
                    <td>${{round($currency['priceUsd'], 4)}}</td>
                    <td>
                        @if ($currency['marketCapUsd'] < 1000000)
                            ${{number_format($currency['marketCapUsd'])}}
                        @elseif ($currency['marketCapUsd'] < 1000000000)
                            ${{number_format($currency['marketCapUsd'] / 1000000, 2) . ' M'}}
                        @else
                            ${{ number_format($currency['marketCapUsd'] / 1000000000, 2) . ' B'}}
                        @endif
                    </td>
                    <td>
                        @if ($currency['volumeUsd24Hr'] < 1000000)
                            ${{number_format($currency['volumeUsd24Hr'])}}
                        @elseif ($currency['volumeUsd24Hr'] < 1000000000)
                            ${{number_format($currency['volumeUsd24Hr'] / 1000000, 2) . ' M'}}
                        @else
                            ${{ number_format($currency['volumeUsd24Hr'] / 1000000000, 2) . ' B'}}
                        @endif

                    </td>
                    <td>
                        @if(strpos($currency['changePercent24Hr'], '-') !== false)
                            <span class="red-color">
                                <i class="mdi mdi-menu-down"></i>
                           {{round($currency['changePercent24Hr'], 2)}} %
                            </span>
                        @else
                            <span class="green-color">
                                <i class="mdi mdi-menu-up"></i>
                            {{round($currency['changePercent24Hr'], 2)}}%
                        </span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('clipboard.js')}}"></script>
<script type="text/javascript">
	var clipboard = new Clipboard('.copy-button');
        clipboard.on('success', function(e) {
            copyText.select();
            var $div2 = $("#coppied");
            console.log($div2);
            console.log($div2.is(":visible"));
            if ($div2.is(":visible")) { return; }
            $div2.show();
            setTimeout(function() {
                $div2.fadeOut();
            }, 800);
        });
</script>
@endsection