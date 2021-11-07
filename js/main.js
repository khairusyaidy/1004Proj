/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    ImageOnclick();
    activateMenu();
});


function ImageOnclick() {
    var thumbnail = document.getElementsByClassName("img-thumbnail");
    for (let i = 0; i < thumbnail.length; i++) {
        thumbnail[i].addEventListener("click", displayPopUp);
        var span = document.createElement("span");

        function displayPopUp() {
            document.getElementsByClassName("div-thumbnail")[i].appendChild(span);
            var imgsrc = thumbnail[i].src;
            var bigimg = imgsrc.replace("_small", "_large");
            span.className = "img-popup";
            span.innerHTML = "<img class='big_img' src='" + bigimg + "'/>";
            span.addEventListener("click", removePopUp);
        }

        function removePopUp() {
            span.remove();
        }

    }
}

/* 
 *	This function toggles the nav menu active/inactive status as 
 *	different pages are selected. It should be called from $(document).ready() 
 *	or whenever the page loads. 
 */
function activateMenu()
{
    var current_page_URL = location.href;

    $(".navbar-nav a").each(function ()
    {
        var target_URL = $(this).prop("href");
        if (target_URL === current_page_URL)
        {
            $('nav a').parents('li, ul').removeClass('active');
            $(this).parent('li').addClass('active');
            return false;
        }
    });
}














