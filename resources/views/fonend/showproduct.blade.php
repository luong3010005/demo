
<div class="" style="margin-bottom: 120px;">
    @include('fonend.header')
</div>
<div class="container"> 
 <div class="card"> 
  <div class="container-fliud"> 
   <div class="wrapper row"> 
    <div class="preview col-md-6"> 
     <div class="preview-pic tab-content"> 
      <div class="tab-pane active" id="pic-1">
      <img src="{{ asset('storage/' . $product->image_url) }}" class="card-img-top" alt="{{ $product->name }}">

      </div> 
     </div> 
   
    </div> 
    <div class="details col-md-6"> 
     <h3 class="product-title">{{ $product->name }}</h3> 
     <div class="rating"> 
      <div class="stars"></span> 
      </div> <span class="review-no">{{ $product->short_description }}</span> 
     </div> 
     <h4 class="price text-decoration-line-through">{{ $product->price }}</h4>
<h4 class="price">{{ $product->sale_price }}</h4>


     <p class="vote"><strong>91%</strong> of người mua hài lòng với sản phẩm này <strong>(87 bình chọn)</strong>
     </p> 
    <form action="{{ route('cart.store') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="add-to-cart btn btn-default">Add to Cart</button>
                        </form>

     </div> 

    </div> 
    <br>
    <p class="product-description">{{ $product->short_description }}</p> 

   </div> 
  </div> 
 </div>
</div> 
<br>
@include('fonend.footer')
<style>

 
img {   
max-width: 100%;
}
 
.preview {  
display: -webkit-box;   
display: -webkit-flex;  
display: -ms-flexbox;   
display: flex;  
-webkit-box-orient: vertical;   
-webkit-box-direction: normal;  
-webkit-flex-direction: column; 
-ms-flex-direction: column; 
flex-direction: column;
} 
 
@media screen and (max-width: 996px) { 
.preview { 
margin-bottom: 20px;
}
}
 
.preview-pic {  
-webkit-box-flex: 1;    
-webkit-flex-grow: 1;   
-ms-flex-positive: 1;   
flex-grow: 1;
}
 
.preview-thumbnail.nav-tabs {   
border: none;   
margin-top: 15px;
}
 
.preview-thumbnail.nav-tabs li {    
width: 18%; 
margin-right: 2.5%;
}
 
.preview-thumbnail.nav-tabs li img {    
max-width: 100%;    
display: block;
}
 
.preview-thumbnail.nav-tabs li a {  
padding: 0; 
margin: 0;  
cursor:pointer;
}
 
.preview-thumbnail.nav-tabs li:last-of-type {   
margin-right: 0;
}
 
.tab-content {  
overflow: hidden;
}
 
.tab-content img {  
width: 100%;    
-webkit-animation-name: opacity;    
animation-name: opacity; 
-webkit-animation-duration: .3s; 
animation-duration: .3s;
}
 
.card { 
margin-top: 0px;    
background: #eee;   
padding: 3em;   
line-height: 1.5em;
} 
 
@media screen and (min-width: 997px) { 
.wrapper { 
display: -webkit-box; 
display: -webkit-flex; 
display: -ms-flexbox; 
display: flex;
}
}
 
.details {  
display: -webkit-box;
    display: -webkit-flex;  
display: -ms-flexbox;   
display: flex;  
-webkit-box-orient: vertical;   
-webkit-box-direction: normal;  
-webkit-flex-direction: column; 
-ms-flex-direction: column; 
flex-direction: column;
}
 
.colors {   
-webkit-box-flex: 1;    
-webkit-flex-grow: 1;   
-ms-flex-positive: 1;   
flex-grow: 1;
}
 
.product-title, .price, .sizes, .colors {   
text-transform: UPPERCASE;  
font-weight: bold;
}
 
.checked, .price span { 
color: #ff9f1a;
}
 
.product-title, .rating, .product-description, .price, .vote, .sizes {  
margin-bottom: 15px;
}
 
.product-title {    
margin-top: 0;
}
 
.size {
    margin-right: 10px;
}
 
.size:first-of-type {   
margin-left: 40px;
}
 
.color {    
display: inline-block;  
vertical-align: middle; 
margin-right: 10px; 
height: 2em;    
width: 2em; 
border-radius: 2px;
}
 
.color:first-of-type {  
margin-left: 20px;
}
 
.add-to-cart, .like {   
background: #ff9f1a;    
padding: 1.2em 1.5em;   
border: none;   
text-transform: UPPERCASE;  
font-weight: bold;  
color: #fff;    
text-decoration:none; 
-webkit-transition: background .3s ease; 
transition: background .3s ease;
}
 
.add-to-cart:hover, .like:hover {   
background: #b36800;    
color: #fff;    
text-decoration:none;
}
 
.not-available {    
text-align: center; 
line-height: 2em;
}
 
.not-available:before { 
font-family: fontawesome;   
content: "\f00d";   
color: #fff;
}
 
.orange {   
background: #ff9f1a;
}
 
.green {    
background: #85ad00;
}
 
.blue { 
background: #0076ad;
}
 
.tooltip-inner {    
padding: 1.3em;
} 
 
@-webkit-keyframes opacity { 
0% { opacity: 0; -webkit-transform: scale(3); transform: scale(3);} 
100% { opacity: 1; -webkit-transform: scale(1); transform: scale(1);}
} 
 
@keyframes opacity { 
0% { opacity: 0; -webkit-transform: scale(3); transform: scale(3);} 
100% { opacity: 1; -webkit-transform: scale(1); transform: scale(1);}
}
</style>
