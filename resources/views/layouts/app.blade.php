<!DOCTYPE html>
{{-- <html lang="{{ page.lang | default: site.lang | default: "en" }}">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="en">
<head>
  @include('layouts._head')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts._navbar')
        @include('layouts._sidebar')
        <div class="content-wrapper">
            <div class="py-6 mx-auto sm:px-6">
                <div class="p-3 sm:rounded overflow-hidden bg-white border-b border-gray-200">
                    <!-- ....................Page Heading...................... -->
                    <section class="content-header">
                      <div class="container-fluid">
                        <div class="row mb-2">
                        {{ $header }}
                        </div>
                      </div>
                    </section>
                    <!-- ................Page Content .........................-->
                    <section class="content-main">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-12">
                              {{ $slot }}
                          </div>
                        </div>
                      </div>
                    </section>
                </div>
            </div>
        </div>
        @include('layouts._footer')
    </div>
    @include('layouts._scripts')
</body>
</html>
