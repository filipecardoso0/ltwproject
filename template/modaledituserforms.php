<?php

    function output_edit_user_form(User $user){ ?>

    <span id="forms">

        <!-- HIDDEN INPUT IN ORDER TO OBTAIN USER ID EASILY -->
        <input type="text" id="userid" value="<?=$user->id?>">

        <!-- Change Username Form -->
        <section class="disabled editinfoform" id="usernameform">
            <form>
                <span><i class="fa-solid fa-circle-xmark formclosebtn"></i></span>
                <h1>Change Username</h1>
                <section>
                    <label>Username:</label>
                    <input type="text" name="username" class="textinput" value="<?=$user->name?>" required>
                    <i class="fa-solid fa-user-tie"></i>
                </section>
                <a href="#0" id="editbtn">Make Changes!</a>
            </form>
        </section>

        <!-- Change Password Form -->
        <section class="disabled editinfoform" id="passwordform">
            <form>
                <span><i class="fa-solid fa-circle-xmark formclosebtn"></i></span>
                <h1>Change Password</h1>
                <section>
                    <label>Password:</label>
                    <input type="password" name="password" class="textinput" required>
                    <i class="fa-solid fa-lock"></i>
                </section>
                <section>
                    <label>Confirm Password:</label>
                    <input type="password" name="confirmpassword" id="confirmpwd" class="textinput" required>
                    <i class="fa-solid fa-lock"></i>
                </section>
                <a href="#0" id="editbtn">Make Changes!</a>
            </form>
        </section>

        <!-- Address Form -->
        <section class="disabled editinfoform" id="addressform">
            <form>
                <span><i class="fa-solid fa-circle-xmark formclosebtn"></i></span>
                <h1>Change Address</h1>
                <section>
                    <label>Address:</label>
                    <input type="text" name="address" class="textinput" value="<?=$user->address?>" required>
                    <i class="fa-solid fa-map"></i>
                </section>
                <a href="#0" id="editbtn">Make Changes!</a>
            </form>
        </section>

        <!-- Change Phone Number Form -->
        <section class="disabled editinfoform" id="phonenumberform">
            <form>
                <span><i class="fa-solid fa-circle-xmark formclosebtn"></i></span>
                <h1>Change Phone Number</h1>
                <section>
                    <label>Phone Number:</label>
                    <input type="text" name="phonenumber" class="textinput" value="<?=$user->phonenumber?>" required>
                    <i class="fa-solid fa-phone"></i>
                </section>
                <a href="#0" id="editbtn">Make Changes!</a>
            </form>
        </section>

        <!-- Confirm Changes Form -->
        <section class="disabled editinfoform">
            <form>
                <span><i class="fa-solid fa-circle-xmark"></i></span>
                <h1>Are You Sure ?</h1>
                <a href="#0" id="confirmbtn">Yes</a>
                <a href="#0" id="cancelbtn">No</a>
            </form>
        </section>

    </span>

<?php } ?>


