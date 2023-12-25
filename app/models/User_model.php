<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class User_model extends Model
{

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

        return $this->db->table('users')
            ->where('user_id', $userId)
            ->get();

        //wag na pala i join, kunin ko nalang panibago data, may email naman pala ule sa student side which is dapat wala na sa tunay na buhay kase naulit yung fields
    }




    public function getCourses()
    {

        return $this->db->table('courses')->get_all();
    }

    public function getUsers()
    {

        return $this->db->table('students')->get_all();
    }
    public function getStudentProfile($userId)
    {
        $count = $this->db->table('students')->select_count('user_id', 'total_row')->where('user_id', $userId)->get();
        if ($count > 0) {
            return $this->db->table('students')->where('user_id', $userId)->get();
        } else {
            return $count;
        }


    }

    public function delete($id)
    {
        $this->db->table('students')->where('student_id', $id)->delete();
    }

    public function update($data, $id)
    {
        $this->db->table('students')->where('student_id', $id)->update($data);
    }

    public function updateStatus($newData, $id)
    {
        $this->db->table('students')->where('student_id', $id)->update($newData);
    }

    public function getEnrolledUsers()
    {

        return $this->db->table('students')->where('status', 'Pending')->get_all();
    }

    public function insert($first_name, $last_name, $course, $email, $contact_number, $birthday, $address, $year_level, $section, $user_id)
    {
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
            'user_id' => $user_id,
        );

        $this->db->table('students')->insert($bind);
    }


    private function getCourseInfoByName($courses, $courseName)
    {
        foreach ($courses as $course) {
            if ($course['course_name'] === $courseName) {
                return $course;
            }
        }

        return null;
    }
    public function updateProfile($first_name, $last_name, $contact_number, $birthday, $address, $student_id)
    {

        $formattedBirthday = date('Y-m-d', strtotime($birthday));

        $bind = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'contact_number' => $contact_number,
            'birthday' => $formattedBirthday,
            'address' => $address,
            'status' => 'Pending',
            'student_id' => $student_id,
        );

        $this->db->table('students')->where('student_id', $student_id)->update($bind);
    }
    public function search($searchTerm)
    {

        $searchTerm = "%" . $searchTerm . "%";


        $query = $this->db->table('students')
            ->like('first_name', $searchTerm)
            ->or_like('last_name', $searchTerm)
            ->or_like('email', $searchTerm)
            ->or_like('year_level', $searchTerm)
            ->or_like('status', $searchTerm)
            ->or_like('course', $searchTerm)
            ->or_like('address', $searchTerm)
            ->get_all();

        return $query;
    }


    public function getTotalStudents()
    {
        $query = $this->db->table('students')->select_count('student_id', 'total_students')->get();
        return $query['total_students'] ?? 0;
    }


    public function getEnrolledStudents()
    {
        $query = $this->db->table('students')->where('status', 'Enrolled')->select_count('student_id', 'total_enrolled')->get();
        return $query['total_enrolled'] ?? 0;
    }


    public function getPendingEnrollees()
    {
        $query = $this->db->table('students')->where('status', 'Pending')->select_count('student_id', 'total_pending')->get();
        return $query['total_pending'] ?? 0;
    }


    public function getDroppedStudents()
    {
        $query = $this->db->table('students')->where('status', 'Dropped')->select_count('student_id', 'total_dropped')->get();
        return $query['total_dropped'] ?? 0;
    }


}
?>