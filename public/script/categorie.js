
var idcategorie=null;
function recupererIdCategorie(id)
{
    idcategorie=id;
}

$("#cat-"+idcategorie).click(function(e){
    console.log($(this));
})