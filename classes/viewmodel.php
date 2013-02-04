<?php
class ViewModel {    
    
    public function set($name, $val, $desc = NULL, $descVal = NULL, $keys = NULL, $keysVal = NULL, $author = NULL, $authorVal = NULL, $css = NULL, $cssVal = NULL) {
        $this->$name = $val;
        if (isset($desc)) { $this->$desc = $descVal; }
        if (isset($keys)) { $this->$keys = $keysVal; }
        if (isset($author)) { $this->$author = $authorVal; }
        if (isset($css)) { $this->$css = $cssVal; }
    }
    
    public function get($name) {
        if (isset($this->{$name})) {
            return $this->{$name};
        } else {
            return null;
        }
    }
}

?>