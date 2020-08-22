<section class="section-banner">

    <div class="container wow fadeInUp">

        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <div class="banner-content">
                   <!--- Search Form Start ---->
                     <div class="card">
                         <h2>Give Blade Save Life</h2>
                         <br>
                        <div class="card-body">
                            <form action="">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label id="label_color" for="blad_group">Your Blood Group (রক্তের গ্র্রুপ)*</label>
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
                                            <label id="label_color">Your Divition (বিভাগ)*</label>
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
                                            <label id="label_color">Your District (জেলা)*</label>
                                            <select name="district" id="blad_group" required class="district">
                                            </select>
                                        </div>
                                    </div><!-- End col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label id="label_color">Your Area Upazila (থানা)*</label>
                                            <input type="text" id="blad_group" name="upazila">
                                          </div>
                                    </div><!-- End col-md-6 -->
                                </div><!-- End row -->
                                <div class="form-row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label id="label_color">Your Local Area (ইউনিয়ন)* </label>
                                            <input type="text" id="blad_group" name="local_area">
                                        </div>
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