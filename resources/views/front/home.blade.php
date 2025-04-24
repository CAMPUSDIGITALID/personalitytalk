@extends('template.main')
@section('title', $seo->meta_title)
@section('keywords', $seo->meta_keyword)
@section('description', $seo->meta_description)
@section('content')

<section id="main-image">
	<div class="container px-sm-0">
		<div class="sl-main-image">
			<div>
				<a href="javascript:void(0)">
					<div class="w-150">
						<div class="position-relative">
							<img src="{{ asset('assets/images/slider/SLIDER 1.jpg') }}" alt="Slider">
						</div>
					</div>
				</a>
			</div>
			<div>
				<a href="/register">
					<div class="w-150">
						<div class="position-relative">
							<img src="{{ asset('assets/images/slider/SLIDER 2.jpg') }}" alt="Slider">
						</div>
					</div>
				</a>
			</div>
			<div>
				<a href="/register">
					<div class="w-100">
						<div class="position-relative">
							<img src="{{ asset('assets/images/slider/SLIDER 3.jpg') }}" alt="Slider">
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
<section id="category">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col mb-3">
				<a class="text-decoration-none" href="{{ route('site.program.index', ['category' => 'e-learning']) }}">
					<div class="m-auto border px-4 py-3 rounded-2" style="width: fit-content">
						<img src="{{asset('assets/images/category/distance-education.svg')}}" alt="category">
					</div>
					<div class="text-center">
						<p class="font-weight-bold mb-0 mt-2">E-Learning<br>&nbsp;</p>
					</div>
				</a>
			</div>
			<div class="col mb-3">
				<a class="text-decoration-none" href="{{ route('site.program.index', ['category' => 'online-course']) }}" >
					<div class="m-auto border px-4 py-3 rounded-2" style="width: fit-content">
						<img src="{{asset('assets/images/category/call.svg')}}" alt="category">
					</div>
					<div class="text-center">
						<p class="font-weight-bold mb-0 mt-2">Online Course<br>&nbsp;</p>
					</div>
				</a>
			</div>
			<div class="col mb-3">
				<a class="text-decoration-none" href="{{ route('site.program.index', ['category' => 'workshop']) }}">
					<div class="m-auto border px-4 py-3 rounded-2" style="width: fit-content">
						<img src="{{asset('assets/images/category/audio-book.svg')}}" alt="category">
					</div>
					<div class="text-center">
						<p class="font-weight-bold mb-0 mt-2">Workshop<br>&nbsp;</p>
					</div>
				</a>
			</div>
			<div class="col mb-3">
				<a class="text-decoration-none" href="{{ route('site.program.index', ['category' => 'sertifikasi']) }}">
					<div class="m-auto border px-4 py-3 rounded-2" style="width: fit-content">
						<img src="{{asset('assets/images/category/course.svg')}}" alt="category">
					</div>
					<div class="text-center">
						<p class="font-weight-bold mb-0 mt-2">Sertifikasi<br>&nbsp;</p>
					</div>
				</a>
			</div>
			<div class="col mb-3">
				<a class="text-decoration-none" href="{{ route('site.karir.index') }}">
					<div class="m-auto border px-4 py-3 rounded-2" style="width: fit-content">
						<img src="{{asset('assets/images/category/blended-learning.svg')}}" alt="category">
					</div>
					<div class="text-center">
						<p class="font-weight-bold mb-0 mt-2">Karir<br>&nbsp;</p>
					</div>
				</a>
			</div>
			<div class="col mb-3">
				<a class="text-decoration-none" href="{{ route('site.program.index', ['category' => 'asesmen']) }}">
					<div class="m-auto border px-4 py-3 rounded-2" style="width: fit-content">
						<img src="{{asset('assets/images/category/daily-tasks.svg')}}" alt="category">
					</div>
					<div class="text-center">
						<p class="font-weight-bold mb-0 mt-2">Asesmen<br>&nbsp;</p>
					</div>
				</a>
			</div>
			<div class="col mb-3">
				<a class="text-decoration-none" href="{{ route('site.program.index', ['category' => 'seleksi-rekruitmen']) }}">
					<div class="m-auto border px-4 py-3 rounded-2" style="width: fit-content">
						<img src="{{asset('assets/images/category/checkpoint.svg')}}" alt="category">
					</div>
					<div class="text-center">
						<p class="font-weight-bold mb-0 mt-2">Seleksi &<br>Rekrutmen</p>
					</div>
				</a>
			</div>
			<div class="col mb-3">
				<a class="text-decoration-none" href="{{ route('site.program.index', ['category' => 'pelatihan-pendampingan']) }}">
					<div class="m-auto border px-4 py-3 rounded-2" style="width: fit-content">
						<img src="{{asset('assets/images/category/passive-candidate.svg')}}" alt="category">
					</div>
					<div class="text-center">
						<p class="font-weight-bold mb-0 mt-2">Pelatihan &<br>Pendampingan</p>
					</div>
				</a>
			</div>
			<div class="col mb-3">
				<a class="text-decoration-none" href="{{ route('site.program.index', ['category' => 'konseling-psikoterapi']) }}">
					<div class="m-auto border px-4 py-3 rounded-2" style="width: fit-content">
						<img src="{{asset('assets/images/category/cloud-connection.svg')}}" alt="category">
					</div>
					<div class="text-center">
						<p class="font-weight-bold mb-0 mt-2">Konseling &<br>Psikoterapi</p>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
<section id="section-profile">
	<div class="container h-100 section-block">
		<div class="row h-100">
			<div class="col-12 my-auto">
				<div class="media d-block d-lg-flex align-items-center text-center text-lg-start">
					<div class="p-3 rounded-2 bg-primary me-3 mb-3 mb-lg-0">
						<img width="100" src="{{asset('assets/images/logo/new_log.png')}}" >
					</div>
					<div class="media-body">
						<h3 class="title">Apa itu PsikologAnda?</h3>
						<p class="m-0">PsikologAnda adalah lembaga yang bergerak di bidang jasa training, coaching, dan consulting dalam bidang psikologi.<br>Berdiri sejak tahun 2014, Alhamdulillah PsikologAnda telah membantu banyak orang dalam menyelesaikan permasalahan tentang kehidupan keluarga, karir, dan bisnis. Dengan para mentor yang berpengalaman di bidangnya menjadikan PsikologAnda dipercaya menjadi media tempat belajar para Mahasiswa Psikologi, Praktisi SDM, Psikolog, Guru, Dosen, Praktisi NLP, Hypnoterapis, juga para Orang Tua yang ingin mendapatkan pembelajaran baik teori maupun praktik.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-12 my-auto">
				<div class="card border-0">
					<img src="{{asset('assets/images/ilustrasi/person_2.png')}}" >
				</div>
			</div>
			<div class="col-4">
				<a href="/register" class="btn btn-daf mt-4 rounded-1" style="font-size:calc(0.8vw + 1vh);width:380px"><b>Daftar Sekarang</b></a>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container mt-5">
		<div class="row gy-4">
			<div class="col-lg-6 col-12">
				<div class="card bg-primary rounded-2">
					<div class="row p-3">
						<div class="col-6">
							<h2 class="title text-white"><b>E-Learning</b></h2>
						</div>
						<div class="col-6">
							<a href="{{ route('site.program.index', ['category' => 'e-learning']) }}" type="button" class="btn butt"> <b>Lihat Semua...</b></a>
						</div>
						<div class="p-4">
							<div class="card p-2 rounded-3">
								<div class="col-12">
									<div class="py-4">
										<div class="sl-course sl-card card-view2" data-count="">
											@foreach($program_elearning as $data)
											<div>
												<div class="card border-0 rounded-3 shadow">
													<a href="/program/{{ $data->program_permalink }}">
														<div class="position-relative">
															<div class="img-wrapper">
																<img src="{{ image('assets/images/program/'.$data->program_gambar, 'program') }}" class="img-fluid" style="border-top-left-radius: 20px;border-top-right-radius:20px" alt="">
															</div>
														</div>
													</a>
													<div class="card-body">
														<a class="title text-decoration-none text-body fw-bold" href="/program/{{ $data->program_permalink }}">
															<div class="col-12"><p class="text-truncate">{{ $data->program_title }}</p></div>
														</a>
														<p style="font-size: 14px" class="d-none d-md-block">{{ substr(strip_tags(html_entity_decode($data->konten)),0,60).'...' }} <br>
															<a class="link-primary text-decoration-none fw-bold" href="/program/{{ $data->program_permalink }}">Selengkapnya <i class="bi bi-arrow-right"></i></a>
														</p>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>		
				</div>
			</div>
			<div class="col-lg-6 col-12">
				<div class="card bg-primary rounded-2">
					<div class="row p-3">
						<div class="col-6">
							<h2 class="title text-white"><b>Online-Course</b></h2>
						</div>
						<div class="col-6">
							<a href="{{ route('site.program.index', ['category' => 'online-course']) }}" type="button" class="btn butt"> <b>Lihat Semua...</b></a>
						</div>
						<div class="p-4">
							<div class="card p-2 rounded-3">
								<div class="col-12">
									<div class="py-4">
										<div class="sl-course sl-card card-view2" data-count="">
											@foreach($program_course as $data)
											<div>
												<div class="card border-0 rounded-3 shadow">
													<a href="/program/{{ $data->program_permalink }}">
														<div class="position-relative">
															<div class="img-wrapper">
																<img src="{{ image('assets/images/program/'.$data->program_gambar, 'program') }}" class="img-fluid" style="border-top-left-radius: 20px;border-top-right-radius:20px" alt="">
															</div>
														</div>
													</a>
													<div class="card-body">
														<a class="title text-decoration-none text-body fw-bold" href="/program/{{ $data->program_permalink }}">
															<div class="col-12"><p class="text-truncate">{{ $data->program_title }}</p></div>
														</a>
														<p style="font-size: 14px" class="d-none d-md-block">{{ substr(strip_tags(html_entity_decode($data->konten)),0,60).'...' }} <br>
															<a class="link-primary text-decoration-none fw-bold" href="/program/{{ $data->program_permalink }}">Selengkapnya <i class="bi bi-arrow-right"></i></a></p>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>		
				</div>
			</div>
			<div class="col-lg-6 col-12">
				<div class="card bg-primary rounded-2">
					<div class="row p-3">
						<div class="col-6">
							<h2 class="title text-white"><b>Workshop</b></h2>
						</div>
						<div class="col-6">
							<a href="{{ route('site.program.index', ['category' => 'workshop']) }}" type="button" class="btn butt"> <b>Lihat Semua...</b></a>
						</div>
						<div class="p-4">
							<div class="card p-2 rounded-3">
								<div class="col-12">
									<div class="py-4">
										<div class="sl-course sl-card card-view2" data-count="">
											@foreach($program_workshop as $data)
											<div>
												<div class="card border-0 rounded-3 shadow">
													<a href="/program/{{ $data->program_permalink }}">
														<div class="position-relative">
															<div class="img-wrapper">
																<img src="{{ image('assets/images/program/'.$data->program_gambar, 'program') }}" class="img-fluid" style="border-top-left-radius: 20px;border-top-right-radius:20px" alt="">
															</div>
														</div>
													</a>
													<div class="card-body">
														<a class="title text-decoration-none text-body fw-bold" href="/program/{{ $data->program_permalink }}">
															<div class="col-12"><p class="text-truncate">{{ $data->program_title }}</p></div>
														</a>
														<p style="font-size:14px" class="d-none d-md-block">{{ substr(strip_tags(html_entity_decode($data->konten)),0,60).'...' }} <br>
															<a class="link-primary text-decoration-none fw-bold" href="/program/{{ $data->program_permalink }}">Selengkapnya <i class="bi bi-arrow-right"></i></a>
														</p>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>		
				</div>
			</div>
			<div class="col-lg-6 col-12">
				<div class="card bg-primary rounded-2">
					<div class="row p-3">
						<div class="col-6">
							<h2 class="title text-white"><b>Sertifikasi</b></h2>
						</div>
						<div class="col-6">
							<a href="{{ route('site.program.index', ['category' => 'sertifikasi']) }}" type="button" class="btn butt"> <b>Lihat Semua...</b></a>
						</div>
						<div class="p-4">
							<div class="card p-2 rounded-3">
								<div class="col-12">
									<div class="py-4">
										<div class="sl-course sl-card card-view2" data-count="">
											@foreach($program_sertifikasi as $data)
											<div>
												<div class="card border-0 rounded-3 shadow">
													<a href="/program/{{ $data->program_permalink }}">
														<div class="position-relative">
															<div class="img-wrapper">
																<img src="{{ image('assets/images/program/'.$data->program_gambar, 'program') }}" class="img-fluid" style="border-top-left-radius: 20px;border-top-right-radius:20px" alt="">
															</div>
														</div>
													</a>
													<div class="card-body">
														<a class="title text-decoration-none text-body fw-bold" href="/program/{{ $data->program_permalink }}">
															<div class="col-12"><p class="text-truncate">{{ $data->program_title }}</p></div>
														</a>
														<p style="font-size: 14px" class="py-4 d-none d-md-block">{{ substr(strip_tags(html_entity_decode($data->konten)),0,60).'...' }} <br>
															<a class="link-primary text-decoration-none fw-bold" href="/program/{{ $data->program_permalink }}">Selengkapnya <i class="bi bi-arrow-right"></i></a>
														</p>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>		
				</div>
			</div>
			
		</div>
	</div>

</section>
{{-- <section id="e-learning">
	<div class="container section-block">
		<div class="row pl-0">
			<div class="col-12 col-lg-3 d-flex" data-aos="fade-right">
				<div class="my-auto">
					<h2 class="title">E-Learning</h2>
					<div class="desc">Tambah pengetahuan kamu dengan belajar ilmu psikologi melalu E-Learning dari PsikologAnda.</div>
					<a class="link-primary text-decoration-none fw-bold" href="{{ route('site.program.index', ['category' => 'e-learning']) }}">Lihat semua <i class="bi bi-arrow-right"></i></a>
				</div>
			</div>
			<div class="col-12 col-lg-9">
				<div class="py-4">
					<div class="sl-course sl-card card-view2" data-count="">
						@foreach($program_elearning as $data)
						<div>
							<div class="card border-0 rounded-2 shadow-sm">
								<a href="/program/{{ $data->program_permalink }}">
									<div class="position-relative">
										<div class="img-wrapper">
											<img src="{{ image('assets/images/program/'.$data->program_gambar, 'program') }}" class="img-fluid" alt="">
										</div>
									</div>
								</a>
								<div class="card-body">
									<a class="title text-decoration-none text-body fw-bold" href="/program/{{ $data->program_permalink }}">
										<div class="col-12"><p class="text-truncate">{{ $data->program_title }}</p></div>
									</a>
									<p class="d-none d-md-block">{{ substr(strip_tags(html_entity_decode($data->konten)),0,100).'...' }} <br>
										<a class="link-primary text-decoration-none fw-bold" href="/program/{{ $data->program_permalink }}">Selengkapnya <i class="bi bi-arrow-right"></i></a>
									</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section> --}}
{{-- <section id="online-course">
	<div class="container section-block">
		<div class="row pl-0">
			<div class="col-12 col-lg-3 d-flex" data-aos="fade-right">
				<div class="my-auto">
					<h2 class="title">Online Course</h2>
					<div class="desc">Tingkatkan keterampilan profesional kamu dalam bidang psikologi dan SDM dengan mengikuti E-Course.</div> 
					<a class="link-primary text-decoration-none fw-bold" href="{{ route('site.program.index', ['category' => 'online-course']) }}">Lihat semua <i class="bi bi-arrow-right"></i></a>
				</div>
			</div>
			<div class="col-12 col-lg-9">
				<div class="py-4">
					<!-- <div class="spinner-border mx-auto" role="status"><span class="sr-only">Loading...</span></div> -->
					<div class="sl-course sl-card card-view2" data-count="">
						@foreach($program_course as $data)
						<div>
							<div class="card border-0 rounded-2 shadow-sm">
								<a href="/program/{{ $data->program_permalink }}">
									<div class="position-relative">
										<div class="img-wrapper">
											<img src="{{ image('assets/images/program/'.$data->program_gambar, 'program') }}" class="img-fluid" alt="">
										</div>
									</div>
								</a>
								<div class="card-body">
									<a class="title text-decoration-none text-body fw-bold" href="/program/{{ $data->program_permalink }}">
									<div class="col-12"><p class="text-truncate">{{ $data->program_title }}</p></div>
									</a>
									<p class="d-none d-md-block">{{ substr(strip_tags(html_entity_decode($data->konten)),0,100).'...' }} <br><a class="link-primary text-decoration-none fw-bold" href="/program/{{ $data->program_permalink }}">Selengkapnya <i class="bi bi-arrow-right"></i></a></p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
<!-- 				<div class="text-center py-4">
					<div class="spinner-border mx-auto" role="status"><span class="sr-only">Loading...</span></div>
				</div> -->
			</div>
		</div>
	</div>
</section> --}}
{{-- <section id="workshop">
	<div class="container section-block">
		<div class="row pl-0">
			<div class="col-12 col-lg-3 d-flex" data-aos="fade-right">
				<div class="my-auto">
					<h2 class="title">Workshop</h2>
					<div class="desc">Tingkatkan keterampilan praktis kamu dengan mengikuti berbagai workshop yang diselenggarakan oleh PsikologAnda.</div> 
					<a class="link-primary text-decoration-none fw-bold" href="{{ route('site.program.index', ['category' => 'workshop']) }}">Lihat semua <i class="bi bi-arrow-right"></i></a>
				</div>
			</div>
			<div class="col-12 col-lg-9">
				<div class="py-4">
					<!-- <div class="spinner-border mx-auto" role="status"><span class="sr-only">Loading...</span></div> -->
					<div class="sl-course sl-card card-view2" data-count="">
						@foreach($program_workshop as $data)
						<div>
							<div class="card border-0 rounded-2 shadow-sm">
								<a href="/program/{{ $data->program_permalink }}">
									<div class="position-relative">
										<div class="img-wrapper">
											<img src="{{ image('assets/images/program/'.$data->program_gambar, 'program') }}" class="img-fluid" alt="">
										</div>
										<div class="container-category">
										</div>
									</div>
								</a>
								<div class="card-body">
									<a class="title text-decoration-none text-body fw-bold" href="/program/{{ $data->program_permalink }}">
										<div class="col-12"><p class="text-truncate">{{ $data->program_title }}</p></div>
									</a>
									<p class="d-none d-md-block">{{ substr(strip_tags(html_entity_decode($data->konten)),0,100).'...' }} 
										<br>
									<a class="link-primary text-decoration-none fw-bold" href="/program/{{ $data->program_permalink }}">Selengkapnya <i class="bi bi-arrow-right"></i></a></p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
<!-- 				<div class="text-center py-4">
					<div class="spinner-border mx-auto" role="status"><span class="sr-only">Loading...</span></div>
				</div> -->
			</div>
		</div>
	</div>
</section> --}}
{{-- <section id="sertifikasi">
	<div class="container section-block">
		<div class="row pl-0">
			<div class="col-12 col-lg-3 d-flex" data-aos="fade-right">
				<div class="my-auto">
					<h2 class="title">Sertifikasi</h2>
					<div class="desc">Persiapkan diri kamu untuk memenuhi kebutuhan sertifikasi bidang psikologi. Ikuti kursusnya sekarang.</div>
					 <a class="link-primary text-decoration-none fw-bold" href="{{ route('site.program.index', ['category' => 'sertifikasi']) }}">Lihat semua <i class="bi bi-arrow-right"></i></a>
				</div>
			</div>
			<div class="col-12 col-lg-9">
				<div class="py-4">
					<!-- <div class="spinner-border mx-auto" role="status"><span class="sr-only">Loading...</span></div> -->
					<div class="sl-course sl-card card-view2" data-count="">
						@foreach($program_sertifikasi as $data)
						<div>
							<div class="card border-0 rounded-2 shadow-sm">
								<a href="/program/{{ $data->program_permalink }}">
									<div class="position-relative">
										<div class="img-wrapper">
											<img src="{{ image('assets/images/program/'.$data->program_gambar, 'program') }}" class="img-fluid" alt="">
										</div>
									</div>
								</a>
								<div class="card-body">
									<a class="title text-decoration-none text-body fw-bold" href="/program/{{ $data->program_permalink }}">
										<div class="col-12"><p class="text-truncate">{{ $data->program_title }}</p></div>
									</a>
									<p class="d-none d-md-block">{{ substr(strip_tags(html_entity_decode($data->konten)),0,100).'...' }} <br><a class="link-primary text-decoration-none fw-bold" style="display: inline;" href="/program/{{ $data->program_permalink }}">Selengkapnya></a></p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
<!-- 				<div class="text-center py-4">
					<div class="spinner-border mx-auto" role="status"><span class="sr-only">Loading...</span></div>
				</div> -->
			</div>
		</div>
	</div>
</section> --}}
<section id="career" class="d-none">
	<div class="container section-block">
		<div class="row pl-0">
			<div class="col-12 col-lg-3 d-flex" data-aos="fade-right">
				<div class="my-auto">
					<h2 class="title">Karir</h2>
					<div class="desc">Temukan karir kamu dari mitra PsikologAnda.</div> <a class="link-primary text-decoration-none fw-bold" href="/karir">Lihat semua <i class="bi bi-arrow-right"></i></a>
				</div>
			</div>
			<div class="col-12 col-lg-9">
				<div class="py-4">
					<!-- <div class="spinner-border mx-auto" role="status"><span class="sr-only">Loading...</span></div> -->
					<div class="sl-card card-view2 psikologanda-karir" data-count="">
						<!-- @foreach($karir as $data)
						<div>
							<div class="card border-0 rounded-2 shadow-sm">
								<a href="/karir/{{ $data->karir_permalink }}">
									<div class="position-relative">
										<div class="img-wrapper">
											<img src="{{ image('assets/images/karir/'.$data->karir_gambar, 'karir') }}" class="img-fluid" alt="">
										</div>
										<div class="container-category">
										</div>
									</div>
								</a>
								<div class="card-body">
									<a class="title text-decoration-none text-body fw-bold" href="/karir/{{ $data->karir_permalink }}">
										<div class="col-12"><p class="text-truncate"><p>{{ $data->karir_title }}</p></div>
									</a>
									<p class="d-none d-md-block">{{ substr(strip_tags(html_entity_decode($data->konten)),0,100).'...' }} <br><a class="link-primary text-decoration-none fw-bold" href="/karir/{{ $data->karir_permalink }}">Selengkapnya <i class="bi bi-arrow-right"></i></a></p>
								</div>
							</div>
						</div>
						@endforeach -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="simple-profile" >
	<div class="container h-100 section-block">
		<div class="row h-100">
			<div class="col-12 my-auto">
				<div class="media d-block text-center text-lg-start d-lg-flex justify-content-between align-items-center">
					<img width="80" class="me-3 mb-3 mb-lg-0" src="{{asset('assets/images/category/meditation.svg')}}">
					<div class="text-center">Apakah Anda Praktisi SDM, Psikolog, Guru, Dosen, Praktisi NLP, Hypnoterapis, atau Mahasiswa Psikologi?<br>PsikologAnda adalah solusi alternatif pembelajaran praktis seputar ilmu psikologi dan terapannya<br> untuk membantu Anda dalam hal pengembangan diri, komunikasi, karir, dan keluarga.
					</div>
					@if(Auth::guest())
						<a href="/register" class="btn btn-primary mt-3 rounded-1">Daftar Sekarang</a>
					@else
						<a href="#" class="btn btn-primary mt-3 rounded-1"><b>Mulai Belajar</b></a>
					@endif
				</div>
			</div>
		</div>
	</div>
</section>

<section id="partner" >
	<div class="container h-100 section-block">
		<div class="row h-100">
			<div class="col-12 text-center my-auto">
				<h2 class="title my-3">Mitra</h2>
				<div id="mitra">
					@foreach($mitra as $data)
					<div class="card text-center rounded-qbs shadow-qbs mx-2 border-0 my-2">
						<img src="{{ asset('assets/images/mitra/'.$data->logo_mitra) }}" class="card-img-top m-auto py-3" style="max-height: 100px!important; width: auto!important;">
						<div class="card-footer bg-transparent mx-4 pb-0">
							<p class="font-weight-bold">{{ $data->nama_mitra }}</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
<section class="hub" style="padding-top:200px;padding-bottom:50px">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6">
				{{-- <img height="100px" width="auto" src="{{ asset('assets/images/ilustrasi/g_192.png') }}" alt=""> --}}
			</div>
			<div class="col-12 col-md-6">
				{{-- <img width="80" class="mb-3" src="{{asset('assets/images/category/woman.svg')}}"> --}}
				<h1>Mulai Belajar Sekarang</h1>
				<div style="font-size:calc(1vw + 0.7vh)">Tunggu apa lagi, mulailah daftar disini, tontonlah video-video untuk meningkatkan pengetahuan kamu, dan baca juga e-book gratis di dalamnya.</div>
				@if(Auth::guest())
				<div class="row">
					<div class="col-4">
						<a href="/register" class="btn butt mt-3 rounded-1"><b>Daftar Sekarang</b></a>
					</div>
				</div>
				@endif
			</div>
			
		</div>
	</div>
	
</section>
@endsection

@section('js-extra')

<script>

$('.sl-main-image').slick({
	dots: !0,
	arrows: !0,
	centerMode: !0,
	centerPadding: "170px",
	slidesToShow: 1,
	autoplay: !0,
	autoplaySpeed: 5e3,
	responsive: [
	    { breakpoint: 992, settings: { centerPadding: "68px" } },
	    { breakpoint: 767, settings: { centerPadding: "30px", arrows: !0, centerMode: !1 } },
	]
});

$('.sl-course').slick({
    dots: !1,
    arrows: !0,
    infinite: !1,
	slidesToShow: 2,
	slidesToScroll: 2,
	responsive: [
	    { breakpoint: 992, settings: { slidesToShow: 2, slidesToScroll: 2 } },
	    { breakpoint: 768, settings: { infinite: 0, slidesToShow: 1, slidesToScroll: 1, arrows: !1 } },
	    { breakpoint: 576, settings: { slidesToShow: 1, slidesToScroll: 1, arrows: !1 } },
	]
});
	
$('#mitra').slick({
	slidesToShow: 4,
	arrows: !1,
	slidesToScroll: 4,
	autoplay: true,
	autoplaySpeed: 2000,
	responsive: [
	    { breakpoint: 992, settings: { slidesToShow: 2, slidesToScroll: 2 } },
	    { breakpoint: 768, settings: { infinite: !0, slidesToShow: 1, slidesToScroll: 1, arrows: !1 } },
	]
});

</script>

@endsection

@section('css-extra')
<style type="text/css">
	body{background-color: var(--white)}

	.hub{
		background-size: cover;
		background-repeat: no-repeat;

		background-position:bottom;
		background-image: url({{ asset('assets/images/ilustrasi/g_19.png') }});
	}
	.butt{
		max-width: 100%;
		width:100%;
		height: 80%;
		text-align: center;
		background-color: #FDFDFD;
		opacity: 0.7;
		border-radius: 20px;
	}

	.butt:hover{
		background-color: black;
		color:white;
	}

	.btn-daf{
		background-color: #F58320;
		color:black;
	}

	.btn-daf:hover{
		background-color: black;
		color:#F58320;
	}
</style>
@endsection