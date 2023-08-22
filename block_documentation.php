
<?php
class block_documentation extends block_base {
    public function init() {
        $this->title = get_string('documentation', 'block_documentation');
    }

    public function get_content() {

        global $DB;
        global $CFG;
        // Get visible category courses
        $sql = "SELECT c.id, c.fullname
                        FROM {course} c
                        JOIN {course_categories} cc ON c.category = cc.id
                        WHERE cc.idnumber = :categoryidnumber AND c.visible = 1
                        ORDER BY c.sortorder ASC";
        $course_list = $DB->get_records_sql($sql, array('categoryidnumber' => 'TESTCM'));

        $course_list_text='<ul>';
        foreach ($course_list as $course) {
            $course_url = $CFG->wwwroot . '/course/view.php?id=' . $course->id;
            //$course_list_text = $course_list_text . '<li>' . '<a href=\"' .  $course_url . '\">'. $course->fullname . '</a>' . '</li>';
            $course_list_text = $course_list_text . '<li>' . '<a href="' . $CFG->wwwroot . '/moodle41/course/view.php?id=12">' . $course->fullname . '</a>' . '</li>';
        }
        $course_list_text = $course_list_text . '</ul>';


        if ($this->content !== null) {
            return $this->content;
        }

        $this->content         =  new stdClass;
        $this->content->text   = $course_list_text;
        $this->content->footer = 'Footer here...';

        return $this->content;
    }

}