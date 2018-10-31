<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CourseController
 *
 * @author bodog
 */
class CourseDAO extends BasicDAO {
    
    public function create(){
        $stmt = $this->$mysqli->prepare("INSERT INTO course (ID, Name, PostCode, Place, Costs, Start, End, Link, InstituteID, DepartmentID, AreaID, CourseTypeID)"
                . "VALUES (NULL, ?, ?, ?, ?, ?, ?, ?,"
                . "?, ?, ?, ?)");
    }
}
