@extends('general.layouts.frontlayout')

@section('title', 'Quisioner')
@section('content')

    <section>

        <div class="page-header min-vh-60">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column mx-auto">
                        <div class="card  mt-1">
                            <div class="card-header pb-0 text-left bg-primary">
                                @if (Session::get('status') == 'error')
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                <h3 class="font-weight-bolder text-light ">Kriteria Promosi </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container position-sticky z-index-sticky top-0 ">
            <div class="row">
                <div class="col-12">
                    <!-- Navbar -->
                    <nav
                        class="navbar navbar-expand-lg blur blur-rounded navbar-primary bg-primary  top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                        <div class="container-fluid pe-0 min-vh-15">
                            <h6>Kriteria manakah
                                yang menurut anda lebih penting dalam menentukan media promosi?</h6>
                        </div>
                    </nav>

                    <!-- End Navbar -->
                </div>
            </div>
        </div>

        <div class="min-vh-25"></div>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column mx-auto">

                        <form action="{{ route('general.saveSessionQM') }}" method="POST">
                            <input type="hidden" name="id_list" value="{{$quisioner->id}}">
                            @csrf
                            @foreach ($quisioner->listPertanyaan as $item)
                                <div class="card m-2">
                                    <div class="card-body">
                                        <div class="table-responsive p-0">
                                            <table class="table align-items-center mb-0">
                                                <thead class="text-center bg-white">
                                                    <h6 class=" mb-0">Perbandingan Antara:</h6> {{-- <h6>Berdasarkan Pertanyaan diatas, Lebih penting mana</h6> --}}
                                                    <div class="row form-group col-12 col-lg-10 mb-0">
                                                        <th style="max-width: 100px;">{{ $item->judul_pertanyaan }}</th>
                                                        <th>Nilai</th>
                                                        <th style="padding: 0.75rem 1.5rem 0.75rem 0rem">0</th>
                                                        <th style="padding: 0.75rem 1.5rem 0.75rem 0rem">1</th>
                                                        <th style="padding: 0.75rem 1.5rem 0.75rem 0rem">2</th>
                                                        <th style="padding: 0.75rem 1.5rem 0.75rem 0rem">3</th>
                                                        <th style="padding: 0.75rem 1.5rem 0.75rem 0rem">4</th>
                                                        <th style="padding: 0.75rem 1.5rem 0.75rem 0rem">5</th>
                                                        <th style="padding: 0.75rem 1.5rem 0.75rem 0rem">6</th>
                                                        <th style="padding: 0.75rem 1.5rem 0.75rem 0rem">7</th>
                                                        <th style="padding: 0.75rem 1.5rem 0.75rem 0rem">8</th>
                                                        <th style="padding: 0.75rem 1.5rem 0.75rem 0rem">9</th>
                                                    </div>
                                                </thead>
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td>
                                                            <label for="p-1"
                                                                class="form-label col-12 col-lg-2">Jangkauan</label>
                                                        </td>
                                                        <td>
                                                            <output id="s-1" class="col-1 col-lg-1">0</output>
                                                        </td>
                                                        <td colspan="10">
                                                            <input type="range" value="0" class="form-range w-100"
                                                                min="0" max="9" id="p-1" data-p="1"
                                                                data-k="2" oninput="updateSliderValue(this)"
                                                                onchange="resetNextSliders(this)" name="inputAtas_{{$loop->iteration}}" multiple>


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="p-2"
                                                                class="form-label col-12 col-lg-2">Menarik</label>
                                                        </td>
                                                        <td>
                                                            <output id="s-2" class="col-1 col-lg-1">0</output>
                                                        </td>
                                                        <td colspan="10">
                                                            <input type="range" value="0" class="form-range w-100"
                                                                min="0" max="9" id="p-2" data-p="2"
                                                                data-k="1" oninput="updateSliderValue(this)"
                                                                onchange="resetNextSliders(this)" name="inputBawah_{{$loop->iteration}}" multiple>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-xl-12 col-lg-12 col-md-12 d-flex justify-content-end ">
                                <div class="col-lg-1 col-3">
                                    <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0"> NEXT </button>

                                </div>
                            </div>
                        </form>




                    </div>

                </div>
            </div>
        </div>
    </section>


    @endsection @section('script_footer')

    <script type="text/javascript">
        function updateSliderValue(dataa) {
            var value = $(dataa).val();
            var output = $(dataa).parent().prev().find('.col-lg-1');
            output.text(value);
        }

        function resetNextSliders(dataa) {
            var p = parseInt($(dataa).attr('data-p'));
            var nextSlider = $(dataa).parent().parent().next().find('.form-range');
            var nextOutput = nextSlider.parent().prev().find('.col-lg-1');

            nextSlider.val(0);
            nextOutput.text(0);

            if (p > 1) {
                p = p - 1;
                var prevSlider = $(dataa).parent().parent().prev().find('.form-range');
                var prevOutput = prevSlider.parent().prev().find('.col-lg-1');

                prevSlider.val(0);
                prevOutput.text(0);
            }

            if ($(dataa).val() == 0) {
                nextSlider.attr('disabled', 'disabled');
                nextOutput.text("");
            } else {
                nextSlider.removeAttr('disabled');
            }

        }

        function submitForm() {
            var inputs = document.querySelectorAll('.form-range');
            var validInputs = [];
            inputs.forEach(function(input) {
                var value = parseInt(input.value);
                if (value > 0) {
                    validInputs.push(value.toString());
                }
            });
            console.log(validInputs);
            // Lakukan pengiriman data ke server
        }




        // const radioButtons = document.querySelectorAll('input[name="p1"]');

        // radioButtons.forEach(function(radioButton) {
        //     radioButton.addEventListener('change', function() {
        //         const selectedValue = this.value;

        //         if (selectedValue === '1') {

        //             document.getElementById('p1_2_1').checked = true;
        //         }
        //     });
        // });

        // const radioButtons2 = document.querySelectorAll('input[name="p2"]');

        // radioButtons2.forEach(function(radioButton) {
        //     radioButton.addEventListener('change', function() {
        //         const selectedValue = this.value;

        //         if (selectedValue === '2') {

        //             document.getElementById('p1_1').checked = true;
        //         } else {

        //         }
        //     });
        // });
    </script>
@endsection
