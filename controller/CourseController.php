<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use view\TemplateView;
use view\LayoutRendering;
use model\Course;
use database\courseDAO;

/**
 * Description of CourseController
 *
 * @author bodog
 */
class CourseController {

    //put your code here

    public static function create() {
        $contentView = new TemplateView("courseCreate.php");
        LayoutRendering::basicLayout($contentView);
    }

    public static function readAll() {
        $contentView = new TemplateView("courseOverview.php");
        $courseDAO = new CourseDAO();
        $contentView->courses = $customerDAO->findByInstitute(/* current Institute ID */);
        LayoutRendering::basicLayout($contentView);
    }

    public static function edit($courseId) {
        $contentView = new TemplateView("courseEdit.php");
        $courseDAO = new CourseDAO();
        $contentView->customer = $courseDAO->read($courseID);
        LayoutRendering::basicLayout($contentView);
    }

    public static function update() {
        $course = new Course();
        $course->setId($_POST["id"]);
        $course->setName($_POST["name"]);
        $course->setId($_POST["postCode"]);
        $course->setId($_POST["place"]);
        $course->setId($_POST["costs"]);
        $course->setId($_POST["start"]);
        $course->setId($_POST["end"]);
        $course->setId($_POST["link"]);
        $course->setId($_POST["instituteId"]);
        $course->setId($_POST["departmentId"]);
        $course->setId($_POST["areaId"]);
        $course->setId($_POST["courseTypeId"]);
        
        $courseDAO = new CourseDAO();
        $courseDAO->update($course);
    }

    public static function delete($courseId) {
        $courseDAO = new CourseDAO();
        $course = new Course();
        $course->setId($courseId);
        $courseDAO->delete($course);
    }
    
    public static function search($search, $department, $area) {
        
    }
}
