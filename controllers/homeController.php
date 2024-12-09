<?php
/**
 * DISPLAY HOME PAGE AND ADOPTIONS
 * 
 */
function homePage()
{
    $adoptions = showAdoptions();
    $events = showEvents();

    ShowHomePage($adoptions, $events);
};
