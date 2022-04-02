
var idcategorie=null;
var urli= new URL(window.location.href).origin;
image=urli+"/storage/imageProduct/";

function recupererIdCategorie(id)
{
    fetch(urli+"/productsCategory/"+id)
    .then(function(res) {
        if (res.ok) {
        return res.json();
        }
    })
    .then(function(value) {
        // console.log(value);
        productContent=``;
        var content=``;
        value.forEach(element => {
        content+=`<div class="el-wrapper">
                    <div class="box-up">
                        <img class="img" src="`+image+element.product_fileimg+`" width="200px" alt="">
                        <div class="img-info">
                        <div class="info-inner">
                        <span class="p-name">`+element.product_name+`</span>
                            <span class="p-company">IniMovShop</span>
                        </div>
                        <div class="a-size">
                            Quantité en stock : <span class="size">`+element.product_stock+`</span><br>
                        <div class="iconne">
                            <a href="`+urli+element.id+`"><i class="fa fa-pencil"></i></a>
                                
                                <a href="`+urli+element.id+`"><i class="fa fa-trash"></i></a>
                        </div>
                        
                    </div
                    </div>
                </div>
            </div>

            <div class="box-down">
                <div class="h-bg">
                    <div class="h-bg-inner"></div>
                </div>

                <a class="cart" href="#">
                                <span class="price">`+element.product_price+`FCFA</span>
                                <span class="add-to-cart">
                                    <span class="txt">Plus de détail</span>
                                </span>
                            </a>
                        </div>
                </div>`;
        });
        if(value.length>0)
        {
             productContent=`<div class="product" id="productMain">`+content+`</div>`;
        }
        else
        {
             productContent=`<div class="product" id="productMain"><h2>Aucun Produit....</h2></div>`;
        }
         $("#productMain").replaceWith(productContent);
    })
    .catch(function(err) {
        console.log(err);
    });

}

$("#searchButton").click(function(e){
    console.log(urli);
    let categorie= document.formulaire.selectCategorie.value;
    let nameproduct= document.formulaire.produitName.value;

    if(categorie && nameproduct)
    {
        fetch(urli+'/productCategory/'+categorie+'/'+nameproduct).then(function(res) {
        if (res.ok) {
        return res.json();
        
        }
        }).
        then(function(value) {
            productContent=``;
            var content=``;
            value.forEach(element => {
            content+=`<div class="el-wrapper">
                        <div class="box-up">
                            <img class="img" src="`+image+element.product_fileimg+`" width="200px" alt="">
                            <div class="img-info">
                            <div class="info-inner">
                            <span class="p-name">`+element.product_name+`</span>
                                <span class="p-company">IniMovShop</span>
                            </div>
                            <div class="a-size">
                                Quantité en stock : <span class="size">`+element.product_stock+`</span><br>
                            <div class="iconne">
                                <a href="`+urli+element.id+`"><i class="fa fa-pencil"></i></a>
                                    
                                    <a href="`+urli+element.id+`"><i class="fa fa-trash"></i></a>
                            </div>
                            
                        </div
                        </div>
                    </div>
                </div>

                <div class="box-down">
                    <div class="h-bg">
                        <div class="h-bg-inner"></div>
                    </div>

                    <a class="cart" href="#">
                                    <span class="price">`+element.product_price+`FCFA</span>
                                    <span class="add-to-cart">
                                        <span class="txt">Plus de détail</span>
                                    </span>
                                </a>
                            </div>
                    </div>`;
            });
            
            if(value.length>0)
            {
                productContent=`<div class="product" id="productMain">`+content+`</div>`;
            }
            else
            {
                productContent=`<div class="product" id="productMain"><h2>Aucun Produit.....</h2></div>`;
            }
        
            $("#productMain").replaceWith(productContent);
            
        })
        .catch(function(err) {
            console.log(err);
        });
    }
    else
    {
          productContent=`<div class="product" id="productMain"><h2>Aucun Produit.....</h2></div>`;
          $("#productMain").replaceWith(productContent);
    }
    
    

})

$("#refresher").click(function(e){
   
        fetch(urli+'/getAllProducts').then(function(res) {
        if (res.ok) {
        return res.json();
        
        }
        }).
        then(function(value) {
            productContent=``;
            var content=``;
            value.forEach(element => {
            content+=`<div class="el-wrapper">
                        <div class="box-up">
                            <img class="img" src="`+image+element.product_fileimg+`" width="200px" alt="">
                            <div class="img-info">
                            <div class="info-inner">
                            <span class="p-name">`+element.product_name+`</span>
                                <span class="p-company">IniMovShop</span>
                            </div>
                            <div class="a-size">
                                Quantité en stock : <span class="size">`+element.product_stock+`</span><br>
                            <div class="iconne">
                                <a href="`+urli+element.id+`"><i class="fa fa-pencil"></i></a>
                                    
                                    <a href="`+urli+element.id+`"><i class="fa fa-trash"></i></a>
                            </div>
                            
                        </div
                        </div>
                    </div>
                </div>

                <div class="box-down">
                    <div class="h-bg">
                        <div class="h-bg-inner"></div>
                    </div>

                    <a class="cart" href="#">
                                    <span class="price">`+element.product_price+`FCFA</span>
                                    <span class="add-to-cart">
                                        <span class="txt">Plus de détail</span>
                                    </span>
                                </a>
                            </div>
                    </div>`;
            });
            
            if(value.length>0)
            {
                productContent=`<div class="product" id="productMain">`+content+`</div>`;
            }
            else
            {
                productContent=`<div class="product" id="productMain"><h2>Aucun Produit.....</h2></div>`;
            }
        
            $("#productMain").replaceWith(productContent);
            
        })
        .catch(function(err) {
            console.log(err);
        });
    

})

