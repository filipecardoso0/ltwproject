<?php

    function output_editdishtemplate($categories, $restaurantid){ ?>
    <span id="dishaddform">
        <section class="disabled editdishform" id="dishadd">
            <form>
                <input style="display: none;" name="IdRestaurant" value="<?=$restaurantid?>" type="text">
                <span><i class="fa-solid fa-circle-xmark formclosebtn"></i></span>
                <h1>Create Dish</h1>
                <section>
                    <label>Name:</label>
                    <input type="text" name="Name"  required>
                    <i class="fa-solid fa-tag"></i>
                </section>
                <section>
                    <label>Price:</label>
                    <input type="text" name="Price" required>
                    <i class="fa-solid fa-euro-sign"></i>
                </section>
                <section>
                    <label>Exibition Image :</label>
                    <input type="file" name="image" accept="image/png, image/gif, image/jpeg" required>
                </section>
                <section>
                    <label>Category:</label>
                    <select name="IdCategory">
                        <?php foreach($categories as $category) { ?>
                        <option value="<?=$category['IdCategory']?>"><?=$category['CategoryTitle']?></option>
                        <?php } ?>
                    </select >
                </section>
                <button formaction="actions/action_dishadd.php" formmethod="post" formenctype="multipart/form-data" type="submit">Make Changes!</button>
            </form>
        </section>
    </span>

    <?php }?>

