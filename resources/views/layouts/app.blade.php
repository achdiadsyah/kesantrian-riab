<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	@include('layouts.components.head')

	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">

			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				
				@include('layouts.components.header')

				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                    
                    @include('layouts.components.sidebar')

					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<div class="d-flex flex-column flex-column-fluid">
							
							<div id="kt_app_content" class="app-content flex-column-fluid mt-3">
								<div id="kt_app_content_container" class="app-container container-fluid">
									
									@yield('content')
									
								</div>
							</div>
						</div>
						
						@include('layouts.components.footer')

					</div>
				</div>
			</div>
		</div>
		
		@include('layouts.components.scroll-top')

		@include('layouts.components.script')

	</body>
</html>