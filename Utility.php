<?php

function fetchCommentCount($db, $postId) {
    $stmt = "SELECT COUNT(comment_id) FROM comments WHERE post_id = $postId";
    $query = $db->prepare($stmt);
    $query->execute();
    $f = $query->fetch();
    $result = $f[0];
    return $result;
}

function fetchVoteCount($db, $postId) {
    $stmt = "SELECT COUNT(vote_id) FROM votes WHERE post_id = $postId";
    $query = $db->prepare($stmt);
    $query->execute();
    $f = $query->fetch();
    $result = $f[0];
    return $result;
}

function fetchPosterName($db, $postId) {
    $stmt = "SELECT user_name FROM posts INNER JOIN users ON posts.user_id = users.user_id WHERE post_id = $postId";
    $query = $db->prepare($stmt);
    $query->execute();
    $f = $query->fetch();
    $result = $f[0];
    return $result;
}

function fetchTag($db, $postId) {
    $stmt = "SELECT tag_name FROM posts INNER JOIN tag ON posts.tag_id = tag.tag_id WHERE post_id = $postId";
    $query = $db->prepare($stmt);
    $query->execute();
    $f = $query->fetch();
    $result = $f[0];
    return $result;
}
