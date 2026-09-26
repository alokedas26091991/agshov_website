 <!-- Header Start -->
 <div class="container-fluid header bg-custom-12 p-0">
     <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
         <div class="col-md-12 p-5">
             <h1 class="display-6 animated fadeIn mb-4 text-center">Request for Special Appointment </h1>
             <nav aria-label="breadcrumb animated fadeIn ">
                 <ol class="breadcrumb text-uppercase text-center d-flex justify-content-center">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item"><a href="/pages/bookappointment">Book Appointment</a></li>
                     <li class="breadcrumb-item text-body active" aria-current="page">Request for Special Appointment</li>
                 </ol>
             </nav>
         </div>

     </div>
 </div>
 <!-- Header End -->



 <!-- Book Appointment Start -->
 <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
     <div class="container text-center shadow p-4">
         <h2 class="mb-4 fs-5 spec-tags">Request Appointment For Dr. Yatri Thacker</h2>
         <h2 class=" fs-5">Clinic : Homeopathic Clinic</h2>
         <div class="col-lg-12">
             <form>
                 <div class="row g-3">
                     <div class="col-md-4">
                         <div class="form-floating">
                             <input type="text" class="form-control" id="name" placeholder="Your Name">
                             <label for="name">Your Name</label>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-floating">
                             <input type="email" class="form-control" id="email" placeholder="Your Email">
                             <label for="email">Your Email</label>
                         </div>
                     </div>

                     <div class="col-md-4">
                         <div class="form-floating">
                             <input type="date" class="form-control" id="Appointment_Date" placeholder="Appointment Date">
                             <label for="date">Appointment Date</label>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-floating">
                             <input type="time" class="form-control" id="Appointment_time" placeholder="Appointment Time">
                             <label for="date">Appointment Time</label>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="appoint-ment-type">
                             <label for="appointment-type">Appointment Type</label>
                             <div class="d-flex justify-content-center">
                                 <div class="radio-container">
                                     <input type="radio" id="inclinic" name="options" checked>
                                     <label for="inclinic">
                                         <i class="fas fa-clinic-medical mx-1"></i>
                                         in Clinic
                                     </label>
                                 </div>


                                 <div class="radio-container">
                                     <input type="radio" id="online" name="options">
                                     <label for="online"> <i class="fas fa-video mx-1"></i>Online</label>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="main-tag-tg2">
                             <label class="fs-5 text-start">Doctor Service</lebel>
                                 <select class="js-example-basic-single w-100" name="state">
                                     <option value="First Visit + Homeopathic Treatment (INR 3000)">First Visit + Homeopathic Treatment (INR 3000)</option>

                                     <option value="Hairfall Treatment - TeleConsultation+ Hair Serum (INR 1500)">Hairfall Treatment - TeleConsultation+ Hair Serum (INR 1500)</option>
                                     <option value="Hairfall Treatment - Detailed Cunsultation  + Homepathy Treatment (INR 3000)">Hairfall Treatment - Detailed Cunsultation + Homepathy Treatment (INR 3000)</option>
                                     <option value="Follow up - 7 Days medicines (INR 900)">Follow up - 7 Days medicines (INR 900)</option>
                                     <option value="Follow up - 15 Days medicines (INR 1500)">Follow up - 15 Days medicines (INR 1500)</option>
                                     <option value="Follow up -  1 Month medicines (INR 2700)">Follow up - 1 Month medicines (INR 2700)</option>
                                     <option value="Counselling 5 Sessions (Includes 6 weeks homeopathy) (INR 15000)">Counselling 5 Sessions (Includes 6 weeks homeopathy) (INR 15000)</option>
                                     <option value="All In One Prenatal Package 9 Months (INR 22000)">All In One Prenatal Package 9 Months (INR 22000)</option>
                                     <option value="Crash Course Prenatal (INR 13000)">Crash Course Prenatal (INR 13000)</option>
                                     <option value="Postnatal Care (INR 12000)">Postnatal Care (INR 12000)</option>
                                     <option value="Personalised (Prenatal/Post) 1 Session (INR 3600)">Personalised (Prenatal/Post) 1 Session (INR 3600)</option>
                                     <option value="Pregnancy Yoga & Diet (INR 6600)">Pregnancy Yoga & Diet (INR 6600)</option>
                                     <option value="Positive Parenting Course + 11 days Whatsup courses + 1 day zoom session (INR 3999)">Positive Parenting Course + 11 days Whatsup courses + 1 day zoom session (INR 3999)</option>
                                     <option value="Pet Consultations + 15 days Medicine (INR 3000)">Pet Consultations + 15 days Medicine (INR 3000)</option>

                                 </select>
                         </div>
                     </div>

                     <div class="col-md-6">
                         <div class="form-floating">
                             <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 80px"></textarea>
                             <label for="message">What this appointment is for ? </label>
                         </div>
                     </div>
                     <div class="row d-flex justify-content-center mt-4">
                         <div class="col-12 col-md-4">
                             <a class="btn btn-primary px-5 shadow m-t-mob" href="#">Request For Special Appoinment</a>
                         </div>
                     </div>
                 </div>
             </form>

         </div>
     </div>
 </div>
 <!-- Book Appointment End -->
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const inlineElement = document.getElementById('inline-datepicker');
         const datepicker = new Datepicker(inlineElement, {
             inline: true, // Enable inline display
             format: 'dd/mm/yyyy', // Date format
             todayHighlight: true, // Highlight today's date
             clearBtn: false, // Add a clear button

             // Disable weekends (Saturday and Sunday)
             beforeShowDay: function(date) {
                 const day = date.getDay();
                 // 0 = Sunday, 6 = Saturday
                 if (day === 0 || day === 6) {
                     return {
                         disabled: true, // Disable the date
                         classes: 'text-muted' // Add custom class for styling (optional)
                     };
                 }
             }
         });
     });
 </script>