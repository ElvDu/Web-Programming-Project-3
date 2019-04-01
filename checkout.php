<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: -apple-system, BlinkMacSystemFont;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}


.userInfo {
  top: 0;
  left: 0;
  position: relative;
}

.row {
  align-items: center;
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
  padding: 8px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%;
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #B5D3E7;
  padding: 5px 30px 15px 30px;
  border: 1px solid black;
  border-radius: 5px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  text-align: center;
  float:center;
  margin-bottom: 20px;
  font-size: 40px;
}

.btn {
  background-color: #0000ff;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  padding: 0 40px;
  float: right;
  color: grey;
}


/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column;
  }
  .col-25 {
    margin-bottom: 50px;
  }
}
</style>
</head>
<body>
<div class="userInfo">
  <p>HELLLLLOOOO THIS IS WHERE EMAIL SHOULD GOOO</p>
</div>

<h2 style="text-align: center;">Fish Market Checkout Form</h2>


<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/checkout.php">
      
        <div class="row">

          

          <div class="col-50">
            <div class="container">
              <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
              <p><a href="#">Product 1</a> <span class="price">$15</span></p>
              <p><a href="#">Product 2</a> <span class="price">$5</span></p>
              <p><a href="#">Product 3</a> <span class="price">$8</span></p>
              <p><a href="#">Product 4</a> <span class="price">$2</span></p>
              <hr>
              <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
            </div>
          </div>

          <div class="col-25">
            <p>This could have the pictures of the items as a preview...</p>
          </div>
          
      </div>

      </form>
    </div>
  </div>

  <input type="submit" onclick="window.location.href = 'checkout.php';" value="Continue to checkout" class="btn">

</div>

</body>
</html>
