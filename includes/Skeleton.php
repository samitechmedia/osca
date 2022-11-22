<?php

class Skeleton
{
    public static function getGameSkeletonHtml(int $count, ?string $class = ''): string
    {
        $html = '';

        for ($i = 0; $i != $count; $i++) {
            $html .= <<<HTML
<li class="$class">
  <div class="sfg__game-image skeleton-item"></div>
  <div class="sfg__game-description skeleton-item"></div>
</li>
HTML;
        };

        return $html;
    }

    public static function getSkeletonHtml(?string $class = ''): string
    {
        return "<div class=\"skeleton-item $class\"></div>";
    }
}
