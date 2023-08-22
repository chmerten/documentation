
<?php
class block_documentation extends block_base {
    public function init() {
        $this->title = get_string('documentation', 'block_documentation');
    }

    public function get_content() {

        global $DB;
        // Get visible category courses
        $sql = "SELECT c.id, c.fullname, cc.name
                        FROM {course} c
                        JOIN {course_categories} cc ON c.category = cc.id
                        WHERE cc.idnumber = :categoryidnumber AND c.visible = 1
                        ORDER BY c.sortorder ASC";
        $course_list = $DB->get_records_sql_menu($sql, array('categoryidnumber' => 'TESTCM'));


        if ($this->content !== null) {
            return $this->content;
        }

        $this->content         =  new stdClass;
        $this->content->text   = '<a href="https://www.google.com">Google</a>';
        $this->content->footer = 'Footer here...';

        return $this->content;
    }

}