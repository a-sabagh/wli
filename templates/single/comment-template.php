<section class="single-comment-list">

    <h5><?php _e('دیدگاه ها', 'irtt'); ?></h5>
    <div class="widg-content">
        <?php
        $comments = get_comments(array(
            'post_id' => get_the_ID(),
                //'status' => 'approved' //Change this to the type of comments to be displayed
        ));

        if (!empty($comments)) {
            echo '<ol class="comment-list">';
            wp_list_comments(array(
                'per_page' => 15, //Allow comment pagination
                'reverse_top_level' => false,
                'avatar_size' => 64//Show the oldest comments at the top of the list
                    ), $comments);
            echo '</ol>';
        }
        ?>
</section>
<!--.single-comment-list-->