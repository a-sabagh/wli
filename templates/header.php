<?php
$current_object = get_queried_object();
if (is_search()) {
    ?>
    <header class="single-header">
        <h1 class="single-title text-center">نمایش جستجو بر اساس  <span class="search-item"><?php echo $s; ?></span></h1>
    </header>
    <?php
} elseif (is_singular()) {
    ?>
    <header class="single-header">
        <h1 class="single-title text-center"><?php the_title(); ?></h1>
    </header>
    <?php
} else {
    ?>
    <header class="single-header">
        <h1 class="single-title text-center"><?php echo $current_object->name; ?></h1>
    </header>
    <?php
}