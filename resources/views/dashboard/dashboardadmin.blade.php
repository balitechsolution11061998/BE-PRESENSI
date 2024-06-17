@extends('layouts.admin.tabler')
@section('dashboard')
						<div class="row gx-3">
							<div class="col-md-3 col-sm-6 col-12">
								<div class="bg-transparent-light rounded-1 mb-3 position-relative">
									<div class="p-3 text-white">
										<div class="mb-2">
											<i class="bi bi-bar-chart fs-1 lh-1"></i>
										</div>
										<div class="d-flex align-items-center justify-content-between">
											<h5 class="m-0 fw-normal">Data Izin</h5>
											<h3 class="m-0"> {{ $rekappresensi->jmlizin }}</h3>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-12">
								<div class="bg-transparent-light rounded-1 mb-3 position-relative">
									<div class="p-3 text-white">
										<div class="mb-2">
											<i class="bi bi-bag-check fs-1 lh-1"></i>
										</div>
										<div class="d-flex align-items-center justify-content-between">
											<h5 class="m-0 fw-normal">Data Karyawan Hadir</h5>
											<h3 class="m-0"> {{ $rekappresensi->jmlhadir }}</h3>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-12">
								<div class="bg-transparent-light rounded-1 mb-3 position-relative">
									<div class="p-3 text-white">
										<div class="arrow-label">+18%</div>
										<div class="mb-2">
											<i class="bi bi-box-seam fs-1 lh-1"></i>
										</div>
										<div class="d-flex align-items-center justify-content-between">
											<h5 class="m-0 fw-normal">Karyawan Sakit</h5>
											<h3 class="m-0">{{ $rekappresensi->jmlsakit }}</h3>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-12">
								<div class="bg-transparent-light rounded-1 mb-3 position-relative">
									<div class="p-3 text-white">
										<div class="arrow-label">+24%</div>
										<div class="mb-2">
											<i class="bi bi-bell fs-1 lh-1"></i>
										</div>
										<div class="d-flex align-items-center justify-content-between">
											<h5 class="m-0 fw-normal">Karyawan Terlambat</h5>
											<h3 class="m-0">{{ $rekappresensi->jmlterlambat }}</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
@endsection
@section('content')
<div class="row gx-3">
    <div class="col-xl-12 col-sm-12 col-12">
        <div class="card mb-3">
            <div class="card-body height-230">
                <div class="row align-items-end">
                    <div class="col-sm-8">
                        <h3 class="mb-4"><div class="row gx-3">
                    	</div>Rekap Presensi Hari Ini {{ date('d-m-Y', strtotime(date('Y-m-d'))) }}🎉</h3>
						<h4>

							إِنَّ مَعَ ٱلْعُسْرِ يُسْرًا - فَإِذَا فَرَغْتَ فَٱنصَبْ
						</h4>
                        <p>
							Sesungguhnya Bersama Kesulitan Itu Ada Kemudahan,
							Maka Apabila kamu Telah Selesai (Dari Suatu Urusan), Tetaplah Bekerja Keras (Untuk Urusan Yang Lain). QS. Al-Insyirah : 6-7
                        </p>
                        {{-- <div class="mt-4 d-flex flex-wrap gap-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-box lg grd-info-light rounded-5 me-3">
                                    <i class="bi bi-bag text-info fs-3"></i>
                                </div>
                                <div class="m-0">
                                    <h3 class="m-0 fw-semibold">$4800</h3>
                                    <p class="m-0 text-secondary">This Year</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="icon-box lg grd-danger-light rounded-5 me-3">
                                    <i class="bi bi-bag text-danger fs-3"></i>
                                </div>
                                <div class="m-0">
                                    <h3 class="m-0 fw-semibold">$2300</h3>
                                    <p class="m-0 text-secondary">Last Year</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-sm-4">
                        <img src="{{ asset('assetss/images/sales.svg')}}" class="congrats-img" alt="Bootstrap Gallery" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
