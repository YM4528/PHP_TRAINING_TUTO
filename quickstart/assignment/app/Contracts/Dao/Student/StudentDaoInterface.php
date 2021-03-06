<?php

namespace App\Contracts\Dao\Student;

use Illuminate\Http\Request;



/**
 * Interface for Data Accessing Object of Post
 */
interface StudentDaoInterface
{
    /**
     * To get all student list
     * @param
     * @return $students
     */
    public function getAllStudents();

    /**
     * To get list of majors
     *  @param
     *  @return $majors
     */
    public function getMajors();

    /**
     * To add new student
     * @param Request $request
     * @return
     */
    public function addStudent(Request $request);

    /**
     * To get a student by id
     * @param $id
     * @return Object $student
     */
    public function getStudentById($id);

    /**
     * To edit student information
     * @param $id,Request $request
     * @return
     */
    public function editStudentById(Request $request, $id);

    /**
     * To delete student by id
     * @param $id
     * @return
     */
    public function deleteStudentById($id);

    /**
     * To search students from list
     * @param Request $request
     * @return list of students
     */
    public function searchStudents(Request $request);

    /**
     * To get all students and majors data
     * @return object array
     */
    public function getAllStudentsMajors();

    /**
     * To get 10 latest students
     * @return $students array of student
     */
    public function latestStudents();
}
