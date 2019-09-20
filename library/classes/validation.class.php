<?php
class validation
{
    protected  $fields = array();
    private $errors = array();

    public function setRules($field, $errorMessage, $rules = array())
    {
        if (count($_POST) == 0) {
             $errorMessage = ("The array of post parameters is empty");
        }

        if ($field == '') {
             $errorMessage = ("field parameter is empty");
        }

        if (!is_array($rules) || count($rules) == 0) {
            $errorMessage = ("The array of rules parameter is empty");
        }

        $errorMessage = ($errorMessage == '') ? $field : $errorMessage;

        $this->fields[] = array(
            'name' => $field,
            'errorMessage' => $errorMessage,
            'rules' => $rules,
        );
    }

    public function validate()
    {
        if (count($_POST) == 0) {
            echo("The array of post parameters is empty");
        }

        if (count($this->fields) == 0) {
            echo("Validation rules is not set");
        }

        foreach ($this->fields as $field) {

            $fieldName = $field['name'];
            if (isset($_POST[$fieldName])) {
                foreach ($field['rules'] as $rule) {

                    $param = false;

                    if ($arr = explode('=', $rule)) {
                        if (isset($arr[0]) && isset($arr[1])) {
                            $param = $arr[1];
                            $rule = $arr[0];
                        }
                    }

                    $output = $this->$rule($_POST[$fieldName], $param);

                    if ((in_array('required', $field['rules']) && $output == FALSE) || (!in_array('required', $field['rules']) && $output == FALSE && $_POST[$fieldName] != '')) {
                        if (!isset($this->errors[$fieldName])) {
                            $this->errors[$fieldName] = array('errorMessage' => $field['errorMessage']);
                        }
                    }
                }
            }
        }
        return (count($this->errors) == 0) ? true : false;
    }

    public function getError($field)
    {
        if (isset($this->errors[$field]) && $this->errors[$field] != '') {
            return $this->errors[$field]['errorMessage'];
        }
        return false;
    }
	
	public function getErrors()
    {
		$returnLI = '';
		foreach($this->errors as $q => $w){
			$returnLI .= "<li>".$this->getError($q)."</li>";
		}
		if($returnLI) return $returnLI;
        return false;
    }

    private function validEmail($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    private function required($value)
    {
        return ($value != '') ? true : false;
    }

    private function numeric($value)
    {
        return is_numeric($value) ? true : false;
    }

    private function exactLength($value, $param)
    {
        return (strlen($value) == $param) ? true : false;
    }
}
?>