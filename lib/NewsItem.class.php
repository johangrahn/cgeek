<?php

class NewsItem {
	private $title;
	private $content;
	
	// A timestamp when the news item was created 
	private $created;
	
	public function __construct() {
	
	}
	
	// Loads data into the class from an array 
	// This will primarly be used by a database class 
	public function loadData( array $data ) {
		$this->title = $data['title'];
		$this->content = $data['content'];
		$this->created = $data['created'];
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function getContent() {
		return $this->content;
	}
	
	public function getCreatedTimestamp() {
		return $this->created;
	}
}

