<?php

function getall_category()
{
    $sql = "SELECT * FROM categories";
    return pdo_query($sql);
}

function getone_category($category_id)
{
    $sql = "SELECT * FROM categories WHERE category_id=$category_id";
    return pdo_query_one($sql);
}

function insert_category($name, $description, $image_url)
{
    $image_url = $image_url ?? '';
    $sql = "INSERT INTO categories (name, description, image_url) VALUES (?, ?, ?)";
    pdo_execute($sql, $name, $description, $image_url);
}

function update_category($category_id, $name, $description, $image_url)
{
    $parent_id = empty($parent_id) ? null : $parent_id;
    $sql = "UPDATE categories SET name=?, description=?,image_url=? WHERE category_id=?";
    return pdo_execute($sql, $name, $description, $image_url, $category_id);
}


function delete_category($category_id)
{
    $sql = "DELETE FROM categories WHERE category_id=?";
    return pdo_execute($sql, $category_id);
}

function count_product_in_category()
{
    $sql = "SELECT c.name as category_name, c.category_id, COUNT(p.product_id) as product_count FROM categories as c
        LEFT JOIN products as p ON  c.category_id = p.category_id
        GROUP BY category_name, c.category_id
        ";
    return pdo_query($sql);
}
