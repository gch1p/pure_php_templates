<?php

class Skin {

    public string $title = 'no title';

    public function renderPage($f, ...$vars): string {
        $f = str_replace('/', '\\', $f);
        $ctx = new SkinContext(substr($f, 0, ($pos = strrpos($f, '\\'))));
        $body = call_user_func_array([$ctx, substr($f, $pos+1)], $vars);

        $layout_ctx = new SkinContext('base');
        return $layout_ctx->layout(
            title: $this->title,
            unsafe_body: $body,
        );
    }

}
