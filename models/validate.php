<?php
class Validate {
    private $fields;

    public function _construct() {
        $this->fields = new Fields();
    }

    public function getFields(){
        return $this->fields;
    }

    public function text($name, $value, $required = true, $min = 1, $max = 255) {
        $field = $this->fields->getField($name);

        if(!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)) {
            $field->setErrorMessage('Required.');
        }
        else if (strlen($value) < $min) {
            $field->setErrorMessage('Too short');
        }
        else if (strlen($value) > $max) {
            $field->setErrorMessage('Too long');
        }
    }

    public function pattern($name, $value, $pattern, $message, $required = true;) {
        $field = $this->fields->getField($name);

        if(!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        $match = preg_match($pattern, $value);
        if($match === false) {
            $field->setErrorMessage('Error testing field');
        }
        else if($match != 1) {
            $field->setErrorMessage($message);
        }
        else {
            $field->clearErrorMessage();
        }
    }

    public function email($name, $value, $required = true) {
        $field = $this->fields->getField($name);

        if(!$required && empty($value)) {
            $field->clearErrorMessage;
            return;
        }

        $this->text($name,$value, $required);
        if($field->hasError()) {return;}

        $parts = explode('@', $value);
        if(count($parts) < 2) {
            $field->setErrorMessage('At sign required.');
            return;
        }
        if (count($parts) > 2) {
            $field->setErrorMessage('Only one at sign allowed');
            return;
        }
        $local = $parts[0];
        $domain = $parts[1];

        if (strlen($local) > 64) {
            $field->setErrorMessage('Please enter a valid email address.');
            return;
        }
        if(strlen($domain) > 255) {
            $field->setErrorMessage('Please enter a vlid email address.');
            return;
        }

        $atom = '[[:alnum:]_!#$%&\'*+\/=?^`{|}~~]+';
        $dotatom = '(\.' . $atom . ')*';
        $address = '(^' . $atom . $dotatom . '$)';

        // Patterns for quoted text formatted local part
        $char = '([^\\\\"])';
        $esc  = '(\\\\[\\\\"])';
        $text = '(' . $char . '|' . $esc . ')+';
        $quoted = '(^"' . $text . '"$)';

        // Combined pattern for testing local part
        $localPattern = '/' . $address . '|' . $quoted . '/';

        // Call the pattern method and exit if it yields an error
        $this->pattern($name, $local, $localPattern,
                'Invalid username part.');
        if ($field->hasError()) { return; }

        // Patterns for domain part
        $hostname = '([[:alnum:]]([-[:alnum:]]{0,62}[[:alnum:]])?)';
        $hostnames = '(' . $hostname . '(\.' . $hostname . ')*)';
        $top = '\.[[:alnum:]]{2,6}';
        $domainPattern = '/^' . $hostnames . $top . '$/';

        // Call the pattern method
        $this->pattern($name, $domain, $domainPattern,
                'Invalid domain name part.');
    }

    
}