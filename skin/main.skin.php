<?php

namespace skin\main;

function index($ctx, $name, $show_cities, $cities) {
return <<<HTML
    Hello, {$name}!<br/>
    
    {$ctx->if_true($show_cities, 'line of truth<br/>')}
    {$ctx->if_not(false, $ctx->renderIfFalse, '<b>safe<b>', '<b>unsafe<b>')}
    
    <ul>
        {$ctx->for_each($cities, fn($city, $i) => $ctx->renderIndexCityItem($city, $i+1))}
    </ul>
HTML;
}

function renderIndexCityItem($ctx, $city, $index) {
return <<<HTML
    <li>{$index} {$city}</li>
HTML;
}

function renderIfFalse($ctx, $str, $unsafe_str) {
return <<<HTML
safe: $str<br/>
unsafe: $unsafe_str
HTML;
}