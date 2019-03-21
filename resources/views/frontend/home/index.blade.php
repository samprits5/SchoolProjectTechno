@extends('layouts.frontendFrame')
@section('content')


<header>
			<div class="container-fluid">
				<div class="slider-container">

						<div class="owl-slider owl-carousel">

							@foreach($gal as $g)
							<div class="item">
								<div class="owl-slider-item">
									<img src="{{ $g->path }}" class="img-responsive" alt="portfolio">
									<div class="intro-text">
										<div class="intro-heading">{{ $g->name }}</div>
									</div>
								</div>
							</div>

							@endforeach
							
						</div>

				</div>

<div class="container">

<div class="row" style="padding-top: 20px; padding-bottom: 30px;">

	<div class="col-md-8" style="padding-right: 20px; font-size: 15px;">
<center>
		<div class="about-img-holder wow fadeIn" data-wow-delay=".2s" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeIn;"><img alt="" class="img-responsive" src="http://sittechno.org/userfiles/image/technoindia-nba-logo.png">
</div>

		<h1 class="about-title wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeIn; color: black;">Welcome to<br>
Techno India School</h1>

<p style="color: black;">
	Established in 1999, Techno India School is an CBSC based institution running under the vision of Techno India Group and is only one of its kinds in North Bengal.
</p>
<p style="color: black;">
	About 5 km away from Siliguri city, the Institute has a sprawling and picturesque campus surrounded by
</p>

</center>

	</div>
	
	<div class="col-md-4">
                        <h3 class="title wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeIn; color: black;">Request Information</h3>
                        <div class="form-container wow fadeIn" data-wow-duration="2s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeIn;">
                            <div class="mack-an-appointment">
                            <!-- Appilication Form Start-->
                            <form method="post" class="dzForm" id="QuickForm" name="QuickForm" accept-charset="UTF-8" action="{{ route('uiquery') }}">

                            	@csrf

                            	
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="name" id="fromname" placeholder="Full Name" class="form-control" type="text" required="required" autocomplete="name" @if(Session::has('student')) value="{{ Session::get('student') }}" readonly
                                            @elseif(Session::has('teacher')) value="{{ Session::get('teacher') }}" readonly @endif>

                                            @if(!empty($errors->first('name')))
				        <span class="help-block">
				        <div class="error" style="color: red; margin-bottom: 15px; margin-top: 15px;">{{ $errors->first('name') }}</div>
				        </span>
				    @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="email" id="frommail" placeholder="Email" class="form-control" type="text" required="required" autocomplete="email" @if(Session::has('email')) value="{{ Session::get('email') }}" readonly @endif>

                                            @if(!empty($errors->first('email')))
				        <span class="help-block">
				        <div class="error" style="color: red; margin-bottom: 15px; margin-top: 15px;">{{ $errors->first('email') }}</div>
				        </span>
				    @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="phone" id="mobile" class="form-control" type="tel" autocomplete="phone" placeholder="Contact No.">
                                            @if(!empty($errors->first('phone')))
				        <span class="help-block">
				        <div class="error" style="color: red; margin-bottom: 15px; margin-top: 15px;">{{ $errors->first('phone') }}</div>
				        </span>
				    @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">                
                                            <select class="form-control" name="type" id="subject">
                                                <option value="Feedback">Feedback</option><option value="Enquiry">Enquiry</option><option value="Suggestions">Suggestions</option><option value="Complaints">Complaints</option><option value="Broken Links">Broken Links</option><option value="Placements">Placements</option><option value="Career">Career</option><option value="Others">Others</option>                                            </select>

                                                @if(!empty($errors->first('type')))
				        <span class="help-block">
				        <div class="error" style="color: red; margin-bottom: 15px; margin-top: 15px;">{{ $errors->first('type') }}</div>
				        </span>
				    @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="msg" id="message" rows="2" class="form-control" placeholder="Message" required="required"></textarea>

                                            @if(!empty($errors->first('msg')))
				        <span class="help-block">
				        <div class="error" style="color: red; margin-bottom: 15px; margin-top: 15px;">{{ $errors->first('msg') }}</div>
				        </span>
				    @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mb-0 mt-10">
                                            <div class="dzFormMsg">
                                            	<small id="emailHelp" class="text-danger">

										    	@if(Session::has('q'))
										         <strong style="margin-bottom: 15px;">{{ Session::get('q') }}</strong>
										      @endif

										    </small>
                                            </div>
                                            <center>
                                            <button name="submit" type="submit" value="Submit" id="qSubmit" class="btn btn-primary btn-colored btn-theme-color-2 text-white"><span>Submit Request</span></button></center>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Application Form End--> 
                            </div>
                        </div>
                    </div>

</div>
</div>

			</div>
		</header>

		@if(Session::has('student'))


		<section id="result" class="section-features">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>Your Result</h2>
						</div>
					</div>
				</div>
					<table class="table table-borderless table-dark">
						<thead>
							<tr class="text-center">
								<th scope="col" class="text-center">Student ID</th>
								<th scope="col" class="text-center">Name</th>
								<th scope="col" class="text-center">Percent</th>
								<th scope="col" class="text-center">Grade</th>
							</tr>

						</thead>
						<tbody>
							@if(count($res)>0)
								<tr class="text-center">
									
		
									<td class="text-center">{{ $res[0]->student_sid }}</td>
									<td class="text-center">{{ Session::get('student') }}</td>
									<td class="text-center">{{ $res[0]->percent }}</td>
									<td class="text-center">{{ $res[0]->grade }}</td>
								</tr>

								@else
									
									<tr>
								    <td colspan="15" align="center" style="margin-top: 20px;">No records to display.</td>
								</tr>
										
								

								@endif

						</tbody>
					</table>

			</div>
		</section>
		@endif

		

		<section id="about" class="light-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>About Techno India</h2>
							<p>Techno India Group is the largest private education group in Eastern India and one of the largest in the country. There are about 1lakh plus enrolled students , 5000 Faculty &amp; Staff Members ,21 Engineering Colleges (AICTE &amp; University Approved),12 Business Schools + 18 Public Schools (Playgroup to Class XII), 1million Alumni,6HS Schools ,40 IT schools ,Hotel in Darjeeling ,100 state of art campuses and Overseas tie-up Collaborations. It is the State's first Private University - Techno India University. The group has also ventured out in areas that complement our efforts in academics namely in Health Care, Hospitality, Sports, Entertainment and Tourism. <br><strong>Our vision is to perpetuate the culture of India and its holistic values in an environment driven by technology and a focused pursuit of the intellect.</strong></p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- about module -->
					<div class="col-md-3 text-center">
						<div class="mz-module">
							<div class="mz-module-about">
								<i class="fa fa-briefcase color1 ot-circle"></i>
								<h3>COMPUTER EDUCATION</h3>
								<p>Compulsory Computer Education with Multimedia, Internet access shall be provided to the students enabling them to be at par with the educational technology of international standards.</p>
							</div>
							<a href="#" class="mz-module-button">read more</a>
						</div>
					</div>
					<!-- end about module -->
					<!-- about module -->
					<div class="col-md-3 text-center">
						<div class="mz-module">
							<div class="mz-module-about">
								<i class="fa fa-photo color2 ot-circle"></i>
								<h3>HOBBY CLUBS</h3>
								<p>Science club, Photography club, Sky watching, Nature study, Know your nation and its people (Interaction with tribals and various communities), Dramatics etc. as per school syllabus.</p>
							</div>
							<a href="#" class="mz-module-button">read more</a>
						</div>
					</div>
					<!-- end about module -->
					<!-- about module -->
					<div class="col-md-3 text-center">
						<div class="mz-module">
							<div class="mz-module-about">
								<i class="fa fa-camera-retro color3 ot-circle"></i>
								<h3>HEALTH </h3>
								<p>The School will conduct periodical check-up of students under the group health scheme and submit report to the parents where ever required.</p>
							</div>
							<a href="#" class="mz-module-button">read more</a>
						</div>
					</div>
					<!-- end about module -->
					<!-- about module -->
					<div class="col-md-3 text-center">
						<div class="mz-module">
							<div class="mz-module-about">
								<i class="fa fa-cube color4 ot-circle"></i>
								<h3>OTHER FACILITIES</h3>
								<p> Regular elocution, dance &amp; Indian music classes under the guidance of Brototi Bandopadhyay, Dona Ganguly &amp; Sraboni Sen respectively.</p>
							</div>
							<a href="#" class="mz-module-button">read more</a>
						</div>
					</div>
					<!-- end about module -->
				</div>
			</div>
			<!-- /.container -->
		</section>

		<section id="exams" class="section-features">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>Upcoming Examinations</h2>
						</div>
					</div>
				</div>
				@php $n = 1;  @endphp
					<table class="table table-borderless table-dark">
						<thead>
							<tr class="text-center">
								<th scope="col" class="text-center">Sl. No.</th>
								<th scope="col" class="text-center">Exam</th>
								<th scope="col" class="text-center">Class</th>
								<th scope="col" class="text-center">Section</th>
								<th scope="col" class="text-center">Download</th>

							</tr>

						</thead>
						<tbody>
							@foreach($exm as $e)
								<tr class="text-center">
									<td class="text-center">{{ $n }}</td>
									<td class="text-center">{{ $e->title }}</td>
									<td class="text-center">{{ $e->class }}</td>
									<td class="text-center">{{ $e->section }}</td>
									
									<td class="text-center"><a href="{{ $e->path }}" style="text-decoration: none"><i class="fa fa-download" aria-hidden="true"></i></a></td>
								</tr>
								@php $n++;  @endphp
							@endforeach
						</tbody>
					</table>

			</div>
		</section>


		<section id="team" class="light-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>Admissions</h2>
							<p>Techno India Group is the largest private education group in Eastern India and one of the largest in the country. There are about 1lakh plus enrolled students , 5000 Faculty &amp; Staff Members ,21 Engineering Colleges (AICTE &amp; University Approved),12 Business Schools + 18 Public Schools (Playgroup to Class XII), 1million Alumni,6HS Schools ,40 IT schools ,Hotel in Darjeeling ,100 state of art campuses and Overseas tie-up Collaborations. It is the State's first Private University - Techno India University. The group has also ventured out in areas that complement our efforts in academics namely in Health Care, Hospitality, Sports, Entertainment and Tourism. <br><strong>Our vision is to perpetuate the culture of India and its holistic values in an environment driven by technology and a focused pursuit of the intellect.</strong></p>
						</div>
					</div>
				</div>
				
			</div>
			<!-- /.container -->
		</section>

		<section id="notice" class="section-features">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>Notice Board!</h2>
						</div>
					</div>
				</div>
				@php $n = 1;  @endphp
					<table class="table table-borderless table-dark">
						<thead>
							<tr class="text-center">
								<th scope="col" class="text-center">Sl. No.</th>
								<th scope="col" class="text-center">Notice ID</th>
								<th scope="col" class="text-center">Title</th>
								<th scope="col" class="text-center">Description</th>
							</tr>

						</thead>
						<tbody>
							@foreach($notice as $e)
								<tr class="text-center">
									<td class="text-center">{{ $n }}</td>
									<td class="text-center">{{ $e->nid }}</td>
									<td class="text-center">{{ $e->title }}</td>
									<td class="text-center">{{ $e->notice }}</td>
									
								</tr>
								@php $n++;  @endphp
							@endforeach
						</tbody>
					</table>

			</div>
		</section>



		<section class="dark-bg short-section stats-bar">
			<div class="container text-center">
				<div class="row">
					<div class="col-md-3 mb-sm-30">
						<div class="counter-item">
							<h2 class="stat-number" data-n="76">0</h2>
							<h6>Schools</h6>
						</div>
					</div>
					<div class="col-md-3 mb-sm-30">
						<div class="counter-item">
							<h2 class="stat-number" data-n="30">0</h2>
							<h6>Years Of Experiences</h6>
						</div>
					</div>
					<div class="col-md-3 mb-sm-30">
						<div class="counter-item">
							<h2 class="stat-number" data-n="60000+">0</h2>
							<h6>Student Base</h6>
						</div>
					</div>
					<div class="col-md-3 mb-sm-30">
						<div class="counter-item">
							<h2 class="stat-number" data-n="1000000">0</h2>
							<h6>Allumni</h6>
						</div>
					</div>
				</div>
			</div>
		</section>


@endsection