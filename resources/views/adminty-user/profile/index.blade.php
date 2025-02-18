@extends('adminty-user.layout.index')

@section('title')
UPDATE YOUR OWN PROFILE
@endsection

@section('styles')
<!-- Theme JS files -->
<script src="{{asset('user_asset/global_assets/js/plugins/editors/summernote/summernote.min.js')}}"></script>
<script src="{{asset('user_asset/global_assets/js/demo_pages/editor_summernote.js')}}"></script>
@endsection
@section('contents')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update Profile</h5>
            </div>
            <div class="card-body">
                @if (Auth::user()->products->count() > 0)
                <form action="{{route('user.user.update',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" class="form-control" value="{{Auth::user()->id}}">
                    <p><strong>Main Home:</strong></p>
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Business Name</label>
                            <input type="text" name="business_name" class="form-control" value="{{Auth::user()->business_name}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Business Detail</label>
                            <textarea name="business_detail" class="form-control">{{Auth::user()->business_detail}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Add Video Link</label>
                            <input type="text" name="video_link" class="form-control" value="{{Auth::user()->video_link}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Main Image
                                @if(Auth::user()->mainImage())
                                <a href="{{asset(Auth::user()->mainImage())}}" target="_blank">
                                    <i class="icon-eye text-indigo-400 opacity-75"></i>
                                </a>
                                @endif
                            </label>
                            <input type="file" name="main_image" class="form-control" >
                        </div>
                   </div>
                   <p><strong>About Us:</strong></p>
                   <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">About Detail</label>
                            <textarea name="about_us_detail" class="form-control">{{Auth::user()->about_us_detail}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Profile Image</label>
                            <input type="file" name="image" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Complete Name</label>
                            <input type="text" name="full_name" class="form-control" value="{{Auth::user()->full_name}}" >
                        </div>
                   </div>
                   <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Country</label>
                        <select data-placeholder="Enter 'as'" name="country_id" id="country_id" class="form-control select-minimum " data-fouc>
                            <option></option>
                            <optgroup label="Countries">
                                @foreach(App\Models\Country::all() as $country)
                                <option @if(Auth::user()->country_id == $country->id) selected @endif value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>                        
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">City</label>
                        <select data-placeholder="Enter 'as'" name="city_id" id="city_id" class="form-control select-minimum " data-fouc>
                            <option></option>
                            <optgroup label="Cities">
                                @foreach(App\Models\City::where('country_id',Auth::user()->country_id)->get() as $city)
                                <option @if(Auth::user()->city_id == $city->id) selected @endif value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>                           
                    </div>
                   </div>
                   <div class="row">
            
                        <div class="form-group col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="number" name="phone" class="form-control" value="{{Auth::user()->phone}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" value="{{Auth::user()->address}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" >

                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Martial Status</label>
                            <select name="martial_status" id="martial_status" class="form-control">
                                <option selected disabled>Select Martial Status</option>
                                @foreach(App\Models\MartialStatus::all() as $martial_status)
                                <option @if(Auth::user()->martial_status == $martial_status->name) selected @endif value="{{$martial_status->name}}">{{$martial_status->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Religion</label>
                            <select name="religion" id="religion" class="form-control">
                                <option selected disabled>Select Religion</option>
                                @foreach(App\Models\Religion::all() as $religion)
                                <option @if(Auth::user()->religion == $religion->name) selected @endif value="{{$religion->name}}">{{$religion->name}}</option>
                                @endforeach
                            </select>                                
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Sect.</label>
                            <input type="text" name="sect" class="form-control" placeholder="Sect"  value="{{Auth::user()->sect}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Caste</label>
                            <input type="text" name="caste" class="form-control" placeholder="Caste" value="{{Auth::user()->caste}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Gender</label>
                            <select name="gender"  class="form-control">
                                <option selected disabled>Select Gender</option>
                                <option @if(Auth::user()->gender == 'Male') selected @endif value="Male">Male</option>
                                <option @if(Auth::user()->gender == 'Female') selected @endif value="Female">Female</option>
                                <option @if(Auth::user()->gender == 'TransGender') selected @endif value="TransGender">TransGender</option>
                            </select>                                
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Date Of Birth</label>
                            <input type="date" name="dob" class="form-control" placeholder="Caste" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Monthly Income</label>
                            <select name="monthly_income"  class="form-control">
                                <option selected disabled>Select Monthly Income</option>
                                <option @if(Auth::user()->monthly_income == 'Less Than 50,000') selected @endif value="Less Than 50,000">Less Than 50,000</option>
                                <option @if(Auth::user()->monthly_income == '50,000 To 1 Lac') selected @endif value="50,000 To 1 Lac">50,000 To 1 Lac</option>
                                <option @if(Auth::user()->monthly_income == '1 Lac To 2 Lac') selected @endif value="1 Lac To 2 Lac">1 Lac To 2 Lac</option>
                                <option @if(Auth::user()->monthly_income == '2 Lac To 5 Lac') selected @endif value="2 Lac To 5 Lac">2 Lac To 5 Lac</option>
                                <option @if(Auth::user()->monthly_income == 'More Than 5 Lac') selected @endif value="More Than 5 Lac">More Than 5 Lac</option>
                            </select>                                
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Service</label>
                            <select name="service_id" id="service_id" class="form-control">
                                <option selected disabled>Select Service</option>
                                @foreach(App\Models\Service::all() as $service)
                                <option @if(Auth::user()->service_id == $service->id) selected @endif value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Type</label>
                            <select name="type_id" id="type_id" class="form-control">
                                <option selected disabled>Select Service Type</option>
                                @foreach(App\Models\Type::all() as $type)
                                <option @if(Auth::user()->type_id == $type->id) selected @endif value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>                                
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Blood Group</label> 
                            <select name="blood_group" id="blood_group" class="form-control">
                                <option selected disabled>Select Blood Group</option>
                                @foreach(App\Models\BloodGroup::all() as $blood_group)
                                <option @if(Auth::user()->blood_group == $blood_group->name) selected @endif value="{{$blood_group->name}}">{{$blood_group->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Education</label>
                            <select name="education" id="education" class="form-control">
                                <option selected disabled>Select Education</option>
                                @foreach(App\Models\Education::all() as $education)
                                <option @if(Auth::user()->education == $education->name) selected @endif value="{{$education->name}}">{{$education->name}}</option>
                                @endforeach
                            </select>                              
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Profession</label>
                            <select name="profession" id="profession" class="form-control">
                                <option selected disabled>Select Profession</option>
                                @foreach(App\Models\Profession::all() as $profession)
                                <option @if(Auth::user()->profession == $profession->name) selected @endif value="{{$profession->name}}">{{$profession->name}}</option>
                                @endforeach
                            </select>                           
                        </div>
                   </div>
                   <p><strong>Footer:</strong></p>
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Business Address</label>
                            <input type="text" name="business_address" class="form-control" value="{{Auth::user()->business_address}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Reservation Email</label>
                            <input type="text" name="reservation_email" class="form-control" value="{{Auth::user()->reservation_email}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Reservation Phone</label>
                            <input type="text" name="reservation_phone" class="form-control" value="{{Auth::user()->reservation_phone}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Opening Hour</label>
                            <input type="text" name="opening_hour" class="form-control" value="{{Auth::user()->opening_hour}}" >
                        </div>
                   </div>
                   <p><strong>Social Links:</strong></p>
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Facebook</label>
                            <input type="text" name="facebook" class="form-control" value="{{Auth::user()->facebook}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Instagram</label>
                            <input type="text" name="instagram" class="form-control" value="{{Auth::user()->instagram}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Whatsapp</label>
                            <input type="text" name="whatsapp" class="form-control" value="{{Auth::user()->whatsapp}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Youtube</label>
                            <input type="text" name="youtube" class="form-control" value="{{Auth::user()->youtube}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Linkedin</label>
                            <input type="text" name="linkedin" class="form-control" value="{{Auth::user()->linkedin}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Twitter</label>
                            <input type="text" name="twitter" class="form-control" value="{{Auth::user()->twitter}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Tiktok</label>
                            <input type="text" name="tiktok" class="form-control" value="{{Auth::user()->tiktok}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Snack Video</label>
                            <input type="text" name="snack_video" class="form-control" value="{{Auth::user()->snack_video}}" >
                        </div>
                   </div>
                   <p><strong>Personal Informations:</strong></p>
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Real Name</label>
                            <input type="text" name="real_name" class="form-control" value="{{Auth::user()->real_name}}" >
                        </div>
                        <div class="form-group col-md-6">  
                            <label class="form-label">
                                Banner Image 
                                @if(Auth::user()->banner())
                                <a href="{{asset(Auth::user()->banner())}}" target="_blank">
                                    <i class="icon-eye text-indigo-400 opacity-75"></i>
                                </a>
                                @endif
                            </label>
                            <input type="file" name="banner" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">CNIC Front
                                @if(Auth::user()->cnicFront())
                                <a href="{{asset(Auth::user()->cnicFront())}}" target="_blank">
                                    <i class="icon-eye text-indigo-400 opacity-75"></i>
                                </a>
                                @endif
                            </label>
                            <input type="file" name="cnic_front" class="form-control"  >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">CNIC Back
                                @if(Auth::user()->cnicBack())
                                <a href="{{asset(Auth::user()->cnicBack())}}" target="_blank">
                                    <i class="icon-eye text-indigo-400 opacity-75"></i>
                                </a>
                                @endif
                            </label>
                            <input type="file" name="cnic_back" class="form-control"  >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Passport
                                @if(Auth::user()->passport())
                                <a href="{{asset(Auth::user()->passport())}}" target="_blank">
                                    <i class="icon-eye text-indigo-400 opacity-75"></i>
                                </a>
                                @endif
                            </label>
                            <input type="file" name="passport" class="form-control"  >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Driving License
                                @if(Auth::user()->drivingLicense())
                                <a href="{{asset(Auth::user()->drivingLicense())}}" target="_blank">
                                    <i class="icon-eye text-indigo-400 opacity-75"></i>
                                </a>
                                @endif
                            </label>
                            <input type="file" name="driving_license" class="form-control"  >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Utility Bill
                                @if(Auth::user()->utilityBill())
                                <a href="{{asset(Auth::user()->utilityBill())}}" target="_blank">
                                    <i class="icon-eye text-indigo-400 opacity-75"></i>
                                </a>
                                @endif
                            </label>
                            <input type="file" name="utility_bill" class="form-control"  >
                        </div>
                   </div>
                   <p><strong>Account Withdrawal Details:</strong></p>
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Bank Name</label>
                            <input type="text" name="bank_name" class="form-control" value="{{Auth::user()->bank_name}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">IBAN</label>
                            <input type="text" name="iban" class="form-control" value="{{Auth::user()->iban}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Account Holder Name</label>
                            <input type="text" name="account_holder_name" class="form-control" value="{{Auth::user()->account_holder_name}}" >
                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <textarea class="form-control summernote"   name="description">{{Auth::user()->description}}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label><input  @if(Auth::user()->hide_profile) checked="" @endif  type="checkbox" name="hide_profile" > Hide Profile On Website</label>
                        </div>
                   </div>
                    
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                @else 
                <p>Please Add One Product to enable profile</p>
                @endif
            </div>
        </div>
    </div>
</div>
@if (Auth::user()->products->count() > 0)
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Special Heading</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
        
            <div class="card-body">
                
                @if(App\Models\Special::where('user_id',Auth::user()->id)->count() < 5)
                <div class="row" style="margin-top:10px">
                    <div class="col-md-12">
                        <button data-toggle="modal" data-target="#create-modal"
                            class="btn btn-primary float-right">Create Special Heading</button>
                        
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Title</th>
                                    <th>Heading</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr> 
                            </thead>
                            <tbody>
                                @foreach (App\Models\Special::where('user_id',Auth::user()->id)->get() as $key => $special)
                                <tr> 
                                    <td>{{$key+1}}</td>
                                    <td>{{$special->title}}</td>
                                    <td>{{$special->heading}}</td>
                                    <td>
                                        <img src="{{asset($special->image)}}" height="50" width="50" alt="">
                                    </td>
                                    <td>{{$special->description}}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#edit_modal"
                                            description="{{$special->description}}" 
                                            heading="{{$special->heading}}" 
                                            id="{{$special->id}}" title="{{$special->title}}" 
                                            class="edit-btn btn btn-primary">Edit</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Event</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
        
            <div class="card-body">
                @if(App\Models\Event::where('user_id',Auth::user()->id)->count() < 3)
                <div class="row" style="margin-top:10px">
                    <div class="col-md-12">
                        <button data-toggle="modal" data-target="#create-event-modal"
                            class="btn btn-primary float-right">Create Event</button>
                        
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Link</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr> 
                            </thead>
                            <tbody>
                                @foreach (App\Models\Event::where('user_id',Auth::user()->id)->get() as $key => $event)
                                <tr> 
                                    <td>{{$key+1}}</td>
                                    <td>{{$event->title}}</td>
                                    <td>{{$event->price}}</td>
                                    <td>{{$event->link}}</td>
                                    <td>
                                        <img src="{{asset($event->image)}}" height="50" width="50" alt="">
                                    </td>
                                    <td>{{$event->description}}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#edit_event_modal"
                                            description="{{$event->description}}" 
                                            price="{{$event->price}}" link="{{$event->link}}" 
                                            id="{{$event->id}}" title="{{$event->title}}" 
                                            class="edit-event-btn btn btn-primary">Edit</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">User Service</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
        
            <div class="card-body">
                @if(App\Models\UserSpecial::where('user_id',Auth::user()->id)->count() < 4)
                <div class="row" style="margin-top:10px">
                    <div class="col-md-12">
                        <button data-toggle="modal" data-target="#create-user-special-modal"
                            class="btn btn-primary float-right">Create User Service</button>
                        
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr> 
                            </thead>
                            <tbody>
                                @foreach (App\Models\UserSpecial::where('user_id',Auth::user()->id)->get() as $key => $userSpecial)
                                <tr> 
                                    <td>{{$key+1}}</td>
                                    <td>{{$userSpecial->name}}</td>
                                    <td>
                                        <img src="{{asset($userSpecial->image)}}" height="50" width="50" alt="">
                                    </td>
                                    <td>{{$userSpecial->description}}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#edit_user_special_modal"
                                            description="{{$userSpecial->description}}" 
                                            id="{{$userSpecial->id}}" name="{{$userSpecial->name}}" 
                                            class="edit-user-special-btn btn btn-primary">Edit</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">User Main Section</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
        
            <div class="card-body">
                @if(App\Models\UserMainSection::where('user_id',Auth::user()->id)->count() < 4)
                <div class="row" style="margin-top:10px">
                    <div class="col-md-12">
                        <button data-toggle="modal" data-target="#create-user-main-section-modal"
                            class="btn btn-primary float-right">Create User Main Section</button>
                        
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr> 
                            </thead>
                            <tbody>
                                @foreach (App\Models\UserMainSection::where('user_id',Auth::user()->id)->get() as $key => $UserMainSection)
                                <tr> 
                                    <td>{{$key+1}}</td>
                                    <td>{{$UserMainSection->name}}</td>
                                    <td>
                                        <img src="{{asset($UserMainSection->image)}}" height="50" width="50" alt="">
                                    </td>
                                    <td>{{$UserMainSection->description}}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#edit_user_main_section_modal"
                                            description="{{$UserMainSection->description}}" 
                                            id="{{$UserMainSection->id}}" name="{{$UserMainSection->name}}" 
                                            class="edit-user-main-section-btn btn btn-primary">Edit</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">User FAQ</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
        
            <div class="card-body">
                @if(App\Models\UserFaq::where('user_id',Auth::user()->id)->count() < 6)
                <div class="row" style="margin-top:10px">
                    <div class="col-md-12">
                        <button data-toggle="modal" data-target="#create-user-faq-section-modal"
                            class="btn btn-primary float-right">Create User Faq Section</button>
                        
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr> 
                            </thead>
                            <tbody>
                                @foreach (App\Models\UserFaq::where('user_id',Auth::user()->id)->get() as $key => $user_faq)
                                <tr> 
                                    <td>{{$key+1}}</td>
                                    <td>{{$user_faq->question}}</td>
                                    <td>{{$user_faq->answer}}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#edit_user_faq_section_modal"
                                            question="{{$user_faq->question}}" 
                                            id="{{$user_faq->id}}" answer="{{$user_faq->answer}}" 
                                            class="edit-user-faq-section-btn btn btn-primary">Edit</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@include('adminty-user.profile.partials.specials-modals')
@include('adminty-user.profile.partials.event-modals')
@include('adminty-user.profile.partials.user-special-modals')
@include('adminty-user.profile.partials.user-main-section-modals')
@include('adminty-user.profile.partials.user-faq-section-modals')
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        let id;
        $('#category_id').on('change', function() {
            id = this.value;
            $.ajax({
                url: "{{route('user.product.brands')}}",
                method: 'post',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(result){
                    $('#brand_id').empty();
                    $('#brand_id').append('<option disabled>Select Product Brands</option>');
                    for (i=0;i<result.length;i++){
                        $('#brand_id').append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                    }
                }
            });
        });
         
        $('#country_id').on('change', function() {
            id = this.value;
            $.ajax({
                url: "{{route('user.product.cities')}}",
                method: 'post',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(response){
                    $('#city_id').empty();
                    $('#city_id').append('<option disabled>Select Product Cities</option>');
                    $('#conversionText').html("");
                    result = response.cities;
                    for (i=0;i<result.length;i++){
                        $('#city_id').append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                    }
                    $('#conversionText').html(response.html);
                }
            });
        });
        $('#service_id').on('change', function() {
            id = this.value;
            $.ajax({
                url: "{{route('user.service.types')}}",
                method: 'post',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(result){
                    $('#type_id').empty();
                    $('#type_id').append('<option disabled>Select Service Tyoe</option>');
                    for (i=0;i<result.length;i++){
                        $('#type_id').append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                    }
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let id = $(this).attr('id');
            let description = $(this).attr('description');
            let title = $(this).attr('title');
            let heading = $(this).attr('heading');
            $('#id').val(id);
            $('#title').val(title);
            $('#heading').val(heading);
            $('#description').html(description);
            $('#updateForm').attr('action','{{route('user.special.update','')}}' +'/'+id);
        });
        
        $('.edit-event-btn').click(function(){
            let id = $(this).attr('id');
            let description = $(this).attr('description');
            let title = $(this).attr('title');
            let price = $(this).attr('price');
            let link = $(this).attr('link');
            $('#event_title').val(title);
            $('#event_price').val(price);
            $('#event_link').val(link);
            $('#event_description').html(description);
            $('#updateEventForm').attr('action','{{route('user.event.update','')}}' +'/'+id);
        });
        $('.edit-user-special-btn').click(function(){
            let id = $(this).attr('id');
            let description = $(this).attr('description');
            let name = $(this).attr('name');
            $('#user_special_name').val(name);
            $('#user_special_description').html(description);
            $('#updateUserSpecialForm').attr('action','{{route('user.user_special.update','')}}' +'/'+id);
        });
        $('.edit-user-main-section-btn').click(function(){
            let id = $(this).attr('id');
            let description = $(this).attr('description');
            let name = $(this).attr('name');
            $('#user_main_section_name').val(name);
            $('#user_main_section_description').html(description);
            $('#updateUserMainSectionForm').attr('action','{{route('user.user_main_section.update','')}}' +'/'+id);
        });        
        $('.edit-user-faq-section-btn').click(function(){
            let id = $(this).attr('id');
            let question = $(this).attr('question');
            let answer = $(this).attr('answer');
            $('#user_faq_section_question').html(question);
            $('#user_faq_section_answer').html(answer);
            $('#updateUserFaqSectionForm').attr('action','{{route('user.user_faq.update','')}}' +'/'+id);
        });
    });
</script>
@endsection