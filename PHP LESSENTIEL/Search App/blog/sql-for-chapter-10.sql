-- Copy this SQL code and paste it into
-- the SQL window in phpmyadmin

CREATE TABLE comment (
    comment_id INT NOT NULL AUTO_INCREMENT,
    entry_id INT NOT NULL,
    author VARCHAR( 75 ),
    txt TEXT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (comment_id),
    FOREIGN KEY (entry_id) REFERENCES blog_entry (entry_id)
)
