<?php

    function output_modal_restaurantdish(){ ?>
        <span id="dishdetailsform">
            <section class="disabled" id="dishinfo">
                <article>
                    <section id="options">
                        <a href="#0"><i class="fa-solid fa-circle-xmark formclosebtn"></i></a>
                        <a id="favbtndish" href="#0"><i class="fa-solid fa-heart"></i></a>
                    </section>
                    <img id="modaldishimage" src="https://picsum.photos/200/300" alt="Dish Image">
                    <section id="dishdetails">
                        <h2>Dish name</h2>
                        <p id="dishprice">Price: <a href="#0"></a>&#8364</p>
                    </section>
                    <section id="cartsection">
                        <a href="#0" class="quantitybtn" id="removequantity"><i class="fa-solid fa-circle-minus"></i></a>
                        <p id="quantityammount">1</p>
                        <a href="#0" class="quantitybtn" id="addquantity"><i class="fa-solid fa-circle-plus"></i></a>
                        <a href="#0" id="add2cartbtn">Add to Cart</a>
                    </section>
                </article>
            </section>
        </span>
    <?php } ?>
