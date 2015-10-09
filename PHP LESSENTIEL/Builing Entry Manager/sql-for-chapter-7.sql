-- SQL statements used in PHP for absolute beginners, 2nd edition, Chapter 7


-- this will create a database for the blog
CREATE DATABASE simple_blog CHARSET utf8

-- this will create a table for blog entries
CREATE TABLE blog_entry (
    entry_id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR( 150 ),
    entry_text TEXT,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY ( entry_id )
)
