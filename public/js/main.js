
document.getElementById("present").onclick = function () {
    const collection = document.getElementsByClassName("present");
    for (let i = 0; i < collection.length; i++) {
        if ( collection[i].style.opacity == "1")
        {
            collection[i].style.height = "0px";
            collection[i].style.opacity = "0";
            collection[i].style.visibility = "hidden";
        }
        else
        {
            collection[i].style.height = "30px";
            collection[i].style.opacity = "1";
            collection[i].style.visibility = "visible";
        }

    }
}

document.getElementById("user_name").onclick = function () {
    var left = document.getElementById("left_list").style.left;
    if ( left != "0px" )
    {
        document.getElementById("left_list").style.left = "0px";
    }
    else
    {
        document.getElementById("left_list").style.left = "-170px";
    }

};

setTimeout(function () {
    if ( document.getElementById("alert"))
    {
        document.getElementById("alert").style.transition = "0.5";
        document.getElementById("alert").style.opacity = "0";
        document.getElementById("alert").style.visibility = "hidden";
    }
} , 5000)
