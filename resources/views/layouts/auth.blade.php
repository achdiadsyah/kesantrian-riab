<!DOCTYPE html>
<html lang="en">

	@include('layouts.components.head')

	<body id="kt_body" class="app-blank app-blank">

		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">

				<a href="{{route('home')}}" class="d-block d-lg-none mx-auto py-20">
					<img alt="Logo" src="assets/media/logos/riab-logo.svg" class="theme-light-show h-30px" />
					<img alt="Logo" src="assets/media/logos/riab-dark.svg" class="theme-dark-show h-30px" />
				</a>

				<div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">

					<div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">

						<div class="py-20">
							@yield('content')
						</div>
					</div>

				</div>

				<div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat" style="background-image: url({{asset('assets/media/auth/my-bg.png')}})"></div>
			</div>
		</div>

		@include('layouts.components.script')
	</body>
    
</html>