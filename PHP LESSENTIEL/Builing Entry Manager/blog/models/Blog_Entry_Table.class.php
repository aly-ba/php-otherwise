<?php

class Blog_Entry_Table {
    private $db;
    
    public function __construct ( $db ) {
        $this->db = $db;
    }
      
    public function saveEntry ( $title, $entry ) {
        $entrySQL = "INSERT INTO blog_entry ( title, entry_text ) 
                     VALUES ( ?, ?)";
        $entryStatement = $this->db->prepare( $entrySQL );
        $formData = array( $title, $entry ); 
        try{
            $entryStatement->execute( $formData );
        } catch (Exception $e){
            $msg = "<p>You tried to run this sql: $entrySQL<p>
                    <p>Exception: $e</p>";
            trigger_error($msg);
        }
    }

}
