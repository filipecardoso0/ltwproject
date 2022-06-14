async function likerestaurant (){

    const likebtn = document.querySelector(".fav")
    const userid = document.getElementById("userid").value
    const restaurantid = document.getElementById("restaurantid").value

    //Asserts if the user likes the restaurant the first time he enters the page
    let found = await userLikesCurrentRestaurant(restaurantid)

    if(found){
        likebtn.style.color = "red"
    }

    likebtn.addEventListener("click", async () => {

        //Asserts if the user likes the restaurant every time he clicks the like button
        let found = await userLikesCurrentRestaurant(restaurantid)

        //User already liked the restaurant, so he wants to unlike it
        if (found) {
            removeRestaurantFromFavourites(userid, restaurantid, likebtn)
        }
        //User wants to add the restaurant to its favourites
        else {
            addRestaurantToFavourites(userid, restaurantid, likebtn)
        }
    })
}

function removeRestaurantFromFavourites(userid, restaurantid, likebtn){
    //Performs AJAX Request
    const xhr = new XMLHttpRequest();
    xhr.open("post", "../actions/action_removefavouriterestaurant.php")
    //This is necessary in POST method (encode type)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    //Sends the post data
    xhr.send(encodeForAjax({userid: userid, restaurantid: restaurantid}))
    //Updates like btn color
    likebtn.style.color = "black"
}

function addRestaurantToFavourites(userid, restaurantid, likebtn){
    //Performs AJAX Request
    const xhr = new XMLHttpRequest();
    xhr.open("post", "../actions/action_addfavouriterestaurant.php")
    //This is necessary in POST method (encode type)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    //Sends the post data
    xhr.send(encodeForAjax({userid: userid, restaurantid: restaurantid}))
    //Updates like btn color
    likebtn.style.color = "red"
}

async function userLikesCurrentRestaurant(restaurantid){

    const likedrestaurants = await fetchUserLikedRestaurants()

    for (let i = 0; i < likedrestaurants.length; i++) {
        let obj = likedrestaurants[i];

        if (obj.idRestaurant == restaurantid) {
            return true
        }
    }

    return false
}

async function fetchUserLikedRestaurants(){
    const userid = document.getElementById("userid").value
    const response = await fetch('../api/api_userlikedrestaurants.php?id=' + userid)
    const likedrestaurants = await response.json()

    return likedrestaurants
}

likerestaurant()