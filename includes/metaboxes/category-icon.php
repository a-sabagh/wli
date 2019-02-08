<?php

function wli_category_icon_add() {
    ?>
    <label for="name">آیکن دسته بندی</label>
    <input style="direction: ltr;text-align: left;width: 94%;" type="text" name="category_icon" value="<?php echo $input_name; ?>" />
    <p style="color: #666666; font-weight: lighter;margin-bottom: 1em;">کلاس آیکن دسته بندی را از <a target="_blank" style="text-decoration: none;" href="https://fontawesome.com/v4.7.0/icons/"> این لینک </a> جستجو کنید.</p>
    <?php
}

function wli_category_icon_created($term_id) {
    $input_name = $_POST['category_icon'];
    if (isset($input_name) && !empty($input_name)) {
        add_term_meta($term_id, 'wli_category_icon', $input_name);
    }
}

function wli_category_icon_edit($term) {
    $input_name = get_term_meta($term->term_id, 'wli_category_icon', TRUE);
    ?>
    <table class="form-table">
        <tbody>
            <tr class="form-field form-required term-name-wrap">
                <th scope="row">
                    <label for="name">آیکن دسته بندی</label>
                    <span style="color: #666666; font-weight: lighter;font-size: .9em;line-height: 2em;margin: .5em 0; display: block;">کلاس آیکن دسته بندی را از <a target="_blank" style="text-decoration: none;" href="https://fontawesome.com/v4.7.0/icons/"> این لینک </a> جستجو کنید.</span>
                </th>
                <td>
                    <input style="direction: ltr;text-align: left;" type="text" name="category_icon" value="<?php echo $input_name; ?>" />
                </td>
            </tr>
        </tbody>
    </table>
    <?php
}

function wli_category_icon_update($term_id) {
    $input_name = $_POST['category_icon'];
    update_term_meta($term_id, 'wli_category_icon', $input_name);
}

add_action('category_add_form_fields', 'wli_category_icon_add', 50);
add_action('created_category', 'wli_category_icon_created');
add_action('category_edit_form_fields', 'wli_category_icon_edit', 50);
add_action('edited_category', 'wli_category_icon_update');
