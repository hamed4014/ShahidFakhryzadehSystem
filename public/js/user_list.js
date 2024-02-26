
var box_search = document.getElementById('search_box');
setInterval( function () {
    if ( document.activeElement === box_search )
    {
        document.getElementById('search_form').style.border = "solid 2px rgba(0,0,0,0)";
        document.getElementById('search_form').style.boxShadow = "0px 0px 6px 1px rgb(100,150,255)";
    }
    else
    {
        document.getElementById('search_form').style.border = "solid 2px rgb(200,200,200)";
        document.getElementById('search_form').style.boxShadow = "none";
    }
} , 5);

