<?php  function output_modal_register_login_forms() { ?>

    <!-- LOGIN  FORM -->

    <span id="forms">
        <section class="disabled loginregister">
            <form>
                <span><i class="fa-solid fa-circle-xmark formclosebtn"></i></span>
                <h1>Login</h1>
                <section id="username">
                    <label for="username">Username:</label>
                        <input type="text" name="username" class="textinput" required>
                        <i class="fa-solid fa-user-tie"></i>
                </section>
                <section id="password"> 
                <label for="password">Password:</label>
                    <input type="password" name="password" required>
                    <i class="fa-solid fa-lock"></i>
                </section>
                <button formaction="actions/action_login.php" formmethod="post" type="submit">Login</button>
            </form>
        </section>


        <!-- REGISTER FORM -->
        <section class="disabled loginregister">
            <form>
                <span><i class="fa-solid fa-circle-xmark formclosebtn"></i></span>
                <h1>Register</h1>
                <section id="username">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="textinput" required>
                    <i class="fa-solid fa-user-tie"></i>
                </section>
                <section id="name">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="textinput" required>
                    <i class="fa-regular fa-id-card"></i>
                </section>
                <section id="address">
                    <label for="address">Address:</label>
                    <input type="text" name="address" class="textinput" required>
                    <i class="fa-solid fa-map"></i>
                </section>
                <section id="phonenumber">
                    <label for="phonenumber">Phone Number:</label>
                    <input type="text" name="phonenumber" class="textinput" required>
                    <i class="fa-solid fa-phone"></i>
                </section>
                <section id="password"> 
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="textinput" required>
                    <i class="fa-solid fa-lock"></i>
                </section>
                <section id="confirmpassword">
                    <label for="confirmpassword">Confirm Password:</label>
                    <input type="password" name="confirmpassword" class="textinput" required>
                    <i class="fa-solid fa-lock"></i>
                </section>
                <section id="acctype">
                    <label for="registertype">Account Type: </label>
                    <select name="registertype">
                        <option value="customer">Customer</option>
                        <option value="owner" selected>Restaurant Owner</option>
                    </select >
                </section>
                <button formaction="actions/action_register.php" formmethod="post" type="submit">Register</button>
            </form>
        </section>

    </span>

<?php } ?>