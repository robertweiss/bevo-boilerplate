<?php
$home = $pages->get('/');

$mainnav.= "<ul class='level1'>";
foreach ($home->children() as $level1) {
    $class = (($page->id == $level1->id || $page->parent->id == $level1->id) && $page->id !== $home->id) ? " class='current'" : '';

    $subnav = '';
    $isparent = '';
    if ((in_array($level1->template, array('projects','services'))) && ($level1->children->count() > 0)) {
        $isparent = " class='parent'";
        $subnav.= "<div class='level2'>";
        foreach ($level1->children() as $level2) {
            $subclass = ($page->id == $level2->id) ? " class='current'" : '';
            $subnav.= "<a{$subclass} href='{$level2->url}'>{$level2->title}</a>";
        }
        $subnav.= "</div>";
    }

    $mainnav.= "<li{$class}><a{$isparent} href='{$level1->url}'>{$level1->title}</a>";
    $mainnav.= $subnav;
    $mainnav.= "</li>";
}
$mainnav.= "</ul>";
?>