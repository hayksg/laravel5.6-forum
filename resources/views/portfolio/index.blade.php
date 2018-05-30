@extends('layouts.wide')
@section('title', "| Portfolio")

@section('content')

<h4 class="mb-4"><strong>Portfolio</strong></h4>

<div class="row mb-4">
	<div class="col-lg-4 portfolio-item">
		<div class="card">
			<div class="card-body">
				<a href="http://simplesite.96.lt/" target="_blank" title="simplesite">
					<img src="{{ asset('storage/portfolio/simplesite.png') }}" alt="simplesite-site" class="img-fluid">
				</a>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card portfolio-item">
			<div class="card-body">
				<a href="http://jokeshop.96.lt/" target="_blank" title="jokeshop">
					<img src="{{ asset('storage/portfolio/jokeshop.png') }}" alt="jokeshop-site" class="img-fluid">
				</a>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card portfolio-item">
			<div class="card-body">
				<a href="http://socnetwork.96.lt/" target="_blank" title="socnetwork">
					<img src="{{ asset('storage/portfolio/socnetwork.png') }}" alt="socnetwork-site" class="img-fluid">
				</a>
			</div>
		</div>
	</div>

</div>

<div class="row mb-4">

	<div class="col-lg-4">
		<div class="card portfolio-item">
			<div class="card-body">
				<a href="http://minisite.rf.gd/" target="_blank" title="minisite">
					<img src="{{ asset('storage/portfolio/minisite.png') }}" alt="minisite" class="img-fluid">
				</a>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card portfolio-item">
			<div class="card-body">
				<a href="http://tutorial.rf.gd/" target="_blank" title="university">
					<img src="{{ asset('storage/portfolio/university.png') }}" alt="university-site" class="img-fluid">
				</a>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card portfolio-item">
			<div class="card-body">
				<a href="#" target="_blank" title="blog">
					<img src="{{ asset('storage/portfolio/blog.png') }}" alt="blog-site" class="img-fluid">
				</a>
			</div>
		</div>
	</div>

</div>

@endsection