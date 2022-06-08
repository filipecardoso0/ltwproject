<?php

    function output_edit_restaurantforms($categories){ ?>

    <span id="restaurantinfoforms">

        <section class="disabled editrestaurantform" id="changerestname">
            <form>
                <span><i class="fa-solid fa-circle-xmark formclosebtn"></i></span>
                <h1>Change Restaurant Name</h1>
                <section>
                    <label>Name:</label>
                    <input type="text" name="restname" class="textinput" required>
                    <i class="fa-solid fa-user-tie"></i>
                </section>
                <a href="#0" id="editbtn">Make Changes!</a>
            </form>
        </section>

        <section class="disabled editrestaurantform" id="changerestcategory">
            <form>
                <span><i class="fa-solid fa-circle-xmark formclosebtn"></i></span>
                <h1>Change Restaurant Category</h1>
                <section>
                    <label>Category:</label>
                     <select name="restcategory">
                    <?php foreach($categories as $category){ ?>
                        <option value="<?=$category['IdCategory']?>"><?=$category['CategoryTitle']?></option>
                    <?php } ?>
                    </select>
                </section>
                <a href="#0" id="editbtn">Make Changes!</a>
            </form>
        </section>

        <section class="disabled editrestaurantform" id="changerestaddress">
            <form>
                <span><i class="fa-solid fa-circle-xmark formclosebtn"></i></span>
                <h1>Change Restaurant Address</h1>
                <section>
                    <label>Address:</label>
                    <input type="text" name="restaddress" class="textinput" required>
                    <i class="fa-solid fa-map"></i>
                </section>
                <a href="#0" id="editbtn">Make Changes!</a>
            </form>
        </section>

    </span>


    <span id="addrestaurantform">
        <section class="disabled editrestaurantform" id="addrestform">
            <form>
                <span><i class="fa-solid fa-circle-xmark formclosebtn"></i></span>
                <h1>Criar Restaurante</h1>
                <section>
                    <label>Nome:</label>
                    <input type="text" name="name"  required>
                    <i class="fa-solid fa-tag"></i>
                </section>
                <section>
                    <label>Morada:</label>
                    <input type="text" name="address" required>
                    <i class="fa-solid fa-map"></i>
                </section>
                <section>
                    <label>Imagem de Exibição :</label>
                    <input type="file" name="image" accept="image/png, image/gif, image/jpeg" required>
                </section>
                <section>
                    <label>Categoria:</label>
                    <select name="category">
                        <?php foreach($categories as $category){ ?>
                            <option value="<?=$category['IdCategory']?>"><?=$category['CategoryTitle']?></option>
                        <?php } ?>
                    </select >
                </section>
                <button formaction="actions/action_addrestaurant.php" formmethod="post" formenctype="multipart/form-data" type="submit">Make Changes!</button>
            </form>
        </section>
    </span>


<?php } ?>

