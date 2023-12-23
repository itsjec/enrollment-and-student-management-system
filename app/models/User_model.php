<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {

    public function register($data)
    {
        $bind = array(
            'Username' => $data['username'],
            'Email' => $data['email'],
            'Password' => $data['password'],
        );

        $this->db->table('users')->insert($bind);
    }

    public function authenticateUser($email, $password)
    {
        $user = $this->db->table('users')
            ->where('Email', $email)
            ->get();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return null;
        }
    }

    public function getUserDataById($userId)
    {
        return $this->db->table('students')->where('student_id', $userId)->get();
    }

    public function getCourses(){
        $this->call->database();
        return $this->db->table('courses')->get_all();
    }

    public function getUsers(){
        $this->call->database();
        return $this->db->table('students')->get_all();
    }

    public function delete($id){
        $this->db->table('students')->where('student_id', $id)->delete();
    }

    public function update($data,$id){
        $this->db->table('students')->where('student_id', $id)->update($data);
    }

    public function updateStatus($newData, $id)
    {
        $this->db->table('students')->where('student_id', $id)->update($newData);
    }    

    public function getEnrolledUsers(){
        $this->call->database();
        return $this->db->table('students')->where('status', 'Pending')->get_all();
    }

    public function insert($first_name, $last_name, $course, $email, $contact_number, $birthday, $address, $year_level, $section) {
        $courses = $this->getCourses(); 
        $courseInfo = $this->getCourseInfoByName($courses, $course);
    
        if ($courseInfo === null) {
            $courseInfo = ['course_id' => 0, 'course_name' => 'Default Course']; 
        }
    
        $formattedBirthday = date('Y-m-d', strtotime($birthday));
    
        $bind = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'course_id' => $courseInfo['course_id'],
            'course' => $courseInfo['course_name'],
            'email' => $email,
            'contact_number' => $contact_number,
            'birthday' => $formattedBirthday,
            'address' => $address,
            'year_level' => $year_level,
            'section' => $section,
            'status' => 'Pending',
        );
        
        $this->db->table('students')->insert($bind);
    }
    
    
    private function getCourseInfoByName($courses, $courseName) {
        foreach ($courses as $course) {
            if ($course['course_name'] === $courseName) {
                return $course;
            }
        }
    
        return null;
    }

      public function search($searchTerm) {

        $this->db->like('first_name', $searchTerm);
        $this->db->or_like('last_name', $searchTerm); 
        $this->db->or_like('section', $section); 
        $this->db->or_like('year_level', $year_level); 

        $query = $this->db->get('students');
        
        return $query->result_array();
      
      }
}
?>
