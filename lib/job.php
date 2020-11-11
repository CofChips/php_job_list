<?php
class Job{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Get all jobs
    public function getAllJobs(){
        $this->db->query("SELECT job.*, categories.name AS cname 
        FROM job
        INNER JOIN categories 
        ON job.category_id = categories.id
        ORDER BY post_date DESC
        ");

        //assign result set
        $results = $this->db->resultSet();

        return $results;
    }

    //Get Categories
    public function getCategories(){
        $this->db->query("SELECT * FROM categories");
        $results = $this->db->resultSet();

        return $results;
    }

    //Get Jobs by Category
    public function getByCategory($category){
        $this->db->query("SELECT job.*, categories.name AS cname 
        FROM job
        INNER JOIN categories 
        ON job.category_id = categories.id
        WHERE job.category_id = $category
        ORDER BY post_date DESC
        ");

        //assign result set
        $results = $this->db->resultSet();

        return $results;
    }

}