<div class="row">
    <div class="col-md-6">
        <div class="card-body">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" name="first_name"
                       placeholder="Enter First Name">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" name="last_name"
                       placeholder="Last Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email"
                       placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password"
                       placeholder="Password">
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation"
                       placeholder="Confirm Password">
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-body">
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" class="form-control" name="phone_number"
                       placeholder="Phone Number">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" name="location"
                       placeholder="Location" id="location_input">
            </div>
            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" class="form-control" name="address"
                       placeholder="Address" id="address_input">
            </div>
            <div class="form-group">
                <label for="imageFile">Image Upload</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" onchange="readURL(this);" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose
                            file</label>
                    </div>
                </div>
                <img width="100" height="100" id="blah" style="width: 100px; background-size: 100% 100%; object-fit: cover; margin-top: 10px; border-radius: 10%" src="http://placehold.it/100" alt="your image" />
                <div class="form-group float-sm-right" style="margin-top: 10px;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
