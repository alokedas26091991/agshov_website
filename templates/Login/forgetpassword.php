       <!-- Login Start -->
       <div class="container-xxl py-5">
           <div class="container ">
               <div class="row g-5 align-items-center">
                   <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                       <div class="doc-login-img">
                           <img src="/img/doctorlogin.jpg" alt="">
                       </div>
                   </div>
                   <div class="col-lg-6 wow fadeIn shadow p-4 " data-wow-delay="0.5s">
                       <div class="doctor-login">
                           <h2 class="spec-tags fs-3">
                               <img src="/img/blogs/default_author.jpg" alt=""> Forget Password
                           </h2>
                       </div>

                       <div class="doc-login-main">
                           <div class="row">
                               <?= $this->Form->create(null, ['id' => 'login-form']) ?>
                               <div class="col-lg-12 col-12">
                                   <div class="form-floating mb-3">


                                       <?= $this->Form->control('email', ['class' => 'form-control', 'type' => 'email', 'placeholder' => 'name@example.com']) ?>

                                   </div>

                               </div>

                               <div class="password-box">
                                   <div id="captcha" class="password-display"></div>
                                   <button id="refresh-captcha" style="all: unset; color: blue;">Click to Gnerate Captcha</button>
                               </div>

                               <div class="col-lg-12 col-12 mt-3">
                                   <div class="form-floating">
                                       <input type="text" class="form-control" id="captcha-input" placeholder="Enter CAPTCHA" required>
                                       <label for="floatingPassword">Enter Captcha</label>
                                   </div>

                               </div>


                               <div class="text-center">
                                   <button type="submit" id="submit-btn" class="btn btn-danger shadow-lg mt-2 w-100">SUBMIT</button>
                               </div>

                               </form>
                           </div>
                       </div>

                   </div>
               </div>
           </div>
       </div>
       <script>
           // Function to generate random CAPTCHA
           function generateCaptcha() {
               let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
               let captcha = '';
               for (let i = 0; i < 6; i++) {
                   captcha += characters.charAt(Math.floor(Math.random() * characters.length));
               }
               document.getElementById('captcha').innerText = captcha;
           }

           // Function to validate CAPTCHA input
           function validateCaptcha() {
               let enteredCaptcha = document.getElementById('captcha-input').value;
               let generatedCaptcha = document.getElementById('captcha').innerText;
               return enteredCaptcha === generatedCaptcha;
           }

           // Generate CAPTCHA on page load
           window.onload = function() {
               generateCaptcha();
           };

           // Refresh CAPTCHA
           document.getElementById('refresh-captcha').onclick = function() {
               generateCaptcha();
           };

           // Form submit event listener
           document.getElementById('login-form').onsubmit = function(e) {
               if (!validateCaptcha()) {
                   alert('Invalid CAPTCHA. Please try again.');
                   e.preventDefault();
               }
           };
       </script>