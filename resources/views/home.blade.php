@extends('layouts.app')

@section('content')
<div class="row gy-5 g-xl-10 align-items-center d-lg-none d-xl-none">
    <div class="col-xl-12">
        <div class="card h-100 bgi-no-repeat bgi-size-cover card-xl-stretch mb-5 mb-xl-8" style="background-image:url('{{asset('assets/media/misc')}}/menu-header-bg.jpg')">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="text-white py-5">
                    <h1 class="fw-bold text-white mb-2">Selamat Datang</h1>
                    <h4 class="text-white mb-2">Aplikasi Kesantrian</h3>
                    <h4 class="text-white mb-2">Ruhul Islam Anak Bangsa</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row gy-5 g-xl-10 align-items-center">
    <div class="col-6 col-md-2">
        <div class="card" style="background-color: #F6E5CA">
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                <div class="d-flex flex-column">
                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">327</span>
                    <div class="m-0">
                        <span class="fw-semibold fs-5 text-gray-700">Santriwan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-2">
        <div class="card" style="background-color: #fd79a8">
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                <div class="d-flex flex-column">
                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">327</span>
                    <div class="m-0">
                        <span class="fw-semibold fs-5 text-gray-700">Santriwati</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-2">
        <div class="card" style="background-color: #74b9ff">
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                <div class="d-flex flex-column">
                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">327</span>
                    <div class="m-0">
                        <span class="fw-semibold fs-5 text-gray-700">IPA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-2">
        <div class="card" style="background-color: #55efc4">
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                <div class="d-flex flex-column">
                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">327</span>
                    <div class="m-0">
                        <span class="fw-semibold fs-5 text-gray-700">MAK</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-12 col-xl-4 col-xxl-4">
        <div class="card card-flush h-lg-100 mb-5 mb-xl-10">
            <div class="card-header pt-5">
                <div class="card-title d-flex flex-column">
                    <div class="d-flex align-items-center">
                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">69,700</span>
                    </div>
                    <span class="text-gray-700 pt-1 fw-semibold fs-5">Total Active Student</span>
                </div>
            </div>
            <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                <div class="d-flex flex-column content-justify-center flex-row-fluid">
                    <div class="d-flex fw-semibold align-items-center">
                        <div class="bullet w-10px h-5px rounded-3 bg-success me-3"></div>
                        <div class="text-gray-700 flex-grow-1 me-4">Class X</div>
                        <div class="fw-bolder text-gray-700 text-xxl-end">200</div>
                    </div>
                    <div class="d-flex fw-semibold align-items-center my-3">
                        <div class="bullet w-10px h-5px rounded-3 bg-primary me-3"></div>
                        <div class="text-gray-700 flex-grow-1 me-4">Class XI</div>
                        <div class="fw-bolder text-gray-700 text-xxl-end">100</div>
                    </div>
                    <div class="d-flex fw-semibold align-items-center">
                        <div class="bullet w-10px h-5px rounded-3 bg-danger me-3"></div>
                        <div class="text-gray-700 flex-grow-1 me-4">Class XII</div>
                        <div class="fw-bolder text-gray-700 text-xxl-end">200</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row gy-5 g-xl-10">
    <div class="col-lg-8 col-xl-8 col-md-6 mb-md-5">
        <div class="card card-flush">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Permited Student</span>
                </h3>
                <div class="card-toolbar">
                    <a href="" class="btn btn-sm btn-light">View All</a>
                </div>
            </div>
            <div class="card-body pt-6">
                <div class="table-responsive">
                    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                        <thead>
                            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                <th class="p-0 pb-3 min-w-175px text-start">Name</th>
                                <th>Destination</th>
                                <th>Permited By</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-3">
                                            <img src="" class="" alt="Student Photo">
                                        </div>
                                        <div class="d-block justify-content-end">
                                            <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Ryan Achdiadsyah</div>
                                            <span class="p-2 badge badge-light-primary my-1">XII-IPA-1</span>
                                            <span class="p-2 badge badge-light-danger">Andalusia-01</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p>Rumah</p>
                                </td>
                                <td>
                                    <p>Ustd. Rachmad Munazir</p>
                                </td>
                                <td class="text-end">
                                    <a href="" class="btn btn-secondary py-2 px-3 fs-7">Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xl-4 col-md-6 mb-md-5">
        <div class="card card-flush">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Recent Activity</span>
                </h3>
            </div>
            <div class="card-body pt-6">
                <div class="table-responsive">
                    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                        <tbody>
                            @foreach (UserLog::showLog('4') as $item)
                            <tr>
                                <td>
                                    <p>
                                        <b>{{$item->user->name}}</b>
                                        {{$item->description}}<br>
                                        <i class="fas fa-clock"></i> <b>{{$item->created_at}}</b><br>
                                        <i class="fas fa-computer"></i> <b>{{$item->ip}}</b>
                                    </p>
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
@endsection
