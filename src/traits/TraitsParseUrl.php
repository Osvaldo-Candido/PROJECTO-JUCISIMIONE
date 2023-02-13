<?php

namespace Src\Traits;

trait TraitsParseUrl {

    public function parseUrl()
    {
        return explode('/',$_GET['url'],FILTER_SANITIZE_URL);
    }
}