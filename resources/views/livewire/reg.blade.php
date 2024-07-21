<div>
    <form wire:submit.prevent='register' class="contact-form"> 
        <div class="row gy-3">
            <div class="col-lg-6">
                <label for="name" class="form-label">Full name <span class='text-danger'>*</span></label>
                <input type="text" class="form-control" name="name" placeholder="Enter full name">
            </div>
            <div class="col-lg-6">
                <label for="email" class="form-label">Email address <span class='text-danger'>*</span></label>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="col-lg-6">
                <label for="email" class="form-label">Phone no <span class='text-danger'>*</span></label>
                <input type="tel" class="form-control" name="phone" placeholder="Enter phone no">
            </div>
            <div class="col-lg-6">
                <label for="subject" class="form-label">Campus <span class='text-danger'>*</span></label>
                <select class="form-control" name="department">
                    <option>Select your campus</option>
                    <option>Federal Polytechnic Ede, Osun State</option>
                    <option>Adeyemi College of Education, Ondo State</option>
                    <option>The Polytechnic Ibadan, Oyo State</option>
                </select>
            </div>
            <div class="col-lg-6">
                <label for="subject" class="form-label">Department <span class='text-danger'>*</span></label>
                <input type="text" class="form-control" name="department" placeholder="Enter current department">
            </div>
            <div class="col-lg-6">
                <label for="subject" class="form-label">Level <span class='text-danger'>*</span></label>
                <input type="text" class="form-control" name="level" placeholder="Enter current level">
            </div>
            <div class="col-lg-6">
                <label for="subject" class="form-label">Hostel Address <span class='text-danger'>*</span></label>
                <input type="text" class="form-control" name="hostel_address"
                    placeholder="Enter Hostel/Villa address">
            </div>
        </div>
        <div class="mb-3">

        </div>
        <div class="text-area col-12 mb-3">
            <label for="message" class="form-label">Tell about yourself (optional)</label>
            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Introduce yourself and your interest in Oratorio Music Foundation"></textarea>
        </div>
        <button class=" custom-btn2" type="submit">Send</button>
    </form>
</div>
