
<?php
class block_documentation extends block_base {
    public function init() {
        $this->title = get_string('documentation', 'block_documentation');
    }

    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }

        $this->content         =  new stdClass;
        $this->content->text   = 'The content of our Documentation block!';
        $this->content->footer = 'Footer here...';

        return $this->content;
    }

}