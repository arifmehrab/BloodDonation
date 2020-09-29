<section class="section-banner">

    <div class="container wow fadeInUp">

        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <div class="banner-content">
                   <!--- Search Form Start ---->
                     <div class="card">
                         <h2>
                             @if(Session::get('language') == 'english')
                             {{ $homeSettingOne->banner_title_en }}
                             @else
                             {{ $homeSettingOne->banner_title_bn }}
                             @endif
                         </h2>
                         <br>
                        <div class="card-body">
                            <form action="{{ route('search.resuit') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label id="label_color" for="blad_group">
                                                @if(Session::get('language') == 'english')
                                                Your Blood Group *
                                                @else
                                                আপনার রক্তের গ্র্রুপ *
                                                @endif
                                            </label>
                                            <select id="blad_group" name="blood_group" required>
                                                <option value="">-- Select Blood Group --</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                              </select>
                                          </div>
                                    </div><!-- End col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label id="label_color">
                                                @if(Session::get('language') == 'english')
                                                Your Divition Name *
                                                @else
                                                আপনার বিভাগের  নাম *
                                                @endif
                                            </label>
                                            <select name="divition" id="blad_group" class="divition" required>
                                                <option value="">-- Select Your Divition --</option>
                                                @foreach($divitions as $row)
                                                <option value="{{ $row->id }}">{{ $row->divition_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- End col-md-6 -->
                                </div><!-- End row -->
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label id="label_color">
                                                @if(Session::get('language') == 'english')
                                                Your District Name *
                                                @else
                                                আপনার জেলার নাম *
                                                @endif
                                            </label>
                                            <select name="district" id="blad_group" required class="district" required>
                                            </select>
                                        </div>
                                    </div><!-- End col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label id="label_color">
                                                @if(Session::get('language') == 'english')
                                                Your Upazila Name *
                                                @else
                                                আপনার থানার নাম *
                                                @endif
                                            </label>
                                            <select name="upazila" id="blad_group" required class="upazila">
                                            </select>
                                          </div>
                                    </div><!-- End col-md-6 -->
                                </div><!-- End row -->
                                <div class="form-row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label id="label_color">
                                                @if(Session::get('language') == 'english')
                                                Your Local Area Like Union Name *
                                                @else
                                                আপনার এরিয়া অথবা ইউনিয়ন এর নাম দিন *
                                                @endif
                                             </label>
                                            <input type="search" id="blad_group" class="local_area" name="local_area" required>
                                        </div>
                                        <!--- show ajax search resuit -->
                                        <div style="background: #fff; display: none; max-height: 400px; overflow-y: scroll; margin-top: 5px; padding: 1rem 0;" id="show_area">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <td>Suggest Area</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="area_value">
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--- show ajax search resuit -->
                                    </div><!-- End col-md-6 -->
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary btn-block btn-lg" value="SEARCH" id="search">
                                    </div>
                                </div><!-- End row -->

                            </form>
                        </div>
                     </div>
                   <!---- Search Form End ---->
                </div>
            </div> <!-- end .col-md-12  -->
        </div>

    </div>

</section>