use newspaper_db;

-- Statement 1: Used in article.a.body.php
-- The intermediate table "article_content" is used to retrieve and show values from "users" table where article_ID = 2
SELECT
    ac.article_ID,
    ac.news_title,
    ac.news_body,
    ac.news_timestamp,
    u.user_FN,
    u.user_LN,
    ac.image_url
FROM
    article_content ac
    LEFT JOIN users u on u.user_ID = ac.user_ID
WHERE
    ac.article_ID = 2;

-- Statement 2: Used in article.b.tags.php
-- Shows article tags for the article_ID = 1
SELECT
    tags.tag_name
FROM
    article_content
    JOIN article_tags ON article_content.article_ID = article_tags.article_ID
    JOIN tags ON article_tags.tag_ID = tags.tag_ID
WHERE
    article_content.article_ID = 1;

-- Statement 3: Used in article.c.commentbox.php
-- Inserts current date and time on insertion of values
INSERT INTO
    comments (article_ID, comment_body, created_at)
VALUES
    (22, 'Text', NOW());

-- Statement 4: Used in article.d.comments.php
-- Retrieves the comment and timestamp of the comment from the "comments" table and the username  from the "users" table for the article_ID = 4
SELECT
    c.article_ID,
    c.comment_body,
    c.created_at,
    u.username
FROM
    comments c
    LEFT JOIN users u ON u.user_ID = c.user_ID
WHERE
    c.article_ID = 4;