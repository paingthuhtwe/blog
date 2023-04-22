<?php

use function Pest\Laravel\get;

test('/articles route', function () {
    get('/articles')->assertOk();
});

test('article index view', function () {
    get('/articles')
        ->assertOk()
        ->assertViewIs('articles.index')
        ->assertViewHas('articles');
});
