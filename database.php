<?php
include_once('config.php');

function getConnection() {
    global $dbHost, $dbName, $dbUser, $dbPassword;
    $connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
    if($connection->connect_errno) {
        $connection->close();
        die('Database connection problem');
    }
    return $connection;
}

function getAllPosts() {
    $connection = getConnection();
    $sql = "SELECT posts.id AS id,posts.title,categories AS categoryName FROM posts INNER JOIN categories ON posts.categoryId=categories.id";
    $result = $connection->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $connection->close();
    return $rows;
}

function getPost($id) {
    $connection = getConnection();
    $sql = "SELECT posts.id AS id,posts.title AS title,post.content AS content,posts.createdAt AS createdAt,categories.name AS categoryName,admins.firstName AS firstName, admins.lastName AS lastName FROM posts INNER JOIN categories ON posts.categoryId=categories.id INNER JOIN admins ON posts.authoId=admins.id WHERE id = $id";
    $result = $connection->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $connection->close();
    if(count($rows) == 0){
        header('Location: 404.php');
        exit();
    }
    return $rows[0];
}