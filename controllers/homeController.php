<?php

function homePage()
{
    $adoptions = showAdoptions();

    ShowHomePage($adoptions);
};
