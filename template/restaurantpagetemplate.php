<?php

    require_once(__DIR__ . '/../db/dishesclass.php');
    require_once(__DIR__ . '/../db/review.php');

    function output_restaurantpage_content(PDO $db, $restaurantinfo, $dishcategories, $userid, $reviews){ ?>
    <section id="restaurantheader">
        <!-- Section Responsible for some core Restaurant Page functionalities-->
        <input id="userid" style="display: none" type="text" value="<?=$userid?>">
        <input id="restaurantid" style="display:none" type="text" value="<?=$restaurantinfo->IdRestaurant?>">
        <h1>Restaurant: <?=$restaurantinfo->name?><a href="#0"><i class="fa-solid fa-heart fav"></i></a></h1>
    </section>

    <section id="dishmenu">
        <?php foreach($dishcategories as $dishcategory){
            $dishes = Dish::getCategoryDishes($db, $restaurantinfo->IdRestaurant, $dishcategory['IdCategory']);?>
            <h2 id="<?=$dishcategory['IdCategory']?>"><a><?=$dishcategory['CategoryTitle']?></a></h2>
            <section>
                <?php if(count($dishes) != 0){?>
                    <?php foreach($dishes as $dish){ ?>
                            <article>
                                <input style="display: none" type="text" value="<?=$dish->IdDish?>">
                                <a href="#0" class="dishimage">
                                    <img src="../images/thumbs_medium/dish_<?=$dish->IdDish?>.jpg" alt="dish image">
                                </a>
                                <p>Name: <?=$dish->name?></p>
                                <p>Price: <?=$dish->price?></p>
                            </article>
                    <?php } ?>
                <?php } ?>
                <?php if(count($dishes) == 0){ ?>
                    <article id="categoryempty">
                        <p>This Restaurant hasn't include any <?=$dishcategory['CategoryTitle']?> on its menu yet!  <i class="fa-solid fa-circle-notch fa-spin"></i></p>
                    </article>
                <?php } ?>
                </section>
        <?php } ?>
        <section id="comments">
        <h1><?=count($reviews)?> Comments</h1>
        <?php foreach ($reviews as $review) { ?>
    <article class="comment">
      <p><?=Review::getReviewPublisherName($db, $review['IdReview'])?>:</p>
      <p>Rating: <?=$review['Rating']?>/5</p> <br><br>
      <p><?=$review['Content']?></p>
    </article>
    <?php }?>
    
    </article>
    <form action="restaurantpagetemplate.php" method="post">
      <h2>Add a review</h2>
      <label>Rating 
      <input type="range" list="tickmarks" min="0" max="5" name="rating">
    <datalist id="tickmarks">
    <option value="0"></option>
    <option value="1"></option>
    <option value="2"></option>
    <option value="3"></option>
    <option value="4"></option>
    <option value="5" ></option>
    </datalist>
      </label>
      <label>Comment
        <textarea name="comment"></textarea>            
      </label>
      <button formaction="#" formmethod="post" name="post">Send</button>
    </form>
  </section> 
    </section>
    <?php 
    if(isset($_POST['post'])){
        /*if (Review::checkHasOrdered($db, (int)$restaurantinfo->IdRestaurant, (int)$userid)){ -> Didn't implement orders so this won't work */
            Review::removeReview($db, (int)$restaurantinfo->IdRestaurant, (int)$userid);
            Review::createReview($db,(string) $_POST['comment'], (int) $_POST['rating'],(int) $restaurantinfo->IdRestaurant, (int) $userid);
        //}
    }?>

        <aside id="categorias">
            <section id="categorias">
                <?php foreach($dishcategories as $dishcategory){?>
                    <p><a href="#<?=$dishcategory['IdCategory']?>"><?=$dishcategory['CategoryTitle']?></a></p>
                <?php } ?>
            </section>
        </aside>

    <?php } ?>