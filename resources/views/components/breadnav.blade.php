<?php

    $links = array();

    $count = count($paths);

    if ($count > 1)
        while ($count > 1) {
            $count -= 1;
            array_push($links, $paths[$count]);
        }


    $end = array_slice($paths, count($paths) - 2, 1);

    $end = $paths[0]

?>

<div class="banner-image">
    <div class="banner-overlay">
        <div class="bread-crumb-container">
            <h1 class="page-title">
                {{ $pageTitle }}
            </h1>
            <nav class="bread-crumb-nav">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">KairHealth</a>
                        <span class="divider"></span>
                    </li>
                    @foreach ($links as $link)
                    <li>
                        <a href="{{ $link -> path }}"> {{ $link -> text}}</a>
                        <span class="divider"></span>
                    </li>
                    @endforeach
                    <li class="active">
                        {{ $end -> text }}
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>