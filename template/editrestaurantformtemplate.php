<?php

    function output_add_restaurantform($categories){ ?>

    <span id="addrestaurantform">
        <section class="disabled editrestaurantform">
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
                <button formaction="actions/action_addrestaurant.php" formmethod="post" formenctype="multipart/form-data" type="submit" id="editbtn">Make Changes!</button>
            </form>
        </section>
    </span>


<?php } ?>

