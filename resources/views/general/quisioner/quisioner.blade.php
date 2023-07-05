@extends('general.layouts.frontlayout')

@section('title', 'Quisioner')
@section('content')
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-primary text-gradient">Welcome to Quisioner</h3>
                                <p class="mb-0">Please enter your data for the next step</p>
                                @if (Session::get('status') == 'error')
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="{{ route('general.save-session') }}">
                                    @csrf
                                    <label>Responden As</label>
                                    <div class="mb-3 form-group">
                                        <select required name="as" id="as" class="form-control"
                                            placeholder="Choose Reponden As" aria-label="As" aria-describedby="as-addon">
                                            <option value="1">Calon Mahasiswa</option>
                                            <option value="2">Mahasiswa</option>
                                            <option value="3">Alumni</option>
                                        </select>
                                        @error('as')
                                            {{ $errors->first('as') }}
                                        @enderror
                                    </div>
                                    <label>Name</label>
                                    <div class="mb-3 form-group">
                                        <input required name="Name" id="Name" type="text" class="form-control"
                                            placeholder="Name" aria-label="Name" aria-describedby="Name-addon">
                                        @error('Name')
                                            {{ $errors->first('Name') }}
                                        @enderror
                                    </div>
                                    <label>Email</label>
                                    <div class="mb-3 form-group">
                                        <input required name="email" id="email" type="email" class="form-control"
                                            placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                        @error('email')
                                            {{ $errors->first('email') }}
                                        @enderror
                                    </div>


                                    {{-- <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div> --}}
                                    <div class="text-center">
                                        <input type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0" value="NEXT">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                style="background-image:url('	https://pasundan.jabarekspres.com/wp-content/uploads/2021/04/IMG-20210406-WA0058.jpg');background-size:cover;background-repeat: no-repeat">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
