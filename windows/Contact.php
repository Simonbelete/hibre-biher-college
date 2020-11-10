  <div id="contact" class="tab-pane fade">  <br><br>
    <section id="contact" class="contact-section my-5">
      <div class="card">
        <div class="row">
          <div class="col-lg-8">
            <div class="card-body form">
              <h3 class="mt-4"><i class="fas fa-envelope pr-2"></i>Write to us:</h3>
              <form name="form1" method="post" action="header-notification/insert.php">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input required="required" name="email" placeholder="someone@gmail.com"  type="email" 
							   id="form-contact-email" class="form-control">
                        <label for="form-contact-email" class="">Your email</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input required="required" placeholder="Your phone"  
							   onblur="PhoneNumberValidation(document.form1.phone)"   onkeypress="return chkNum(event)"   type="text" 
							   id="form-contact-phone" name="phone" class="form-control">
                        <label for="form-contact-phone" class="">Your phone</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <textarea required="required" placeholder="Your message"  name="msg" id="form-contact-message" 
								  class="form-control md-textarea" rows="8"></textarea>
                        <label for="form-contact-message">Your message</label>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div  class="col-md-3"></div>
                    <div  class="col-md-5">
                      <div class="md-form mb-0">
                        <input type="submit"  name="Submit"  value="Post It" class="btn btn-primary">
                     </div>
                     <div  class="col-md-4"></div>
                    </div>
                  </div>
              </form>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card-body contact text-center h-100 white-text">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contact information</h5>
                        <p class="card-text">Abma Street, DebreMarkos, Ethiopia.</p>
                        <p class="card-text">058 891 08 17</p>
                        <p class="card-text">058 178 01 76</p>
                        <p class="card-text">09 18 42 70 51</p>
                        <p class="card-text">09 11 85 92 96</p>
                        <p class="card-text">hibrebiher96@gmail.com.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">call us if you want to contact</small>
                    </div>
                </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <script type="">
        function chkNum(event)
        			{
        				if(!(event.which>=48 && event.which<=57))
        				{
        				return false;
        				}
        				else
        				{
        				return true;
        				}
        			}
                    function PhoneNumberValidation(inputtxt)
                        {
                          var phoneno = /^\(?([0][9][0-9]{1})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
                          if(inputtxt.value.match(phoneno))
                                {
                              return true;
                                }
                              else
                                {
                                    inputtxt.value="";
                                    alert("Not a valid Phone Number");
                                    return false;
                                }
                        }
    </script>
</div>


