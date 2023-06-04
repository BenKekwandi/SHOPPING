<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <section id="product-section" class="product_section layout_padding">
        <div class="container">
          <div class="row">
            <?php foreach ($data as $key => $value) { ?>
              <div class="col-sm-4">
                <div class="box">
                  <div class="img-box">
                    <img class="product-image img-fluid" src="uploads/products/<?php echo $value['picture']; ?>" alt="">
                  </div>
                  <div class="detail-box">
                    <h5 class="product-name">
                      <?php echo $value['name']; ?>
                    </h5>
                    <div class="product-info">
                      <h5>
                        <span class="product-price">$<?php echo $value['price']; ?></span>
                      </h5>
                      <div class="product-description">
                        <?php echo $value['description']; ?>
                      </div>
                    </div>
                  </div>
                  <style>
                  .product-name{
                    font-family: Times New Roman;
                    font-size:20px;
                  }
                  .product-price{
                    color:red;
                    font-family:Verdana;
                    font-size:16px;
                  }
                  .product-info{
                    font-family:Arial;
                    font-size:12px;
                  }
                  </style>
                  <button class="btn btn-success add_cart_btn">
                    Add To Cart
                  </button>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </section>
    </div>

    <div class="col-sm-6">
      <div class="cart">
        <h2 class="cart-title">CART</h2>
        <div class="cart-content"></div>
      </div>

      <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price">$0</div>
      </div>

      <div class="text-center mt-4">
        <button type="button" id="buyButton" class="btn btn-primary btn-buy">Buy Now</button>
      </div>
    </div>
  </div>
</div>
<script>

let cart= document.querySelector('.cart');

if(document.ready_state == 'loading'){
  document.addEventListener('DOMContentLoaded',ready)
}
else{
  ready();
}


function ready()
{
  var removeBtns = document.getElementsByClassName('cart-remove');
  for(var i=0;i<removeBtns.length;i++)
  {
      var button = removeBtns[i];
      button.addEventListener('click',removeCartItem);
  }
  var quantityInputs = document.getElementsByClassName('cart-quantity');
  for(var i=0;i<quantityInputs.length;i++)
  {
    var input = quantityInputs[i];
    input.addEventListener('change',quantityChanged);
  }

  var addCart = document.getElementsByClassName('add_cart_btn');
  for(var i=0;i<addCart.length;i++)
  {
    var addBtn = addCart[i];
    addBtn.addEventListener('click',addCartClicked);
  }

  var buyButton= document.getElementById('buyButton');
  buyButton.addEventListener('click', postCart);

}

function addCartClicked(event)
{
  var item = event.target;
  var product = item.parentElement;
  var productName = product.getElementsByClassName('product-name')[0].innerText;
  var productPrice=product.getElementsByClassName('product-price')[0].innerText;
  var productDescription=product.getElementsByClassName('product-description')[0].innerText;
  var productImage=product.getElementsByClassName('product-image')[0].src;
  console.log(productName,productPrice,productImage);
  addProductToCart(productName,productPrice,productImage);
  updatetotal();
}

function addProductToCart(name,price,image)
{
  var cartBox= document.createElement('div');
  cartBox.classList.add("cart-box");
  var cartItems = document.getElementsByClassName('cart-content')[0];
  var cartItemsNames = cartItems.getElementsByClassName('cart-product-title');
  for(var i=0;i<cartItemsNames.length;i++)
  {
    if(cartItemsNames[i].innerText==name){
      alert("This Item has already been added to the cart");
      return;
    }
  }

  var cartBoxContent = ` 
  <div class="cart-box row">
      <div class="col-md-4">
        <img src=${image} class="cart-img img-fluid" alt="Product Image">
      </div>
      <div class="col-md-8">
        <div class="cart-product-title">
          ${name}
        </div>
        <div class="cart-price">${price}</div>
        <input type="number" value="1" class="cart-quantity form-control">
        
      </div>
      <i class="btn btn-danger fa-solid fa-trash cart-remove"></i>
  </div>`;
cartBox.innerHTML= cartBoxContent;
cartItems.append(cartBox);
cartBox.getElementsByClassName('cart-remove')[0].addEventListener('click',removeCartItem);
cartBox.getElementsByClassName('cart-quantity')[0].addEventListener('change',quantityChanged);
}



function quantityChanged(event)
{
  var input = event.target;
  if(isNaN(input.value)|| input.value <= 0){
    input.value=1;
  }
  updatetotal();
}


function removeCartItem(event){
  var btnClicked = event.target;
  btnClicked.parentElement.remove();
  updatetotal();
}

function updatetotal(){
  var cartContent = document.getElementsByClassName('cart-content')[0];
  var cartBoxes = document.getElementsByClassName('cart-box');
  var total=0;
  for(var i=0;i<cartBoxes.length;i++)
  {
      var cartBox = cartBoxes[i];
      var priceElement = cartBox.getElementsByClassName('cart-price')[0];
      var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
      var quantity= quantityElement.value;
      var price = parseFloat(priceElement.innerText.replace("$",""));
      total= total + (price*quantity);
      total = Math.round(total*100)/100;
      document.getElementsByClassName("total-price")[0].innerText="$"+total;

  }

}

function postCart()
{
   var cartContent = document.getElementsByClassName('cart-content')[0];
  var cartItems = document.getElementsByClassName('cart-box');
  var data = [];
  for(var i=0;i<cartItems.length;i++)
  {
      var cartBox = cartItems[i];
      var name = cartBox.getElementsByClassName('cart-product-title')[0].innerText;
      var priceElement = cartBox.getElementsByClassName('cart-price')[0];
      var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
      var quantity= quantityElement.value;
      var price = parseFloat(priceElement.innerText.replace("$",""));

      var item = {
      name: name,
      price: price,
      quantity: quantity
      };

    data.push(item);

  }
  const url = "/buy";
  fetch(url, {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
          "Content-Type": "application/json"
        }
      })
        .then(response => {
          if (response.ok) {
            return response.text();
          }
          throw new Error("Request failed with status code " + response.status);
        })
        .then(responseText => {
          console.log("Request succeeded!");
          console.log(responseText);
        })
        .catch(error => {
          console.error("Request failed:", error);
        });

}




</script>