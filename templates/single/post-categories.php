<section class="post-category">
    <ul>
        <?php
        $categories = get_the_category();
        foreach ($categories as $category):
            ?>
            <li>
                <i class="fa fa-folder"></i>
                <a class="post-category-<?php echo $category->term_id; ?>" href="<?php echo get_category_link($category->term_id); ?>" title=""><?php echo $category->name; ?></a>
            </li>
            <?php
        endforeach;
        ?>
    </ul>
</section><!--.post-category-->