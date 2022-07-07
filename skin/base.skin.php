<?php

namespace skin\base;

function layout($ctx, $title, $unsafe_body) {
return <<<HTML
<!doctype html>
<html lang="en">
    <body>
        <title>{$title}</title>
    </body>
    <body>{$unsafe_body}</body>
</html>
HTML;
}
