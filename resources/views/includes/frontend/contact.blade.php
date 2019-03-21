<section id="contact" class="dark-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>Contact Us</h2>
							<p>Do you have any idea in mind? Contact us, we will give you the answer you expect.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="section-text">
							<h4>Our Location</h4>
							<p>Techno India Campus EM-4/1, Sector-V Kolkata- 700 091</p>
							<p><i class="fa fa-phone"></i> +91-9836127900</p>
							<p><i class="fa fa-envelope"></i>technogroupschools@gmail.com</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="section-text">
							<h4>Contact Hours</h4>
							<p><i class="fa fa-clock-o"></i> <span class="day">Weekdays:</span><span>9am to 8pm</span></p>
							<p><i class="fa fa-clock-o"></i> <span class="day">Saturday:</span><span>9am to 2pm</span></p>
							<p><i class="fa fa-clock-o"></i> <span class="day">Sunday:</span><span>Closed</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<form method="POST" name="sentMessage" id="contactForm" novalidate="" action="{{ route('uicontact') }}">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Your Name *" name="name" id="name" required data-validation-required-message="Please enter your name." @if(Session::has('student')) value="{{ Session::get('student') }}" readonly
                                            @elseif(Session::has('teacher')) value="{{ Session::get('teacher') }}" readonly @endif>

                                            @if(!empty($errors->first('name')))
				        <span class="help-block">
				        <div class="error" style="color: red; margin-bottom: 15px;margin-top: 15px;">{{ $errors->first('name') }}</div>
				        </span>
				    @endif
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="email" class="form-control" placeholder="Your Email *" name="email" id="email" required="" data-validation-required-message="Please enter your email address." @if(Session::has('email')) value="{{ Session::get('email') }}" readonly @endif>

										@if(!empty($errors->first('email')))
				        <span class="help-block">
				        <div class="error" style="color: red; margin-bottom: 15px; margin-top: 15px;">{{ $errors->first('email') }}</div>
				        </span>
				    @endif
										<p class="help-block text-danger"></p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" placeholder="Your Message *" id="message" name="msg" required="" data-validation-required-message="Please enter a message."></textarea>

										@if(!empty($errors->first('msg')))
				        <span class="help-block">
				        <div class="error" style="color: red; margin-bottom: 15px; margin-top: 15px;">{{ $errors->first('msg') }}</div>
				        </span>
				    @endif
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="clearfix">
									<small id="emailHelp" class="text-danger">

										    	@if(Session::has('con'))
										         <strong style="margin-bottom: 15px;">{{ Session::get('con') }}</strong>
										      @endif

										    </small>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 text-center">
									<div id="success"></div>
									<button type="submit" class="btn">Send Message</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>