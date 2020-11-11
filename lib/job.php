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

    //Get category
    public function getCategory($category){
        $this->db->query("SELECT * FROM categories WHERE id = :category_id"
    );
        $this->db->bind(':category_id', $category);

        //assign row
        $row = $this->db->single();

        return $row;
    }

    //Get job
    public function getJob($id){
        $this->db->query("SELECT * FROM job WHERE id = :id"
    );
        $this->db->bind(':id', $id);

        //assign row
        $row = $this->db->single();

        return $row;
    }

    //create job
    public function create($data){
        //insert query
        $this->db->query("INSERT INTO job (category_id, job_title, company, description, location, salary, contact_user, contact_email)
        VALUES (:category_id,:job_title, :company, :description, :location, :salary, :contact_user, :contact_email)");
        //bind data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);
    
        //execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    
    }

    //delete job
    public function delete($id){
        $this->db->query("DELETE FROM job WHERE id = $id");
       
        //execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    
    }

    //Update Job
    public function update($id, $data){
        //insert query
        $this->db->query("UPDATE job
        SET
        category_id = :category_id,
        job_title = :job_title,
        company = :company,
        description = :description,
        location = :location,
        salary = :salary,
        contact_user = :contact_user,
        contact_email = :contact_email
        WHERE id = $id
        ");
        //bind data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);
    
        //execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    
    }
}