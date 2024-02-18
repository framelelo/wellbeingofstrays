<?php
/**
 * DISPLAY HOME PAGE AND ADOPTIONS
 * 
 */
function homePage()
{
    $adoptions = showAdoptions();

    ShowHomePage($adoptions);
};
