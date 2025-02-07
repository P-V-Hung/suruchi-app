@extends('layouts.admin')
@section('title')
{{$title}}
@endsection
@section('content')
<div class="page-wrapper">
    <div class="main-content">
        <!-- Page Title Start -->
        <div class="row">
            <div class="col xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-title-wrapper">
                    <div class="page-title-box">
                        <h4 class="page-title">User Profile</h4>
                    </div>
                    <div class="breadcrumb-list">
                        <ul>
                            <li class="breadcrumb-link">
                                <a href="index.html"><i class="fas fa-home mr-2"></i>Dashboard</a>
                            </li>
                            <li class="breadcrumb-link active">User Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products view Start -->
        <div class="row">
            <div class="col-xl-4">
                <div class="card"><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                    <div class="card-header">
                        <h4 class="card-title mb-0">My Profile</h4>
                        <div class="card-options"><a class="card-options-collapse" href="javascript:;" data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="javascript:;" data-bs-toggle="card-remove" data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.profile')}}">
                            @csrf
                            @method('PUT')
                            <div class="profile-title">
                                <div class="media ad-profile2-img">
                                    <img alt="" src="{{optional($user->image)->url}}">
                                    <div class="media-body">
                                        <h5 class="mb-1">{{$user->name}}</h5>
                                        <p>DESIGNER</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Địa chỉ email</label>
                                <input class="form-control" placeholder="Địa chỉ mail" name="email" value="{{$user->email}}" @readonly('Không thể đổi email') data-bs-original-title="" title="">
                                @error('email')
                                <p class="text-danger fw-600">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mật khẩu cũ</label>
                                <input class="form-control" type="password" placeholder="Mật khẩu hiện tại" name="old-password" value="{{old('old-password')}}" data-bs-original-title="" title="">
                                @error('old-password')
                                <p class="text-danger fw-600">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mật khẩu mới</label>
                                <input class="form-control" type="password" placeholder="Mật khẩu mới" name="new-password" value="{{old('new-password')}}" data-bs-original-title="" title="">
                                @error('new-password')
                                <p class="text-danger fw-600">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Xác nhận mật khẩu</label>
                                <input type="password" class="form-control" placeholder="Xác nhận mật khẩu" name="new-rePassword" {{old('new-rePassword')}} data-bs-original-title="" title="">
                                @error('new-rePassword')
                                <p class="text-danger fw-600">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-footer">
                                <button class="btn btn-primary squer-btn" data-bs-original-title="" title="">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <form method="POST" action="{{route('admin.profile')}}" enctype="multipart/form-data" class="card">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title mb-0">Edit Profile</h4>
                        <div class="card-options"><a class="card-options-collapse" href="javascript:;" data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="javascript:;" data-bs-toggle="card-remove" data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input type="file" accept="image/*" name="image" onchange="showFile(this,'.showImageProfile')" class="d-none" id="file-profile">
                                <div class="d-flex justify-content-center">
                                    <label for="file-profile" class="cursor-pointer">
                                        <img style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" class="showImageProfile" src="{{optional($user->image)->url}}" alt="">
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Họ</label>
                                    <input name="first_name" value="{{$profile->first_name}}" class="form-control" type="text" placeholder="Họ" data-bs-original-title="" title="">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Tên</label>
                                    <input name="last_name" value="{{$profile->last_name}}" class="form-control" type="text" placeholder="Tên" data-bs-original-title="" title="">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Số điện thoại</label>
                                    <input name="tel" value="{{$profile->tel}}" class="form-control" type="text" placeholder="Số điện thoại" data-bs-original-title="" title="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Địa chỉ</label>
                                    <input name="address" value="{{$profile->address}}" class="form-control" type="text" placeholder="Địa chỉ chi tiết" data-bs-original-title="" title="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 form-select-btn">
                                    <label class="form-label">Thành Phố</label>
                                    <select name="province" id="tinh" onchange="showDistricts(this,'#huyen','#xa')" class="form-control btn-square form-btn">
                                        <option value="0">--Chọn tỉnh thành--</option>
                                    </select>
                                    <span class="sel_arrow">
                                        <i class="fa fa-angle-down "></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 form-select-btn">
                                    <label class="form-label">Quận/Huyện</label>
                                    <select name="district" id="huyen" onchange="showWards(this,'#xa')" class="form-control btn-square form-btn">
                                        <option value="0">--Chọn quận huyện--</option>
                                    </select>
                                    <span class="sel_arrow">
                                        <i class="fa fa-angle-down "></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 form-select-btn">
                                    <label class="form-label">Thị/Xã</label>
                                    <select name="ward" id="xa" class="form-control btn-square form-btn">
                                        <option value="0">--Chọn thị xã--</option>
                                    </select>
                                    <span class="sel_arrow">
                                        <i class="fa fa-angle-down "></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary squer-btn" type="submit" data-bs-original-title="" title="">Cập nhật thông tin</button>
                    </div>
                </form>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card table-card">
                    <div class="card-header pb-0">
                        <h4>Add projects And Upload</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-holder">
                            <div class="table-responsive">
                                <table class="table table-styled mb-0">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ai Traific</td>
                                            <td>28 May 2022</td>
                                            <td>Completed</td>
                                            <td>$22,124</td>
                                            <td class="relative">
                                                <a class="action-btn " href="javascript:void(0); ">
                                                    <svg class="default-size " viewBox="0 0 341.333 341.333 ">
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <path d="M170.667,85.333c23.573,0,42.667-19.093,42.667-42.667C213.333,19.093,194.24,0,170.667,0S128,19.093,128,42.667 C128,66.24,147.093,85.333,170.667,85.333z "></path>
                                                                    <path d="M170.667,128C147.093,128,128,147.093,128,170.667s19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 S194.24,128,170.667,128z "></path>
                                                                    <path d="M170.667,256C147.093,256,128,275.093,128,298.667c0,23.573,19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 C213.333,275.093,194.24,256,170.667,256z "></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </a>
                                                <div class="action-option ">
                                                    <ul>
                                                        <li>
                                                            <a href="javascript:void(0); "><i class="far fa-edit mr-2 "></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0); "><i class="far fa-trash-alt mr-2 "></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ai Traific</td>
                                            <td>28 May 2022</td>
                                            <td>Completed</td>
                                            <td>$22,124</td>
                                            <td class="relative">
                                                <a class="action-btn " href="javascript:void(0); ">
                                                    <svg class="default-size " viewBox="0 0 341.333 341.333 ">
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <path d="M170.667,85.333c23.573,0,42.667-19.093,42.667-42.667C213.333,19.093,194.24,0,170.667,0S128,19.093,128,42.667 C128,66.24,147.093,85.333,170.667,85.333z "></path>
                                                                    <path d="M170.667,128C147.093,128,128,147.093,128,170.667s19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 S194.24,128,170.667,128z "></path>
                                                                    <path d="M170.667,256C147.093,256,128,275.093,128,298.667c0,23.573,19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 C213.333,275.093,194.24,256,170.667,256z "></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </a>
                                                <div class="action-option ">
                                                    <ul>
                                                        <li>
                                                            <a href="javascript:void(0); "><i class="far fa-edit mr-2 "></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0); "><i class="far fa-trash-alt mr-2 "></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ai Traific</td>
                                            <td>28 May 2022</td>
                                            <td>Completed</td>
                                            <td>$22,124</td>
                                            <td class="relative">
                                                <a class="action-btn " href="javascript:void(0); ">
                                                    <svg class="default-size " viewBox="0 0 341.333 341.333 ">
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <path d="M170.667,85.333c23.573,0,42.667-19.093,42.667-42.667C213.333,19.093,194.24,0,170.667,0S128,19.093,128,42.667 C128,66.24,147.093,85.333,170.667,85.333z "></path>
                                                                    <path d="M170.667,128C147.093,128,128,147.093,128,170.667s19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 S194.24,128,170.667,128z "></path>
                                                                    <path d="M170.667,256C147.093,256,128,275.093,128,298.667c0,23.573,19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 C213.333,275.093,194.24,256,170.667,256z "></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </a>
                                                <div class="action-option ">
                                                    <ul>
                                                        <li>
                                                            <a href="javascript:void(0); "><i class="far fa-edit mr-2 "></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0); "><i class="far fa-trash-alt mr-2 "></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ai Traific</td>
                                            <td>28 May 2022</td>
                                            <td>Completed</td>
                                            <td>$22,124</td>
                                            <td class="relative">
                                                <a class="action-btn " href="javascript:void(0); ">
                                                    <svg class="default-size " viewBox="0 0 341.333 341.333 ">
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <path d="M170.667,85.333c23.573,0,42.667-19.093,42.667-42.667C213.333,19.093,194.24,0,170.667,0S128,19.093,128,42.667 C128,66.24,147.093,85.333,170.667,85.333z "></path>
                                                                    <path d="M170.667,128C147.093,128,128,147.093,128,170.667s19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 S194.24,128,170.667,128z "></path>
                                                                    <path d="M170.667,256C147.093,256,128,275.093,128,298.667c0,23.573,19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 C213.333,275.093,194.24,256,170.667,256z "></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </a>
                                                <div class="action-option ">
                                                    <ul>
                                                        <li>
                                                            <a href="javascript:void(0); "><i class="far fa-edit mr-2 "></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0); "><i class="far fa-trash-alt mr-2 "></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-right mt-2">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="javascript:void(0);" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0);">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0);"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ad-footer-btm">
            <p>Copyright 2022 © SplashDash All Rights Reserved.</p>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            getProvinces($("#tinh"),{{$profile->tinh}});
            getDistricts($("#huyen"),{{$profile->tinh}},{{$profile->huyen}});
            getWards($("#xa"),{{$profile->huyen}},{{$profile->xa}});
        });
    </script>
@endsection
