function autocompletar( arg , url){
    
$.getJSON( url , function(data){
    
 var nacions= [];
Object.keys(data).map(function(key ){nacions.push(  data[key].descrip);}
);

$( arg ).autocomplete(
{ source: nacions }
);       });/** End JSON **/


    
}