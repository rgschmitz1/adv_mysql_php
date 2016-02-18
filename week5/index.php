<?php
require_once("course.php");
require_once("student.php");
require_once("ITCourse.php");

$student1 = new Student();
$student1->name = "joe blow";
$student1->email = "jblow@mail.com";

$course1 = new Course("adv.php");
$course1->description = "some really awesome class";
$course1->tutor = $student1;

$course2 = new ITCourse("asp.net");
$course2->description = "another really awesome course";

echo $course1;
echo $course2;
